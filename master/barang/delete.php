<?php
require "../../function.php";
$id_barang = $_GET["id_barang"];
if ( delete($id_barang) > 0 ) {
    echo "<script>
            alert('Data Berhasil Di Hapus!');
            document.location.href = 'barang.php';
            </script>";
}
?>