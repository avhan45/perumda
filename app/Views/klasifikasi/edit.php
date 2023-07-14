<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Klasifikasi</h1>
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
        <div class="col-md-6">


            <div class="card">
                <div class="card-header">
                    <!-- <a href="/klasifikasi/create/" class="btn btn-primary"> <i class="fas fa-plus"></i> Tambah Data Klasifikasi </a> -->

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form method="POST" action="/klasifikasi/update/<?= $klasifikasi['id_klasifikasi']; ?>">
                        <label for="klasifikasi">Klasifikasi:</label>
                        <input class="form-control mb-2" type="text" name="klasifikasi" value="<?= $klasifikasi['klasifikasi']; ?>" required>
                        <button class="btn btn-primary" type="submit">Update</button>
                        <a class="btn btn-secondary" href="/klasifikasi">Cancel</a>
                        <!-- <input type="submit" value="Simpan"> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>