<!-- app/Views/sertifikat/index.php -->

<h1>Daftar Sertifikat</h1>

<a href="/sertifikat/create">Tambah Sertifikat</a>

<table border="1">
    <thead>
        <tr>
            <th>ID Pedagang</th>
            <th>ID Blok</th>
            <th>Sertifikat</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($sertifikat as $sert) : ?>
            <tr>
                <td><?= $sert->nama_pedagang; ?></td>
                <td><?= $sert->blok; ?></td>
                <td><?= $sert->sertifikat; ?></td>
                <td><?= $sert->keterangan; ?></td>
                <td>
                    <a href="/sertifikat/edit/<?= $sert->id_sertifikat ?>">Edit</a>
                    <a href="/sertifikat/delete/<?= $sert->id_sertifikat ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>