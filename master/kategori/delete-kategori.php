<?php
require "../../function.php";
$id_kategori = $_GET["id_kategori"];
if ( delete_kategori($id_kategori) > 0 ) {
    echo "<script>
            alert('Data Berhasil Di Hapus!');
            document.location.href = 'kategori-barang.php';
            </script>";
}
?>