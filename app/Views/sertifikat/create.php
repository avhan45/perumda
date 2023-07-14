<!-- app/Views/sertifikat/create.php -->

<h1>Tambah Sertifikat</h1>

<form action="/sertifikat/store" method="post">
    <label for="id_pedagang">ID Pedagang:</label>
    <select name="id_pedagang" id="id_pedagang">
        <?php foreach ($pedagang as $pd) : ?>
            <option value="<?= $pd['id_pedagang'] ?>"><?= $pd['nama_pedagang'] ?></option>
        <?php endforeach ?>
    </select><br>

    <label for="id_blok">ID Blok:</label>
    <select name="id_blok" id="id_blok">
        <?php foreach ($blok as $b) : ?>
            <option value="<?= $b['id_blok'] ?>"><?= $b['blok'] ?></option>
        <?php endforeach ?>
    </select><br>

    <label for="sertifikat">Sertifikat:</label>
    <input type="text" name="sertifikat" id="sertifikat" required><br>

    <label for="keterangan">Keterangan:</label>
    <textarea name="keterangan" id="keterangan" required></textarea><br>

    <input type="submit" value="Simpan">
</form>