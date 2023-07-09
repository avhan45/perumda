<!DOCTYPE html>
<html>

<head>
    <title>Daftar Pasar</title>
</head>

<body>

    <h1>Daftar Pasar</h1>
    <a href="/pasar/create">Tambah Pasar</a>

    <table>
        <thead>
            <tr>
                <th>No. Pasar</th>
                <th>Nama Pasar</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pasar as $row) : ?>
                <tr>
                    <td><?php echo $row['no_pasar']; ?></td>
                    <td><?php echo $row['nama_pasar']; ?></td>
                    <td><?php echo $row['alamat']; ?></td>
                    <td>
                        <a href="/pasar/edit/<?php echo $row['no_pasar']; ?>">Edit</a>
                        <a href="/pasar/delete/<?php echo $row['no_pasar']; ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>