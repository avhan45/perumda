<!DOCTYPE html>
<html>

<head>
    <title>Daftar Klasifikasi</title>
</head>

<body>
    <h1>Daftar Klasifikasi</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Klasifikasi</th>
            <th>Action</th>
        </tr>
        <?php foreach ($klasifikasi as $item) : ?>
            <tr>
                <td><?= $item['id_klasifikasi']; ?></td>
                <td><?= $item['klasifikasi']; ?></td>
                <td>
                    <a href="/klasifikasi/edit/<?= $item['id_klasifikasi']; ?>">Edit</a>
                    <a href="/klasifikasi/delete/<?= $item['id_klasifikasi']; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <a href="/klasifikasi/create">Tambah Klasifikasi</a>
</body>

</html>