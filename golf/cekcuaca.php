<!DOCTYPE html>
<html>
<head>
    <title>Cek Cuaca Bermain Golf</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link ke Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 20px;
            background-image: url('./assets/gambar2.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover; /* Menutupi seluruh latar belakang */
        }

        .btn-logout {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.8); /* Latar belakang transparan */
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }

        .container h1 {
            font-size: 24px;
        }

        .form-group {
            margin-bottom: 15px;
        }

            /* Gaya latar belakang responsif untuk perangkat seluler */
            @media screen and (max-width: 768px) {
                body {
                    background-size: cover; /* Menyembunyikan sebagian latar belakang jika perlu */
                    background-attachment: scroll; /* Mengganti attachment agar bisa digulir */
                }
            }
    </style>
</head>
<body>
    <div class="container">
        <!-- Tombol logout -->
        <a href="index.php" class="btn btn-danger btn-logout">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>

        <h1 class="mt-5">Cek Cuaca Bermain Golf</h1>

        <form id="weather-form">
            <div class="form-group">
                <label for="tanggal">Pilih Tanggal Bermain Golf:</label>
                <input type="date" class="form-control" id="tanggal" onchange="isiFormulirCuaca()" required>
            </div>

            <div class="form-group">
                <label for="outlook">Kondisi Cuaca:</label>
                <select class="form-control" id="outlook">
                    <option value="sunny">Sunny</option>
                    <option value="cloudy">Cloudy</option>
                    <option value="rainy">Rainy</option>
                </select>
            </div>

            <div class="form-group">
                <label for="temperature">Suhu (°F):</label>
                <input type="number" class="form-control" id="temperature" required>
            </div>

            <div class="form-group">
                <label for="humidity">Kelembaban (%):</label>
                <input type="number" class="form-control" id="humidity" required>
            </div>

            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="windy">
                <label class="form-check-label" for="windy">Berangin</label>
            </div>

            <button type="button" class="btn btn-primary mt-3" onclick="prediksiCuacaUntukGolf()">Prediksi Cuaca</button>
            <a href="datatabel.php" class="btn btn-primary mt-3">Data Tabel</a>
        </form>

        <p id="result" class="mt-3"></p>
        <p id="validation-message" class="text-danger"></p>

    </div>

    <footer class="text-center mt-5">
        <p>&copy; Denis Rainmus 2023</p>
    </footer>

    <script>
        function isiFormulirCuaca() {
            var tanggal = new Date(document.getElementById("tanggal").value);
            var kondisiCuaca = [];
            if (tanggal.getMonth() >= 5 && tanggal.getDate() >= 1) {
                kondisiCuaca.push("sunny");
            } else {
                kondisiCuaca.push("cloudy", "rainy");
            }
            var outlook = kondisiCuaca[Math.floor(Math.random() * kondisiCuaca.length)];
            var suhuMin, suhuMax, kelembabanMin, kelembabanMax;
            if (outlook === "sunny") {
                suhuMin = 70;
                suhuMax = 85;
                kelembabanMin = 40;
                kelembabanMax = 70;
            } else if (outlook === "cloudy") {
                suhuMin = 60;
                suhuMax = 75;
                kelembabanMin = 50;
                kelembabanMax = 80;
            } else {
                suhuMin = 55;
                suhuMax = 70;
                kelembabanMin = 70;
                kelembabanMax = 90;
            }
            var suhuAcak = Math.floor(Math.random() * (suhuMax - suhuMin + 1)) + suhuMin;
            var kelembabanAcak = Math.floor(Math.random() * (kelembabanMax - kelembabanMin + 1)) + kelembabanMin;
            document.getElementById("outlook").value = outlook;
            document.getElementById("temperature").value = suhuAcak;
            document.getElementById("humidity").value = kelembabanAcak;
            document.getElementById("windy").checked = false;
        }

        function prediksiCuacaUntukGolf() {
            var tanggal = document.getElementById("tanggal").value;
            var outlook = document.getElementById("outlook").value;
            var temperature = parseFloat(document.getElementById("temperature").value);
            var humidity = parseFloat(document.getElementById("humidity").value);
            var windy = document.getElementById("windy").checked;
            if (!tanggal || !outlook || isNaN(temperature) || isNaN(humidity)) {
                document.getElementById("validation-message").textContent = "Anda harus mengisi semua data terlebih dahulu.";
                document.getElementById("result").textContent = "";
            } else {
                document.getElementById("validation-message").textContent = "";
                var hasilPesan = "Prediksi cuaca untuk bermain golf pada tanggal " + tanggal + ": ";
                if (outlook === "sunny" && temperature > 70 && humidity < 85 && !windy) {
                    hasilPesan += "Cuaca cerah dan cocok untuk bermain golf.";
                } else if (outlook === "cloudy" && temperature > 60 && humidity < 80 && !windy) {
                    hasilPesan += "Cuaca berawan dan cocok untuk bermain golf.";
                } else if (outlook === "rainy" && temperature > 55 && humidity < 90 && !windy) {
                    hasilPesan += "Cuaca hujan dan cocok untuk bermain golf.";
                } else {
                    hasilPesan += "Tidak disarankan bermain golf pada tanggal ini karena kondisi cuaca kurang ideal.";
                }
                document.getElementById("result").textContent = hasilPesan;
            }
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
