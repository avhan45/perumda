<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Data Blok</h1>
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
        <div class="col-sm-6">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="text-white">Edit Data Blok</h3>
                </div>
                <div class="card-body">
                    <form action="/blok/update" method="POST">
                        <input class="form-control" type="hidden" name="id_blok" value="<?= $blok['id_blok']; ?>">

                        <div class="form-group">
                            <label class="form-label" for="no_blok">No. Blok</label>
                            <input class="form-control" type="text" name="no_blok" value="<?= $blok['no_blok']; ?>" required>
                        </div>
                        <div class="form-group">

                            <label class="form-label" for="blok">Blok</label>
                            <input class="form-control" type="text" name="blok" value="<?= $blok['blok']; ?>" required>
                        </div>
                        <div class="form-group">

                            <label class="form-label" for="ukuran">Ukuran</label>
                            <input class="form-control" type="text" name="ukuran" value="<?= $blok['ukuran']; ?>" required>
                        </div>
                        <div class="justify-content-between">
                            <button class="btn btn-primary" type="submit">Update</button>
                            <a href="/blok" class="btn btn-deffault" type="button">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>