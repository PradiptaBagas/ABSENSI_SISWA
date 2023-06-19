<?php


define('MENU_TITLE', 'Data Produk');
include "../../header.php";
?>
<?php if (!empty($_COOKIE['alert'])) { ?>
    <?php
    $alert = $_COOKIE['alert'];
    $split = explode("|", $alert);
    ?>
    <div class="alert alert-<?= $split[0] ?> alert-dismissible fade show" role="alert">
        <?= $split[1] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>

<div class="d-grid gap-2 mb-4">
    <button class="btn btn-primary block" type="button" data-bs-toggle="modal" data-bs-target="#backdrop">Tambah Data</button>
</div>

<div class="modal fade text-left" id="backdrop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" data-bs-backdrop="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <form action="<?= BASE_URL ?>proses/tambah-produk" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel4">
                        Tambah Produk
                    </h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="form-label">Kategori</label>
                        <select class="form-select" id="kategori" name="kategori" required>
                            <?php
                            $query = "SELECT * FROM KATEGORI";
                            $stmt = oci_parse($con, $query);
                            oci_execute($stmt);
                            while ($res = oci_fetch_assoc($stmt)) {
                            ?>
                                <option value="<?= $res['ID'] ?>"><?= $res['KATEGORI'] ?></option>
                            <?php
                            }
                            oci_free_statement($stmt);
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Nama</label>
                        <input type="text" class="form-control" placeholder="Nama" id="nama" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Harga</label>
                        <input type="text" class="form-control" placeholder="Harga" id="harga" name="harga">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Berat (g)</label>
                        <input type="text" class="form-control" placeholder="Berat" id="berat" name="berat">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Stok</label>
                        <input type="text" class="form-control" placeholder="Stok" id="stok" name="stok">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Foto</label>
                        <input class="form-control" type="file" name="foto" id="foto">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Deskripsi</label>
                        <textarea type="text" class="form-control" row="3" id="deskripsi" name="deskripsi"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="submit" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<section class="section">
    <div class="card">
        <div class="card-header fs-4 fw-bold">List Produk</div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Kategori</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Berat</th>
                        <th>Stok</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT PRODUK.ID, NAMA, HARGA, BERAT, STOK, FOTO, DESKRIPSI, KATEGORI FROM PRODUK JOIN KATEGORI ON KATEGORI.ID = PRODUK.ID_KATEGORI";
                    $stmt = oci_parse($con, $query);
                    oci_execute($stmt);
                    $no = 1;
                    while ($res = oci_fetch_assoc($stmt)) {
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><img src="<?= BASE_URL ?><?= $res['FOTO'] ? 'upload/produk/' . $res['FOTO'] : 'upload/notfound.png' ?>" width="400" class="img-fluid rounded img-thumbnail" alt="Sorry! Image not available at this time"></td>
                            <td><?= $res['KATEGORI'] ?></td>
                            <td><?= $res['NAMA'] ?></td>
                            <td><?= $res['HARGA'] ?></td>
                            <td><?= $res['BERAT'] ?></td>
                            <td><?= $res['STOK'] ?></td>
                            <td><?= $res['DESKRIPSI'] ?></td>
                            <td>
                                <button class="btn btn-sm btn-primary block" type="button" data-bs-toggle="modal" data-bs-target="#edit-<?= $res['ID'] ?>"><i class="bi bi-pencil-square"></i></button>
                                <a href="<?= BASE_URL ?>proses/hapus-produk?id=<?= $res['ID'] ?>" class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i></a>
                            </td>
                        </tr>
                    <?php
                        $no++;
                    }
                    oci_free_statement($stmt);
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php
$query = "SELECT PRODUK.ID, NAMA, HARGA, BERAT, STOK, FOTO, DESKRIPSI, KATEGORI FROM PRODUK JOIN KATEGORI ON KATEGORI.ID = PRODUK.ID_KATEGORI";
$stmt = oci_parse($con, $query);
oci_execute($stmt);
$no = 1;
while ($res = oci_fetch_assoc($stmt)) {
?>
    <div class="modal fade text-left" id="edit-<?= $res['ID'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" data-bs-backdrop="false" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <form action="<?= BASE_URL ?>proses/edit-produk" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel4">
                            Edit Data
                        </h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="" class="form-label">Kategori</label>
                            <select class="form-select" id="kategori" name="kategori" required>
                                <?php
                                $query2 = "SELECT * FROM KATEGORI";
                                $stmt2 = oci_parse($con, $query2);
                                oci_execute($stmt2);
                                while ($res2 = oci_fetch_assoc($stmt2)) {
                                ?>
                                    <option value="<?= $res2['ID'] ?>"><?= $res2['KATEGORI'] ?></option>
                                <?php
                                }
                                oci_free_statement($stmt2);
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Nama</label>
                            <input type="text" class="form-control" value="<?= $res['NAMA'] ?>" id="nama" name="nama">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Harga</label>
                            <input type="text" class="form-control" value="<?= $res['HARGA'] ?>" id="harga" name="harga">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Berat (g)</label>
                            <input type="text" class="form-control" value="<?= $res['BERAT'] ?>" id="berat" name="berat">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Stok</label>
                            <input type="text" class="form-control" value="<?= $res['STOK'] ?>" id="stok" name="stok">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Foto</label>
                            <input class="form-control" type="file" name="foto" id="foto">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Deskripsi</label>
                            <textarea type="text" class="form-control" row="3" id="deskripsi" name="deskripsi"><?= $res['DESKRIPSI'] ?></textarea>
                        </div>
                        <input type="hidden" name="id" id="id" value="<?= $res['ID'] ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Simpan</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php }
oci_free_statement($stmt);
oci_close($con);
?>
<?php
include "../../footer.php";
?>