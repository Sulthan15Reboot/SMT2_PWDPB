<?php
//Fungsi untuk memformat teks atau string. Fungsi ini akan mengembalikan panjang dari teks saat dieksekusi
//Contoh format string "(%s)" :
$teks = "UBSI";
printf("Belajar Web Programming di %s", $teks);

//Contoh menggunakan fungsi "echo()" :
$teks= "UBSI";
echo "Belajar Web Programming di $teks";
//Maka hasilnya akan sama dengan menggunakan fungsi "printf()"

//Selain simbol %s ada juga simbol :
//simbol "%d" untuk bilangan desimal (interger). Contohnya,
$teks = "UBSI";
printf("Belajar Web Programming di %d", $teks);
//simbol "%f" untuk bilangan pecahan (float). Contohnya,
$teks = "UBSI";
printf("Belajar Web Programming di %f", $teks);
//simbol "%b" untuk bilangan desimal boolean. Contohnya,
$teks = "UBSI";
printf("Belajar Web Programming di %b", $teks);

//Dari ketiga fungsi, yaitu "echo()", "print()", dan "printf()". Mempunyai fungsi yang sama yaitu untuk mencetak teks ke layar.
?>