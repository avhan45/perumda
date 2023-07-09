<!DOCTYPE html>
<html>

<head>
    <title>Edit Klasifikasi</title>
</head>

<body>
    <h1>Edit Klasifikasi</h1>

    <form method="POST" action="/klasifikasi/update/<?= $klasifikasi['id_klasifikasi']; ?>">
        <label for="klasifikasi">Klasifikasi:</label>
        <input type="text" name="klasifikasi" value="<?= $klasifikasi['klasifikasi']; ?>" required><br><br>

        <input type="submit" value="Simpan">
    </form>
</body>

</html>