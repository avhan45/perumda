<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Daftar Klasifikasi</h1>
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
            <!-- <a href="/klasifikasi/create/" class="btn btn-primary"> <i class="fas fa-plus"></i> Tambah Data Klasifikasi </a> -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                <i class="fas fa-plus"></i> Tambah Data Klasifikasi
            </button>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <tr>
                    <th>No</th>
                    <th>Klasifikasi</th>
                    <th>Action</th>
                </tr>
                <?php $no = 0;
                foreach ($klasifikasi as $item) : $no++; ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $item['klasifikasi']; ?></td>
                        <td>
                            <a class="btn btn-sm btn-warning" href="/klasifikasi/edit/<?= $item['id_klasifikasi']; ?>"><i class="fas fa-edit"></i></a>
                            <a class="btn btn-sm btn-danger" href="/klasifikasi/delete/<?= $item['id_klasifikasi']; ?>"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>


        </div>
        <!-- /.card-body -->

    </div>
    <!-- /.content-header -->
</div>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Klasifikasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="klasifikasi/store" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="klasifikasi" class="form-label">Klasifikasi</label>
                        <input class="form-control" type="text" name="klasifikasi">
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