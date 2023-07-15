<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
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
        <div class="card-header justify-content-between " style="display: flex;">
            <!-- <a href="/pasar/create/" class="btn btn-primary"> <i class="fas fa-plus"></i> Tambah Data Pasar </a> -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah-pasar">
                <i class="fas fa-plus"></i> Tambah Data Pasar
            </button>
            <a href="pasar/export/" class="btn btn-primary" target="_blank">
                <i class="fas fa-down"></i> Export
            </a>
            <div class="input-group-prepend">
                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    Import
                </button>
                <ul class="dropdown-menu" style="">
                    <li class="dropdown-item"><a href="#">Download Example</a></li>
                    <li class="dropdown-item"><a href="#">Upload</a></li>
                </ul>
                <!-- /btn-group -->
            </div>





        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No. Pasar</th>
                        <th>Nama Pasar</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pasar as $row) : ?>
                        <tr>
                            <td><?php echo $row['no_pasar']; ?></td>
                            <td><?php echo $row['nama_pasar']; ?></td>
                            <td><?php echo $row['alamat']; ?></td>
                            <td>
                                <a class="btn btn-sm btn-warning" href="/pasar/edit/<?php echo $row['id_pasar']; ?>"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-sm btn-danger" href="/pasar/delete/<?php echo $row['id_pasar']; ?>"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>
        <!-- /.card-body -->

    </div>
    <!-- /.content-header -->
</div>

<div class="modal fade" id="tambah-pasar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <div class="justify-content-between"> -->
                <h4 class="modal-title">Tambah Data Pasar</h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="pasar/store" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="no_pasar" class="form-label">Nomor Pasar:</label>
                        <input type="text" class="form-control" name="no_pasar" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_pasar" class="form-label">Nama Pasar:</label>
                        <input type="text" class="form-control" name="nama_pasar" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat" class="form-label">Alamat:</label>
                        <input type="text" class="form-control" name="alamat" required>

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
<?= $this->section('script') ?>

<?= $this->endSection() ?>