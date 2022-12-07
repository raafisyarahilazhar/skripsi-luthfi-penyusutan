<?php
require "../function.php";
$id_penyusutan = $_GET["id_penyusutan"];
if ( delete_penyusutan($id_penyusutan) > 0 ) {
    echo "<script>
            alert('Data Berhasil Di Hapus!');
            document.location.href = 'penyusutan.php';
        </script>"
    ;
}
?>