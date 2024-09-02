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
    <h3>Data Diri Penerima</h3>
    <form>
        <h4>TABEL DATA DIRI PENERIMA</h4>
        <a class="kembali" href="datadiripenerimatambah.php">Tambah Data Diri Penerima</a> | <a class="kembali" href="../index.php">Kembali</a>
        <table border="1" align="center" width="100%">
            <tr bgcolor="green">
                <th>Kode Penerima</th>
                <th>Nama Kelurahan</th>
                <th>Nama Penerima</th>
                <th>Alamat Penerima</th>
                <th>No.Telp Penerima</th>
                <th>Aksi</th>
                <th>Keterangan</th>
            </tr>
            <?php
                include '../config.php';

                // Pagination
                $limit = 10; // Jumlah baris per halaman
                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                $start = ($page - 1) * $limit;

                $query = mysqli_query($db, "SELECT datadiripenerima.Kd_Penerima, kelurahan.Nama_Kelurahan, datadiripenerima.Nama_Penerima, datadiripenerima.Alamat_Penerima, datadiripenerima.No_Telp_Penerima FROM datadiripenerima INNER JOIN kelurahan ON datadiripenerima.Kd_Kelurahan = kelurahan.Kd_Kelurahan LIMIT $start, $limit");
                while ($data = mysqli_fetch_array($query)) {
            ?>
                    <tr>
                        <td><?php echo $data['Kd_Penerima']; ?></td>
                        <td><?php echo $data['Nama_Kelurahan']; ?></td>
                        <td><?php echo $data['Nama_Penerima']; ?></td>
                        <td><?php echo $data['Alamat_Penerima']; ?></td>
                        <td><?php echo $data['No_Telp_Penerima']; ?></td>
                        <td>
                            <div class="action-buttons">
                                <a class="edit" href="datadiripenerimaubah.php?Kd_Penerima=<?php echo $data['Kd_Penerima']; ?>">Edit</a> |
                                <a class="hapus" href="datadiripenerimahapus.php?Kd_Penerima=<?php echo $data['Kd_Penerima']; ?>" onclick="return confirm('yakin hapus?')">Hapus</a>
                            </div>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a class="edit" href="notadetail.php?kodenota=<?php echo $data['Kd_Penerima']; ?>">Detail</a> |
                                <a class="hapus" href="notacetak.php?kodenota=<?php echo $data['Kd_Penerima']; ?>">Cetak</a>
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
                $total_pages = ceil(mysqli_num_rows(mysqli_query($db, "SELECT * FROM datadiripenerima")) / $limit);

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
