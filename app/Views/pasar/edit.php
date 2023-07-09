<!DOCTYPE html>
<html>

<head>
    <title>Edit Pasar</title>
</head>

<body>
    <h1>Edit Pasar</h1>
    <form action="/pasar/update" method="post">
        <input type="hidden" name="no_pasar" value="<?php echo $pasar['no_pasar']; ?>">

        <label for="nama_pasar">Nama Pasar:</label>
        <input type="text" name="nama_pasar" value="<?php echo $pasar['nama_pasar']; ?>" required><br>

        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" value="<?php echo $pasar['alamat']; ?>" required><br>

        <input type="submit" value="Simpan">
    </form>
</body>

</html>