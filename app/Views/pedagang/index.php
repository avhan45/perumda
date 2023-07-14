<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Daftar Pedagang</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="card">
        <div class="card-header">
            <!-- <a href="/pedagang/create/" class="btn btn-primary"> <i class="fas fa-plus"></i> Tambah Data Pedagang </a> -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah-pedagang">
                <i class="fas fa-plus"></i> Tambah Data Pedagang
            </button>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Pasar</th>
                        <th>Nama Pedagang</th>
                        <th>Jenis Kelamin</th>
                        <th>No. HP</th>
                        <th>Alamat</th>
                        <th>Jenis Usaha</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 0;
                    foreach ($pedagang as $row) : $no++ ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td>
                                <img src="<?= base_url('uploads/' . $row->foto) ?>" alt="<?= $row->foto ?>" width="100" height="100">
                            </td>
                            <td><?= $row->nama_pasar ?></td>
                            <td><?= $row->nama_pedagang ?></td>
                            <td><?= $row->jk ?></td>
                            <td><?= $row->no_hp ?></td>
                            <td><?= $row->alamat ?></td>
                            <td><?= $row->jenis_usaha ?></td>
                            <td>
                                <a class="btn btn-sm btn-warning" href="<?= base_url('/pedagang/edit/' . $row->id_pedagang); ?>"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-sm btn-danger" href="<?= base_url('/pedagang/delete/' . $row->id_pedagang); ?>"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a href="<?= base_url('/pedagang/create'); ?>">Tambah Pedagang</a>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.content-header -->
</div>


<div class="modal fade" id="tambah-pedagang">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Pedagang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="pedagang/store" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_pasar" class="form-label">Pasar:</label>
                        <select class="form-control" name="id_pasar" id="id_pasar">
                            <option value="">Pilih Pasar</option>
                            <?php foreach ($pasar as $p) : ?>
                                <option value="<?= $p['id_pasar'] ?>"><?= $p['nama_pasar'] ?></option>
                            <?php endforeach ?>
                        </select>

                        <label class="form-label" for="id_klasifikasi">Klasifikasi:</label>
                        <select class="form-control" name="id_klasifikasi" id="id_klasifikasi">
                            <option value="">Pilih Pasar</option>
                            <?php foreach ($klasifikasi as $k) : ?>
                                <option value="<?= $k['id_klasifikasi'] ?>"><?= $k['klasifikasi'] ?></option>
                            <?php endforeach ?>
                        </select>

                        <label class="form-label" for="foto">Foto:</label>
                        <input class="form-control" type="file" name="foto">

                        <label class="form-label" for="nama_pedagang">Nama Pedagang:</label>
                        <input class="form-control" type="text" name="nama_pedagang" required>

                        <label class="form-label" for="jk">Jenis Kelamin:</label>
                        <select class="form-control" name="jk" required>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>

                        <label class="form-label" for="no_hp">No. HP:</label>
                        <input class="form-control" type="text" name="no_hp" required>

                        <label class="form-label" for="alamat">Alamat:</label>
                        <textarea class="form-control" name="alamat" required></textarea>

                        <label class="form-label" for="jenis_usaha">Jenis Usaha:</label>
                        <input class="form-control" type="text" name="jenis_usaha" required>


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