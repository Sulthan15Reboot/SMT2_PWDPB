<?php
$conn = mysqli_connect("localhost", "root", "", "db_tiket");

$data_harga = [
    "GRD" => ["nama" => "Garuda", "Eksekutif" => 1500000, "Bisnis" => 900000, "Ekonomi" => 500000],
    "MPT" => ["nama" => "Merpati", "Eksekutif" => 1200000, "Bisnis" => 800000, "Ekonomi" => 400000],
    "BTV" => ["nama" => "Batavia", "Eksekutif" => 1000000, "Bisnis" => 700000, "Ekonomi" => 300000]
];

$tampilkan_struk = false;

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $kode = $_POST['kode_pesawat'];
    $kelas = $_POST['kelas'];
    $jumlah = $_POST['jml_tiket'];

    $nama_pesawat = $data_harga[$kode]['nama'];
    $harga_satuan = $data_harga[$kode][$kelas];
    $total_bayar = $harga_satuan * $jumlah;

    if ($conn) {
        $query = "INSERT INTO transaksi (nama_penumpang, kode_pesawat, nama_pesawat, kelas, harga_tiket, jumlah_tiket, total_bayar) 
                  VALUES ('$nama', '$kode', '$nama_pesawat', '$kelas', '$harga_satuan', '$jumlah', '$total_bayar')";
        mysqli_query($conn, $query);
    }

    $tampilkan_struk = true;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pemesanan Tiket Online</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .struk-box {
            border: 1px solid #db3434;
            padding: 10px;
            width: fit-content;
            margin: 20px auto;
            background-color: #fff;
            font-family: 'Courier New', Courier, monospace;
        }
        pre { margin: 0; line-height: 1.2; }
    </style>
</head>
<body>
    <div class="container">
        <h3>TIKET ONLINE PADANG - MALAYSIA</h3>
        
        <form action="" method="POST">
            <fieldset>
                <table border="0">
                    <tr>
                        <td>Nama</td>
                        <td>: <input type="text" name="nama" required></td>
                    </tr>
                    <tr>
                        <td>Pilih Kode Pesawat</td>
                        <td>: 
                            <select name="kode_pesawat">
                                <?php foreach ($data_harga as $key => $val): ?>
                                    <option value="<?= $key ?>"><?= $key ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top">Pilih Kelas</td>
                        <td>: 
                            <?php foreach (["Eksekutif", "Bisnis", "Ekonomi"] as $k): ?>
                                <input type="radio" name="kelas" value="<?= $k ?>" id="<?= $k ?>" required>
                                <label for="<?= $k ?>"><?= $k ?></label><br>&nbsp;
                            <?php endforeach; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Jumlah Tiket</td>
                        <td>: 
                            <select name="jml_tiket">
                                <?php for($i=1; $i<=7; $i++): ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                <?php endfor; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button type="submit" name="simpan">SIMPAN</button>
                            <button type="reset">BATAL</button>
                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>

        <?php if ($tampilkan_struk): ?>
        <div class="struk-box">
<pre>
======================================================
PEMESANAN TIKET ONLINE PADANG - MALAYSIA
======================================================
Nama          : <?= str_pad($nama, 20) ?> 
Nama Pesawat  : <?= str_pad($nama_pesawat, 20) ?> 
Kelas         : <?= str_pad($kelas, 20) ?> 
Harga Tiket   : <?= number_format($harga_satuan, 0, ',', '.') ?> 
Jumlah Tiket  : <?= $jumlah ?> 
Total Bayar   : <?= number_format($total_bayar, 0, ',', '.') ?> 
------------------------------------------------------
</pre>
            <button onclick="window.print()">Cetak Struk (PDF/Print)</button>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>