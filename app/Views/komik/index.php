<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<body style="background-image: url(../assets/img/komik-bg1.jpeg);">
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="/Komik/create" class="btn btn-danger mt-4 ">Tambah data komik</a>
                <h1 class="mt-2 bg-dark text-center text-white p-2 rounded">Daftar Komik</h1>
                <?php if (session()->getFlashdata('pesan')): ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
                <?php endif; ?>

                <?php if (!empty($komik) && is_array($komik)): ?>
                <table class="table table-dark table-striped ">
                    <thead class="table-secondary">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Sampul</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($komik as $k): ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><img src="/img/<?= $k['sampul']; ?>" alt="" class="sampul"></td>
                            <td><?= $k['judul']; ?></td>
                            <td>
                                <a href="/Komik/<?= $k['slug']; ?>" class="btn btn-success">Detail</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php else: ?>
                <p>Tidak ada data komik.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>

<?= $this->endSection(); ?>