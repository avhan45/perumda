<form action="<?= base_url('/pedagang/update/' . $pedagang['id_pedagang']); ?>" method="post">
    <label for="id_pasar">ID Pasar:</label>
    <input type="text" name="id_pasar" value="<?= $pedagang['id_pasar']; ?>" required><br>

    <label for="id_klasifikasi">ID Klasifikasi:</label>
    <input type="text" name="id_klasifikasi" value="<?= $pedagang['id_klasifikasi']; ?>" required><br>

    <label for="foto">Foto:</label>
    <input type="text" name="foto" value="<?= $pedagang['foto']; ?>" required><br>

    <label for="nama_pedagang">Nama Pedagang:</label>
    <input type="text" name="nama_pedagang" value="<?= $pedagang['nama_pedagang']; ?>" required><br>

    <label for="jk">Jenis Kelamin:</label>
    <select name="jk" required>
        <option value="Laki-laki" <?= ($pedagang['jk'] == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
        <option value="Perempuan" <?= ($pedagang['jk'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
    </select><br>

    <label for="no_hp">No. HP:</label>
    <input type="text" name="no_hp" value="<?= $pedagang['no_hp']; ?>" required><br>

    <label for="alamat">Alamat:</label>
    <textarea name="alamat" required><?= $pedagang['alamat']; ?></textarea><br>

    <label for="jenis_usaha">Jenis Usaha:</label>
    <input type="text" name="jenis_usaha" value="<?= $pedagang['jenis_usaha']; ?>" required><br>

    <input type="submit" value="Update">
</form>