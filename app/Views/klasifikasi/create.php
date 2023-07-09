<!DOCTYPE html>
<html>

<head>
    <title>Tambah Klasifikasi</title>
</head>

<body>
    <h1>Tambah Klasifikasi</h1>

    <form method="POST" action="/klasifikasi/store">
        <label for="klasifikasi">Klasifikasi:</label>
        <input type="text" name="klasifikasi" required><br><br>

        <input type="submit" value="Simpan">
    </form>
</body>

</html>