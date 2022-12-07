<?php
require "../../function.php";
$id_lokasi = $_GET["id_lokasi"];
if ( delete_lokasi($id_lokasi) > 0 ) {
    echo "<script>
            alert('Data Berhasil Di Hapus!');
            document.location.href = 'lokasi-barang.php';
            </script>";
}
?>