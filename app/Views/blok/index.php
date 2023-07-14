<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Daftar Blok</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="card">
        <div class="card-header">
            <!-- <a href="/blok/create/" class="btn btn-primary"> <i class="fas fa-plus"></i> Tambah Data Blok </a> -->
            <button class="btn btn-primary" data-toggle="modal" data-target="#tambah-blok"><i class="fas fa-plus"></i> Tambah Data Blok</button>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <table id="example1" class="table table-bordered table-striped">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>No. Blok</th>
                        <th>Blok</th>
                        <th>Ukuran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 0;
                    foreach ($blok as $row) : $no++; ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $row['no_blok']; ?></td>
                            <td><?= $row['blok']; ?></td>
                            <td><?= $row['ukuran']; ?></td>
                            <td>
                                <a class="btn btn-sm btn-warning" href="/blok/edit/<?= $row['id_blok']; ?>"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-sm btn-danger" href="/blok/delete/<?= $row['id_blok']; ?>"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->

    </div>
</div>

<div class="modal fade" id="tambah-blok">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Tambah Data BLok</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="blok/store" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="no_blok" class="form-label">No. Blok</label>
                        <input class="form-control" type="text" name="no_blok" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="blok">Blok</label>
                        <input class="form-control" type="text" name="blok" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="ukuran">Ukuran</label>
                        <input class="form-control" type="text" name="ukuran" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<?= $this->endSection() ?>