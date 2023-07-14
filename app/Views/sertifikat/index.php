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

    <div class="card">
        <div class="card-header">
            <!-- <a href="/sertifikat/create/" class="btn btn-primary"> <i class="fas fa-plus"></i> Tambah Data Sertifikat </a> -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah-sertifikat">
                <i class="fas fa-plus"></i> Tambah Data Sertifikat
            </button>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Pedagang</th>
                        <th>ID Blok</th>
                        <th>Sertifikat</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 0;
                    foreach ($sertifikat as $sert) : $no++; ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $sert->nama_pedagang; ?></td>
                            <td><?= $sert->blok; ?></td>
                            <td><?= $sert->sertifikat; ?></td>
                            <td><?= $sert->keterangan; ?></td>
                            <td>
                                <a class="btn btn-sm btn-warning" href="/sertifikat/edit/<?= $sert->id_sertifikat ?>"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-sm btn-danger" href="/sertifikat/delete/<?= $sert->id_sertifikat ?>"><i class="fas fa-trash"></i></a>
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


<div class="modal fade" id="tambah-sertifikat">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Sertifikat</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="sertifikat/store" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label" for="id_pedagang">Pedagang:</label>
                        <select class="form-control" name="id_pedagang" id="id_pedagang">
                            <option value="">Pilih Data Pedagang</option>
                            <?php foreach ($pedagang as $pd) : ?>
                                <option value="<?= $pd['id_pedagang'] ?>"><?= $pd['nama_pedagang'] ?></option>
                            <?php endforeach ?>
                        </select>

                        <label class="form-label" for="id_blok">Blok:</label>
                        <select class="form-control" name="id_blok" id="id_blok">
                            <option value="">Pilih Data Blok</option>
                            <?php foreach ($blok as $b) : ?>
                                <option value="<?= $b['id_blok'] ?>"><?= $b['blok'] ?></option>
                            <?php endforeach ?>
                        </select>

                        <label class="form-label" for="sertifikat">Sertifikat:</label>
                        <input class="form-control" type="text" name="sertifikat" id="sertifikat" required>

                        <label class="form-label" for="keterangan">Keterangan:</label>
                        <textarea class="form-control" name="keterangan" id="keterangan" required></textarea>

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