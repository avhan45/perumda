<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blok</title>
</head>

<body>
    <h1>Edit Blok</h1>

    <form action="/blok/update" method="POST">
        <input type="hidden" name="id_blok" value="<?= $blok['id_blok']; ?>">

        <label for="no_blok">No. Blok</label>
        <input type="text" name="no_blok" value="<?= $blok['no_blok']; ?>" required>

        <label for="blok">Blok</label>
        <input type="text" name="blok" value="<?= $blok['blok']; ?>" required>

        <label for="ukuran">Ukuran</label>
        <input type="text" name="ukuran" value="<?= $blok['ukuran']; ?>" required>

        <button type="submit">Simpan</button>
    </form>
</body>

</html>