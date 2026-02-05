<?php
$prodi=array("Sistem Informasi","Teknik Komputer","Komputerisasi Akuntansi");
$jumlah =count($prodi);
for ($x=0; $x<$jumlah; $x++){
    echo $prodi[$x];
    echo "<br>";
}
?>