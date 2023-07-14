<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Daftar Sertifikat</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="row pl-4">
        <div class="col-md-8">
            <div class="card card-warning">
                <div class="card-header">
                    <!-- <a href="/sertifikat/create/" class="btn btn-primary"> <i class="fas fa-plus"></i> Tambah Data Sertifikat </a> -->
                    <h3 class="card-title ">Edit Data Sertifikat</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="/sertifikat/update/<?= $pedagang['id_sertifikat']; ?>" method="post">
                        <label for="id_pedagang">ID Pedagang:</label>
                        <select class="form-control" name=" id_pedagang" id="id_pedagang">
                            <option value="<?= $pedagang['id_pedagang'] ?>"><?= $pedagang['nama_pedagang'] ?></option>
                            <?php foreach ($pedagangs as $p) : ?>
                                <option value="<?= $p['id_pedagang'] ?>"><?= $p['nama_pedagang'] ?></option>
                            <?php endforeach ?>
                        </select><br>

                        <label for="id_blok">ID Blok:</label>
                        <select class="form-control" name=" id_blok" id="id_blok">
                            <option value="<?= $pedagang['id_blok'] ?>"><?= $blok['blok'] ?></option>
                            <?php foreach ($bloks as $b) : ?>
                                <option value="<?= $b['id_blok'] ?>"><?= $b['blok'] ?></option>
                            <?php endforeach ?>
                        </select><br>

                        <label for="sertifikat">Sertifikat:</label>
                        <input class="form-control" type="text" name="sertifikat" id="sertifikat" value="<?= $pedagang['sertifikat']; ?>"><br>

                        <label for="keterangan">Keterangan:</label>
                        <textarea class="form-control" name="keterangan" id="keterangan"><?= $pedagang['keterangan']; ?></textarea><br>

                        <button class="btn btn-primary" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>