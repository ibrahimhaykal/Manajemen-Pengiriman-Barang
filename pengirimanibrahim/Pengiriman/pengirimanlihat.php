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
    <h3>Pengiriman</h3>
    <form>
        <h4>TABEL PENGIRIMAN</h4>
        <a class="kembali" href="pengirimantambah.php">Tambah Pengiriman</a> | <a class="kembali" href="../index.php">Kembali</a>
        <table border="1" align="center" width="100%">
            <tr bgcolor="green">
                <th>No. Pengiriman</th>
                <th>Pengirim</th>
                <th>Penerima</th>
                <th>Tanggal Berangkat</th>
                <th>Tanggal Diterima</th>
                <th>Sub Total</th>
                <th>Aksi</th>
                <th>Keterangan</th>
            </tr>
            <?php
                include '../config.php';

                // Pagination
                $limit = 10; // Jumlah baris per halaman
                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                $start = ($page - 1) * $limit;

                $query = mysqli_query($db, "SELECT pengiriman.No_Pengiriman, datadiripengirim.Nama_Pengirim, datadiripenerima.Nama_Penerima, pengiriman.Tgl_Diterima, pengiriman.Tgl_Berangkat, pengiriman.Sub_Total
                 FROM pengiriman INNER JOIN datadiripengirim ON pengiriman.Kd_Pengirim = datadiripengirim.Kd_Pengirim INNER JOIN datadiripenerima ON pengiriman.Kd_Penerima= datadiripenerima.Kd_Penerima LIMIT $start, $limit");
                while ($data = mysqli_fetch_array($query)) {
            ?>
                    <tr>
                        <td><?php echo $data['No_Pengiriman']; ?></td>
                        <td><?php echo $data['Nama_Pengirim']; ?></td>
                        <td><?php echo $data['Nama_Penerima']; ?></td>
                        <td><?php echo $data['Tgl_Berangkat']; ?></td>
                        <td><?php echo $data['Tgl_Diterima']; ?></td>
                        <td><?php echo $data['Sub_Total']; ?></td>
                        <td>
                            <div class="action-buttons">
                                <a class="edit" href="pengirimanubah1.php?No_Pengiriman=<?php echo $data['No_Pengiriman']; ?>">Edit</a> |
                                <a class="hapus" href="pengirimanhapus.php?No_Pengiriman=<?php echo $data['No_Pengiriman']; ?>" onclick="return confirm('yakin hapus?')">Hapus</a>
                            </div>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a class="edit" href="notadetail.php?No_Pengiriman=<?php echo $data['No_Pengiriman']; ?>">Detail</a> |
                                <a class="hapus" href="notacetak.php?No_Pengiriman=<?php echo $data['No_Pengiriman']; ?>">Cetak</a>
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
                $total_pages = ceil(mysqli_num_rows(mysqli_query($db, "SELECT * FROM pengiriman")) / $limit);

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
