<table>
    <thead>
        <tr>
            <th>Foto</th>
            <th>ID Pedagang</th>
            <th>Nama Pedagang</th>
            <th>Jenis Kelamin</th>
            <th>No. HP</th>
            <th>Alamat</th>
            <th>Jenis Usaha</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pedagang as $row) : ?>
            <tr>
                <td>
                    <img src="<?= $row['foto'] ?>" alt="<?= $row['foto'] ?>">
                </td>
                <td><?= $row['id_pedagang']; ?></td>
                <td><?= $row['nama_pedagang']; ?></td>
                <td><?= $row['jk']; ?></td>
                <td><?= $row['no_hp']; ?></td>
                <td><?= $row['alamat']; ?></td>
                <td><?= $row['jenis_usaha']; ?></td>
                <td>
                    <a href="<?= base_url('/pedagang/edit/' . $row['id_pedagang']); ?>">Edit</a>
                    <a href="<?= base_url('/pedagang/delete/' . $row['id_pedagang']); ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<a href="<?= base_url('/pedagang/create'); ?>">Tambah Pedagang</a>