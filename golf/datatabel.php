<!DOCTYPE html>
<html>
<head>
    <title>Data Cuaca</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 20px;
            background-image: url('./assets/gambar2.jpg'); /* Ganti 'path_to_your_image.jpg' dengan alamat gambar Anda */
            background-size: cover; /* Menutupi seluruh latar belakang */
            background-repeat: no-repeat; /* Menghindari pengulangan gambar */
            background-attachment: fixed; /* Mengunci gambar latar belakang */
        }


        h1 {
            color: #333;
            text-align: center; /* Menengahkan teks "Data Cuaca" */
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px 15px;
            border: 1px solid #ccc;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        /* Gaya tombol Kembali */
        .btn-kembali {
            font-size: 14px; /* Ukuran font tombol */
            padding: 5px 10px; /* Padding tombol */
            margin-top: 10px; /* Jarak atas tombol dari tabel */
            display: inline-block; /* Membuat tombol menjadi inline block */
        }

        /* Menengahkan tombol Kembali */
        .center-div {
            text-align: center;
        }

        /* Gaya latar belakang responsif untuk perangkat seluler */
        @media screen and (max-width: 768px) {
            body {
                background-size: cover; /* Menyembunyikan sebagian latar belakang jika perlu */
                background-attachment: scroll; /* Mengganti attachment agar bisa digulir */
            }
        }
    </style>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h1>Data Cuaca</h1>
    <table>
        <tr>
            <th>No</th>
            <th>Play</th>
            <th>Outlook</th>
            <th>Temperature</th>
            <th>Humidity</th>
            <th>Windy</th>
        </tr>
        <?php
        // Data cuaca
        $cuaca = [
            ["1", "no", "sunny", 85, 85, "FALSE"],
            ["2", "no", "sunny", 80, 90, "TRUE"],
            ["3", "yes", "overcast", 83, 78, "FALSE"],
            ["4", "yes", "rain", 70, 96, "FALSE"],
            ["5", " yes", "rain", 68, 80, "FALSE"],
            ["6", "no", "rain", 65, 70, "TRUE"],
            ["7", "yes", "overcast", 64, 65, "TRUE"],
            ["8", "no", "sunny", 72, 95, "FALSE"],
            ["9", "yes", "sunny", 69, 70, "FALSE"],
            ["10", "yes", "rain", 75, 80, "FALSE"],
            ["11", "yes", "sunny", 75, 70, "TRUE"],
            ["12", "yes", "overcast", 72, 90, "TRUE"],
            ["13", "yes", "overcast", 81, 75, "FALSE"],
            ["14", "no", "rain", 71, 80, "TRUE"],
        ];

        // Fungsi untuk menentukan apakah dapat bermain golf
        function dapatBermainGolf($outlook, $temperature, $humidity, $windy) {
            if ($outlook == "sunny" && $temperature > 70 && $humidity < 85 && $windy == "FALSE") {
                return "yes";
            } else {
                return "no";
            }
        }

        // Menampilkan data cuaca dengan hasil bermain golf
        foreach ($cuaca as $data) {
            $no = $data[0];
            $play = dapatBermainGolf($data[2], $data[3], $data[4], $data[5]);
            $outlook = $data[2];
            $temperature = $data[3];
            $humidity = $data[4];
            $windy = $data[5];

            echo "<tr>";
            echo "<td>$no</td>";
            echo "<td>$play</td>";
            echo "<td>$outlook</td>";
            echo "<td>$temperature</td>";
            echo "<td>$humidity</td>";
            echo "<td>$windy</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <!-- Tempatkan tombol Kembali di div yang di tengah -->
    <div class="center-div">
        <a href="cekcuaca.php" class="btn btn-primary btn-kembali">Kembali</a>
    </div>
    <footer class="text-center mt-5">
        <p>&copy; Denis Rainmus 2023</p>
    </footer>
</body>
</html>
