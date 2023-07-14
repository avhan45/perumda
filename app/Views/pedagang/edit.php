<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="content-wrapper pl-4">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Data Pedagang</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="row">
        <div class="col-sm-11">


            <div class="card ">
                <div class="card-header">
                    <h3>Edit Data Pedagang</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="<?= base_url('/pedagang/update/' . $pedagang['id_pedagang']); ?>" method="post" enctype="multipart/form-data">
                        <label class="form-label" for="id_pasar">ID Pasar:</label>
                        <select class="form-control" name="id_pasar" id="id_pasar">
                            <option value="<?= $pedagang['id_pasar'] ?>"><?= $pedagang['nama_pasar'] ?></option>
                            <?php foreach ($pasar as $pa) : ?>
                                <option value="<?= $pa['id_pasar'] ?>"><?= $pa['nama_pasar'] ?></option>
                            <?php endforeach ?>
                        </select>

                        <label class="form-label" for="id_klasifikasi">Klasifikasi:</label>
                        <select class="form-control" name="id_klasifikasi" id="id_klasifikasi">
                            <option value="<?= $nm_klasifikasi['id_klasifikasi'] ?>"><?= $nm_klasifikasi['klasifikasi'] ?></option>
                            <?php foreach ($klasifikasi as $k) : ?>
                                <option value="<?= $k['id_klasifikasi'] ?>"><?= $k['klasifikasi'] ?></option>
                            <?php endforeach ?>
                        </select><br>

                        <img src="<?= base_url('uploads/' . $pedagang['foto']) ?>" alt="<?= $pedagang['foto'] ?>" width="100" height="100"><br>
                        <label class="form-label" for="foto">Foto:</label>
                        <input class="form-control" type="file" name="foto" value="<?= $pedagang['foto'] ?>">

                        <label class="form-label" for="nama_pedagang">Nama Pedagang:</label>
                        <input class="form-control" type="text" name="nama_pedagang" value="<?= $pedagang['nama_pedagang'] ?>">

                        <label class="form-label" for="jk">Jenis Kelamin:</label>
                        <select class="form-control" name="jk">
                            <option value="<?= $pedagang['jk'] ?>"><?= $pedagang['jk'] ?></option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>

                        <label class="form-label" for="no_hp">No. HP:</label>
                        <input class="form-control" type="text" name="no_hp" value="<?= $pedagang['no_hp'] ?>">

                        <label class="form-label" for="alamat">Alamat:</label>
                        <textarea class="form-control" name="alamat"><?= $pedagang['alamat'] ?></textarea>

                        <label class="form-label" for="jenis_usaha">Jenis Usaha:</label>
                        <input class="form-control" type="text" name="jenis_usaha" value="<?= $pedagang['jenis_usaha'] ?>">

                        <button class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>