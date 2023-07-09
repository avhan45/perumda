<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Blok</title>
</head>

<body>
    <h1>Daftar Blok</h1>

    <a href="/blok/create">Tambah Blok</a>

    <table>
        <thead>
            <tr>
                <th>ID Blok</th>
                <th>No. Blok</th>
                <th>Blok</th>
                <th>Ukuran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($blok as $row) : ?>
                <tr>
                    <td><?= $row['id_blok']; ?></td>
                    <td><?= $row['no_blok']; ?></td>
                    <td><?= $row['blok']; ?></td>
                    <td><?= $row['ukuran']; ?></td>
                    <td>
                        <a href="/blok/edit/<?= $row['id_blok']; ?>">Edit</a>
                        <a href="/blok/delete/<?= $row['id_blok']; ?>">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>