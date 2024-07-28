<?php
$koneksi = mysqli_connect("localhost", "root", "", "projek2");
//  login
function login_akun(){
    global $koneksi;
    $username = htmlspecialchars($_POST["username"]);
    $password = md5(htmlspecialchars($_POST["password"]));
    $cek_akun_admin = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM `admin` WHERE username = '$username' AND `password` = '$password'"));
    if ($cek_akun_admin == null ) return false;
    if ($cek_akun_admin != null) {
        $_SESSION["akun-admin"] = ["username" => $username,"password" => $password];
    }
    header("Location: index.php");
    exit;
}
// mengambil data
function ambil_data($query){
    global $koneksi;
    $db = [];
    $sql_query = mysqli_query($koneksi, $query);
    while ($q = mysqli_fetch_assoc($sql_query)) {
        array_push($db, $q);
    }
    return $db;
}

// tambah data

function tambah_data_menu(){
    global $koneksi;
    $nama = ($_POST["nama"]);
    $harga = ($_POST["harga"]);
    $gambar = ($_FILES["gambar"]["name"]);
    $kategori = ($_POST["kategori"]);
    $status = ($_POST["status"]);
    // generate kode menu
    $kode_menu = "MN" . ambil_data("SELECT MAX(SUBSTR(kode_menu, 3)) AS kode FROM menu")[0]["kode"] + 1;
    // cek format gambar
    $format_gambar = ["jpg", "jpeg", "png", "gif"];
    $cek_gambar = explode(".", $gambar);
    $cek_gambar = strtolower(end($cek_gambar));
    if (!in_array($cek_gambar, $format_gambar)) {
        echo "<script>
            alert('File yang diupload bukan merupakan image!');
            </script>";
        return -1;
    }
    // upload file
    $nama_gambar = uniqid() . ".$cek_gambar";
    move_uploaded_file($_FILES["gambar"]["tmp_name"], "src/img/$nama_gambar");
    // eksekusi query insert
    $id_menu = ambil_data("SELECT MAX(SUBSTR(kode_menu, 3)) AS kode FROM menu")[0]["kode"] + 1;
    mysqli_query($koneksi, "INSERT INTO menu VALUES ($id_menu, '$kode_menu', '$nama', $harga, '$nama_gambar', '$kategori', '$status')");
    return mysqli_affected_rows($koneksi);
}
// edit menu
function edit_data_menu(){
    global $koneksi;
    $id_menu = $_POST["id_menu"];
    $nama = ($_POST["nama"]);
    $harga = ($_POST["harga"]);
    $gambar = ($_FILES["gambar"]["name"]);
    $kategori = ($_POST["kategori"]);
    $status = ($_POST["status"]);
    $kode_menu = ($_POST["kode_menu"]);
    // cek format gambar
    $format_gambar = ["jpg", "jpeg", "png", "gif"];
    $cek_gambar = explode(".", $gambar);
    $cek_gambar = strtolower(end($cek_gambar));
    if (!in_array($cek_gambar, $format_gambar) && strlen($gambar) != 0) {
        echo "<script>
            alert('File yang diupload bukan merupakan image!');
        </script>";
        return -1;
    }
    // cek gambar baru
    $gambar_lama = $_POST["gambar-lama"];
    if (strlen($gambar) == 0) {
        $gambar = $gambar_lama;
    } else if ($gambar != $gambar_lama && strlen($gambar) != 0) {
        move_uploaded_file($_FILES["gambar"]["tmp_name"], "src/img/$gambar");
        unlink("src/img/$gambar_lama");
    }
    // eksekusi query update
    mysqli_query($koneksi, "UPDATE menu
                            SET kode_menu = '$kode_menu',
                                nama = '$nama',
                                harga = $harga,
                                gambar = '$gambar',
                                kategori = '$kategori',
                                `status` = '$status'
                            WHERE id_menu = $id_menu");
    return mysqli_affected_rows($koneksi);
}
// hapus menu
function hapus_data_menu(){
    global $koneksi;
    $id_menu = $_GET["id_menu"];
    // hapus file gambar
    $file_gambar = ambil_data("SELECT * FROM menu WHERE id_menu = $id_menu")[0]["gambar"];
    unlink("src/img/$file_gambar");
    // eksekusi query delete
    mysqli_query($koneksi, "DELETE FROM menu WHERE id_menu = $id_menu");
    return mysqli_affected_rows($koneksi);
}

