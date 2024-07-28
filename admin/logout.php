<?php 
session_start();
if (!isset($_SESSION["akun-admin"])) {
    header("Location: login.php");
    exit;
}
session_unset();
session_destroy();

?>
<script>
    alert('Berhasil Logout!');
    location.href = 'user/index.php';
</script>