<form action="<?= base_url('/pedagang/update/' . $pedagang['id_pedagang']); ?>" method="post" enctype="multipart/form-data">
    <label for="id_pasar">ID Pasar:</label>
    <select name="id_pasar" id="id_pasar">
        <option value="<?= $pedagang['id_pasar'] ?>"><?= $pedagang['nama_pasar'] ?></option>
        <?php foreach ($pasar as $pa) : ?>
            <option value="<?= $pa['id_pasar'] ?>"><?= $pa['nama_pasar'] ?></option>
        <?php endforeach ?>
    </select></br>

    <label for="id_klasifikasi">ID Klasifikasi:</label>
    <select name="id_klasifikasi" id="id_klasifikasi">
        <option value="<?= $nm_klasifikasi['id_klasifikasi'] ?>"><?= $nm_klasifikasi['klasifikasi'] ?></option>
        <?php foreach ($klasifikasi as $k) : ?>
            <option value="<?= $k['id_klasifikasi'] ?>"><?= $k['klasifikasi'] ?></option>
        <?php endforeach ?>
    </select></br>

    <img src="<?= base_url('uploads/' . $pedagang['foto']) ?>" alt="<?= $pedagang['foto'] ?>" width="100" height="100">
    <label for="foto">Foto:</label>
    <input type="file" name="foto" value="<?= $pedagang['foto'] ?>"><br>

    <label for="nama_pedagang">Nama Pedagang:</label>
    <input type="text" name="nama_pedagang" value="<?= $pedagang['nama_pedagang'] ?>"><br>

    <label for="jk">Jenis Kelamin:</label>
    <select name="jk">
        <option value="<?= $pedagang['jk'] ?>"><?= $pedagang['jk'] ?></option>
        <option value="Laki-laki">Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
    </select><br>

    <label for="no_hp">No. HP:</label>
    <input type="text" name="no_hp" value="<?= $pedagang['no_hp'] ?>"><br>

    <label for="alamat">Alamat:</label>
    <textarea name="alamat"><?= $pedagang['alamat'] ?></textarea><br>

    <label for="jenis_usaha">Jenis Usaha:</label>
    <input type="text" name="jenis_usaha" value="<?= $pedagang['jenis_usaha'] ?>">
    <br>

    <input type="submit" value="Update">
</form>