<!-- app/Views/sertifikat/edit.php -->

<h1>Edit Sertifikat</h1>

<form action="/sertifikat/update/<?= $pedagang['id_sertifikat']; ?>" method="post">
    <label for="id_pedagang">ID Pedagang:</label>
    <select name="id_pedagang" id="id_pedagang">
        <option value="<?= $pedagang['id_pedagang'] ?>"><?= $pedagang['nama_pedagang'] ?></option>
        <?php foreach ($pedagangs as $p) : ?>
            <option value="<?= $p['id_pedagang'] ?>"><?= $p['nama_pedagang'] ?></option>
        <?php endforeach ?>
    </select><br>

    <label for="id_blok">ID Blok:</label>
    <select name="id_blok" id="id_blok">
        <option value="<?= $pedagang['id_blok'] ?>"><?= $blok['blok'] ?></option>
        <?php foreach ($bloks as $b) : ?>
            <option value="<?= $b['id_blok'] ?>"><?= $b['blok'] ?></option>
        <?php endforeach ?>
    </select><br>

    <label for="sertifikat">Sertifikat:</label>
    <input type="text" name="sertifikat" id="sertifikat" value="<?= $pedagang['sertifikat']; ?>"><br>

    <label for="keterangan">Keterangan:</label>
    <textarea name="keterangan" id="keterangan"><?= $pedagang['keterangan']; ?></textarea><br>

    <input type="submit" value="Update">
</form>