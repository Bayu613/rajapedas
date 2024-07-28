<!-- Search & Tambah -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="d-flex flex-wrap justify-content-between">
        <nav class="navbar navbar-light">
            <form action="daftar_menu.php" method="GET" class="form-inline d-flex">
                <input class="form-control mx-sm-2" type="search" autocomplete="off" name="key-search" placeholder="Cari..">
                <button class="btn btn-success mx-2" name="search">Search</button>
            </form>
        </nav>  

    </div>
<!-- Menu Masakan -->
<div class="row">
<?php $i = 1; foreach ($menu as $m) { ?>
    <div class="col-sm-4 mx-auto m-2">
        <div class="card">
            <h5 class="card-header bg-info"><?= $m["nama"]; ?></h5>
            <div class="card-body">
                <p><img class="rounded" src="../src/img/<?= $m["gambar"]; ?>" width="260" height="200"></p>
                <input type="hidden" name="kode_menu<?= $i; ?>" value="<?= $m["kode_menu"]; ?>">
                <table class="table table-striped table-responsive-sm">
                    <tr>
                        <td>Harga</td>
                        <td>:</td>
                        <td class="card-text">Rp<?= $m["harga"]; ?></td>
                    </tr>
                    <tr>
                        <td>Kategori</td>
                        <td>:</td>
                        <td class="card-text"><?= $m["kategori"]; ?></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td class="card-text"><?= $m["status"]; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
<?php $i++; } ?>
</body>
</html>
