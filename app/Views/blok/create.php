<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Blok</title>
</head>

<body>
    <h1>Tambah Blok</h1>

    <form action="/blok/store" method="POST">
        <label for="no_blok">No. Blok</label>
        <input type="text" name="no_blok" required>

        <label for="blok">Blok</label>
        <input type="text" name="blok" required>

        <label for="ukuran">Ukuran</label>
        <input type="text" name="ukuran" required>

        <button type="submit">Simpan</button>
    </form>
</body>

</html>