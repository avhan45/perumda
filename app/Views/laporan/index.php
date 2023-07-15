<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="content-wrapper pl-2">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Daftar Pasar</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="card ">
        <div class="card-header">
            <!-- <a href="/pasar/create/" class="btn btn-primary"> <i class="fas fa-plus"></i> Tambah Data Pasar </a> -->
            <a href="" type="button" class="btn btn-success">
                Export Excel
            </a>
            <a href="laporan/pdf" type="button" class="btn btn-danger" target="_blank">
                Export PDF
            </a>
        </div>
    </div>
    <!-- /.content-header -->
</div>

<?= $this->endSection() ?>
<?= $this->section('script') ?>

<?= $this->endSection() ?>