<form action="<?= base_url('/pedagang/store'); ?>" method="post" enctype="multipart/form-data">
    <label for="id_pasar">ID Pasar:</label>
    <select name="id_pasar" id="id_pasar">
        <option value="">Pilih Pasar</option>
        <?php foreach ($pasar as $p) : ?>
            <option value="<?= $p['id_pasar'] ?>"><?= $p['nama_pasar'] ?></option>
        <?php endforeach ?>
    </select></br>

    <label for="id_klasifikasi">ID Klasifikasi:</label>
    <select name="id_klasifikasi" id="id_klasifikasi">
        <option value="">Pilih Pasar</option>
        <?php foreach ($klasifikasi as $k) : ?>
            <option value="<?= $k['id_klasifikasi'] ?>"><?= $k['klasifikasi'] ?></option>
        <?php endforeach ?>
    </select></br>

    <label for="foto">Foto:</label>
    <input type="file" name="foto"><br>

    <label for="nama_pedagang">Nama Pedagang:</label>
    <input type="text" name="nama_pedagang" required><br>

    <label for="jk">Jenis Kelamin:</label>
    <select name="jk" required>
        <option value="Laki-laki">Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
    </select><br>

    <label for="no_hp">No. HP:</label>
    <input type="text" name="no_hp" required><br>

    <label for="alamat">Alamat:</label>
    <textarea name="alamat" required></textarea><br>

    <label for="jenis_usaha">Jenis Usaha:</label>
    <input type="text" name="jenis_usaha" required>
    <br>

    <input type="submit" value="Simpan">
</form>