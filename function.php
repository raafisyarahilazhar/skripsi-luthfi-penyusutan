<?php

$conn = mysqli_connect("localhost", "root", "", "aset");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $box = [];
    while ( $shape = mysqli_fetch_assoc($result) ) {
        $box[] = $shape;
    }
    return $box;
}

// Function Add
function add($data) {
    global $conn;
    $id_kategori = htmlspecialchars($data["id_kategori"]);
    $nama_barang = htmlspecialchars($data["nama_barang"]);
    $merk_barang = htmlspecialchars($data["merk_barang"]);
    $tahun_perolehan = htmlspecialchars($data["tahun_perolehan"]);

    $query = "INSERT INTO tb_barang VALUES ('', '$id_kategori', '$nama_barang', '$merk_barang', '$tahun_perolehan')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function add_kategori($data) {
    global $conn;
    $kode_kategori = htmlspecialchars($data["kode_kategori"]);
    $kategori_barang = htmlspecialchars($data["kategori_barang"]);
    $terakhir_update = date('Y-m-d H:i:s');

    $query = "INSERT INTO tb_kategori VALUES ('', '$kode_kategori', '$kategori_barang', '$terakhir_update')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function add_lokasi($data) {
    global $conn;
    $nama_lokasi = htmlspecialchars($data["nama_lokasi"]);
    $terakhir_update = date("Y-m-d H:i:s");

    $query = "INSERT INTO tb_lokasi VALUES ('', '$nama_lokasi', '$terakhir_update')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function add_aset($data) {
    global $conn;
    $id_kategori = $data["id_kategori"];
    $id_lokasi = $data["id_lokasi"];
    $nama_aset = htmlspecialchars($data["nama_aset"]);
    $keterangan = htmlspecialchars($data["keterangan"]);
    $jumlah_aset = htmlspecialchars($data["jumlah_aset"]);
    $tgl_peroleh = $data["tgl_peroleh"];
    $masa_manfaat = htmlspecialchars($data["masa_manfaat"]);
    $harga_peroleh = htmlspecialchars($data["harga_peroleh"]);
    $status_aset = htmlspecialchars($data["status_aset"]);
    $kondisi_aset = htmlspecialchars($data["kondisi_aset"]);

    $query = "INSERT INTO tb_aset VALUES ('', '$id_kategori', '$id_lokasi', '$nama_aset', '$keterangan', '$jumlah_aset', '$tgl_peroleh', '$masa_manfaat', '$harga_peroleh', '$status_aset', '$kondisi_aset')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function add_penyusutan($data) {
    global $conn;
    $id_aset = $data["id_aset"];

    $query = "INSERT INTO tb_penyusutan VALUES ('', '$id_aset')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// Function Edit
function edit($data) {
    global $conn;

    $id = $data["id"];
    $kategori_barang = htmlspecialchars($data["kategori_barang"]);
    $nama_barang = htmlspecialchars($data["nama_barang"]);
    $merk_barang = htmlspecialchars($data["merk_barang"]);
    $tahun_perolehan = htmlspecialchars($data["tahun_perolehan"]);

    $query = "UPDATE tb_barang SET kategori_barang = '$kategori_barang', nama_barang  = '$nama_barang', merk_barang = '$merk_barang', tahun_perolehan = '$tahun_perolehan' WHERE id = '$id'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function edit_kategori($data) {
    global $conn;

    $id_kategori = $data["id_kategori"];
    $kode_kategori = htmlspecialchars($data["kode_kategori"]);
    $kategori_barang = htmlspecialchars($data["kategori_barang"]);
    $terakhir_update = date('Y-m-d H:i:s');

    $query = "UPDATE tb_kategori SET 
        kode_kategori = '$kode_kategori',
        kategori_barang = '$kategori_barang',
        terakhir_update = '$terakhir_update'
        WHERE id_kategori = '$id_kategori'
        "
    ;

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);

}

function edit_lokasi($data) {
    global $conn;
    $id_lokasi = $data["id_lokasi"];
    $nama_lokasi = htmlspecialchars($data["nama_lokasi"]);
    $terakhir_update = date('Y-m-d H:i:s');

    $query = "UPDATE tb_lokasi SET
        nama_lokasi = '$nama_lokasi',
        terakhir_update = '$terakhir_update'
        WHERE id_lokasi = '$id_lokasi'
        "
    ;

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function edit_aset($data) {
    global $conn;
    $id_aset = $data["id_aset"];
    $id_kategori = $data["id_kategori"];
    $id_lokasi = $data["id_lokasi"];
    $nama_aset = htmlspecialchars($data["nama_aset"]);
    $keterangan = htmlspecialchars($data["keterangan"]);
    $jumlah_aset = htmlspecialchars($data["jumlah_aset"]);
    $tgl_peroleh = $data["tgl_peroleh"];
    $masa_manfaat = htmlspecialchars($data["masa_manfaat"]);
    $harga_peroleh = htmlspecialchars($data["harga_peroleh"]);
    $status_aset = htmlspecialchars($data["status_aset"]);
    $kondisi_aset = htmlspecialchars($data["kondisi_aset"]);

    $query = "UPDATE tb_aset SET
        id_kategori = '$id_kategori',
        id_lokasi = '$id_lokasi',
        nama_aset = '$nama_aset',
        keterangan = '$keterangan',
        jumlah_aset = '$jumlah_aset',
        tgl_peroleh = '$tgl_peroleh',
        masa_manfaat = '$masa_manfaat',
        harga_peroleh = '$harga_peroleh',
        status_aset = '$status_aset',
        kondisi_aset = '$kondisi_aset'
        WHERE id_aset = '$id_aset'
    ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function edit_penyusutan($data) {
    global $conn;
    $id_penyusutan = $data["id_penyusutan"];
    $id_aset = $data["id_aset"];

    $query = "UPDATE tb_penyusutan SET
        id_aset = '$id_aset'
        WHERE id_penyusutan = '$id_penyusutan'
    ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// Function Delete
function delete($id_barang) {
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_barang WHERE id_barang = '$id_barang'");
    return mysqli_affected_rows($conn);
}

function delete_kategori($id_kategori) {
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_kategori WHERE id_kategori = '$id_kategori'");
    return mysqli_affected_rows($conn);
}

function delete_lokasi($id_lokasi) {
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_lokasi WHERE id_lokasi = '$id_lokasi'");
    return mysqli_affected_rows($conn);
}

function delete_aset($id_aset) {
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_aset WHERE id_aset = '$id_aset'");
    return mysqli_affected_rows($conn);
}

function delete_penyusutan($id_penyusutan) {
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_penyusutan WHERE id_penyusutan = '$id_penyusutan'");
    return mysqli_affected_rows($conn);
}

// Registrasi
function register($data) {
    global $conn;

    $name = $data["name"];
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    // $role = $data["role"];

    $result = mysqli_query($conn, "SELECT username FROM tb_user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "
            <script>
                alert('Username yang anda pilih sudah ada, silakan masukan username kembali');
            </script>
        ";
        return false;
    }

    if ($password !== $password2) {
        echo "
            <script>
                alert('Konfirmasi password tidak sesuai');
            </script>
        ";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($conn, "INSERT INTO tb_user VALUES('', '$name', '$username', '$password')");
    return mysqli_affected_rows($conn);
}
?>