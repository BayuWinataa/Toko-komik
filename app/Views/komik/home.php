<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<body style="background-image: url(../assets/img/komik-bg1.jpeg);">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="mt-2 text-center bg-dark text-white rounded p-2">Daftar Komik</h1>

                <form class="d-flex mt-3" method="GET" action="">
                    <input class="form-control me-2" type="search" placeholder="Cari Komik" aria-label="Search"
                        name="search">
                    <button class="btn btn-outline-success bg-dark rounded" type="submit">Search</button>
                </form>

                <div class="row row-cols-1 row-cols-md-4 g-4 mt-4 justify-content-center rounded mb-5">
                    <?php if (!empty($komik) && is_array($komik)): ?>
                    <?php foreach ($komik as $k): ?>
                    <?php
                        // Check if search parameter exists and matches comic title
                        $search = isset($_GET['search']) ? $_GET['search'] : '';
                        $title = strtolower($k['judul']);
                        if (!empty($search) && strpos(strtolower($title), strtolower($search)) === false) {
                            continue; // Skip if search keyword doesn't match comic title
                        }
                        ?>
                    <div class="col  rounded p-5     "
                        style="background-image: url(../assets/img/komik-bg-2.jpeg); background-size: 100%">
                        <div class="card h-100" style="max-width: 270px;">
                            <img src="/img/<?= $k['sampul']; ?>" class="card-img" alt="<?= $k['judul']; ?>"
                                style="cursor: pointer;" data-bs-toggle="modal"
                                data-bs-target="#detailKomik<?= $k['id']; ?>">
                            <div class="card-body text-center  rounded"
                                style="background-image: url(../assets/img/komik-bg-4.jpeg);background-size:cover">
                                <h5 class="card-title fs-4 text-center"><?= $k['judul']; ?></h5>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Detail Komik -->
                    <div class="modal fade" id="detailKomik<?= $k['id']; ?>" tabindex="-1"
                        aria-labelledby="detailKomikLabel<?= $k['id']; ?>" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="detailKomikLabel<?= $k['id']; ?>"><?= $k['judul']; ?>
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="/img/<?= $k['sampul']; ?>" class="img-fluid rounded-start"
                                                alt="<?= $k['judul']; ?>">
                                        </div>
                                        <div class="col-md-8">
                                            <p><b>Penulis:</b> <?= $k['penulis']; ?></p>
                                            <p><b>Penerbit:</b> <?= $k['penerbit']; ?></p>
                                            <p style="text-align: justify"><b>Sinopsis: </b>Lorem, ipsum dolor sit amet
                                                consectetur
                                                adipisicing
                                                elit.
                                                Natus adipisci nostrum tempora, reprehenderit fugiat
                                                exercitationem deleniti. Commodi eum officiis quaerat eveniet
                                                excepturi quos? Molestiae, odio cumque? Esse exercitationem quis
                                                excepturi ea modi porro impedit repellendus optio nobis
                                                laboriosam iste quia velit quod dignissimos voluptates debitis
                                                vitae minus quasi nemo eligendi, perspiciatis non ipsa
                                                reiciendis iure. Omnis consequatur quasi doloremque aliquam,
                                                cupiditate alias facilis natus ratione esse maxime explicabo
                                                eius provident tempora, reiciendis odio possimus amet, magnam
                                                nulla consectetur? Soluta, recusandae eos ullam fuga rem
                                                quisquam? Libero ad perferendis alias, laboriosam ratione ipsam,
                                                explicabo doloribus similique tempora quod unde expedita
                                                culpa.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal Detail Komik -->
                    <?php endforeach; ?>
                    <?php else: ?>
                    <div class="col">
                        <p class="text-center">Tidak ada data komik.</p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>






<?= $this->endSection(); ?>