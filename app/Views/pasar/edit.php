<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="content-wrapper pl-4">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Data Pasar</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <form action="<?= base_url() ?>/pasar/update/" method="post">
                        <div class="form-group">
                            <input class="form-control" type="hidden" name="id_pasar" value="<?php echo $pasar['id_pasar']; ?>">
                            <label class="form-label" for="no_pasar">Nomor Pasar :</label>
                            <input class="form-control" type="text" name="no_pasar" value="<?php echo $pasar['no_pasar']; ?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="nama_pasar">Nama Pasar:</label>
                            <input class="form-control" type="text" name="nama_pasar" value="<?php echo $pasar['nama_pasar']; ?>">
                        </div>
                        <div class="form-group">

                            <label class="form-label" for="alamat">Alamat:</label>
                            <input class="form-control" type="text" name="alamat" value="<?php echo $pasar['alamat']; ?>">
                        </div>
                        <button class="btn btn-primary" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>