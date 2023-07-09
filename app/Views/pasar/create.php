<!DOCTYPE html>
<html>

<head>
    <title>Tambah Pasar Baru</title>
</head>

<body>
    <h1>Tambah Pasar Baru</h1>
    <form action="/pasar/store" method="post">
        <label for="no_pasar">Nomor Pasar:</label>
        <input type="text" name="no_pasar" required><br>

        <label for="nama_pasar">Nama Pasar:</label>
        <input type="text" name="nama_pasar" required><br>

        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" required><br>

        <input type="submit" value="Simpan">
    </form>
</body>

</html>