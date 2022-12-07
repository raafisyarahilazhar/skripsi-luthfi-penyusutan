<?php
require "../function.php";
$id_aset = $_GET["id_aset"];
if ( delete_aset($id_aset) > 0 ) {
    echo "<script>
            alert('Data Berhasil Di Hapus!');
            document.location.href = 'aset.php';
        </script>"
    ;
}
?>