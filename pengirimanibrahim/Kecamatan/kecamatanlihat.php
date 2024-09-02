<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        h3 {
            color: #333;
            text-align: center;
            margin-top: 20px;
        }

        form {
            margin: 20px auto;
            width: 80%;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table td, table th {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
        }

        table th {
            background-color: #333;
            color: #fff;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        input[type="text"] {
            padding: 5px;
            width: 100%;
            box-sizing: border-box;
        }

        input[type="submit"] {
            padding: 8px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }

        .edit,
        .hapus,
        .kembali {
            padding: 7.5px 10px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
        }

        .edit:hover,
        .hapus:hover,
        .kembali:hover {
            background-color: #555;
        }

        .edit {
            margin-right: 5px;
        }

        .kembali {
            margin-top: 1px;
        }

        .kembali:hover {
            background-color: #f2f2f2;
            color: #333;
        }

        .pagination {
            margin-top: 20px;
            text-align: center;
        }

        .pagination a {
            display: inline-block;
            padding: 5px 10px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
            font-size: 14px;
            margin-right: 5px;
        }

        .pagination a.current {
            background-color: #555;
        }

        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 5px;
        }
    </style>
</head>
<body>
    <h3>Kecamatan</h3>
    <form>
        <h4>TABEL KECAMATAN</h4>
        <a class="kembali" href="kecamatantambah.php">Tambah Kecamatan</a> | <a class="kembali" href="../index.php">Kembali</a>
        <table border="1" align="center" width="100%">
            <tr bgcolor="green">
                <th>Kode Kecamatan</th>
                <th>Nama Kecamatan</th>
                <th>Nama Kabupaten/Kota</th>
                <th>Aksi</th>
                <th>Keterangan</th>
            </tr>
            <?php
                include '../config.php';

                // Pagination
                $limit = 10; // Jumlah baris per halaman
                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                $start = ($page - 1) * $limit;

                $query = mysqli_query($db, "SELECT kecamatan.Kd_Kecamatan, kecamatan.Nama_Kecamatan, kabupatenkota.Nama_Kabupaten FROM kecamatan INNER JOIN kabupatenkota ON kecamatan.Kd_Kabupaten = kabupatenkota.Kd_Kabupaten LIMIT $start, $limit");
                while ($data = mysqli_fetch_array($query)) {
            ?>
                    <tr>
                        <td><?php echo $data['Kd_Kecamatan']; ?></td>
                        <td><?php echo $data['Nama_Kecamatan']; ?></td>
                        <td><?php echo $data['Nama_Kabupaten']; ?></td>
                        <td>
                            <div class="action-buttons">
                                <a class="edit" href="kecamatanubah.php?Kd_Kecamatan=<?php echo $data['Kd_Kecamatan']; ?>">Edit</a> |
                                <a class="hapus" href="kecamatanhapus.php?Kd_Kecamatan=<?php echo $data['Kd_Kecamatan']; ?>" onclick="return confirm('yakin hapus?')">Hapus</a>
                            </div>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a class="edit" href="notadetail.php?Kd_Kecamatan=<?php echo $data['Kd_Kecamatan']; ?>">Detail</a> |
                                <a class="hapus" href="notacetak.php?Kd_Kecamatan=<?php echo $data['Kd_Kecamatan']; ?>">Cetak</a>
                            </div>
                        </td>
                    </tr>
            <?php
                }
            ?>
        </table>
        <div class="pagination">
            <?php
                // Pagination - Tampilkan tombol "Back" jika halaman bukan halaman pertama
                if ($page > 1) {
                    echo '<a href="?page=' . ($page - 1) . '">Back</a>';
                }

                // Menghitung jumlah total halaman
                $total_pages = ceil(mysqli_num_rows(mysqli_query($db, "SELECT * FROM datadiripengirim")) / $limit);

                // Menampilkan angka halaman
                for ($i = 1; $i <= $total_pages; $i++) {
                    // Tambahkan class 'current' pada tombol halaman saat ini
                    if ($i == $page) {
                        echo '<a href="?page=' . $i . '" class="current">' . $i . '</a>';
                    } else {
                        echo '<a href="?page=' . $i . '">' . $i . '</a>';
                    }
                }

                // Tampilkan tombol "Next" jika halaman bukan halaman terakhir
                if ($page < $total_pages) {
                    echo '<a href="?page=' . ($page + 1) . '">Next</a>';
                }
            ?>
        </div>
    </form>
</body>
</html>
