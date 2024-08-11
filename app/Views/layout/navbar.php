<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
    <div class="container-fluid">
        <a class="navbar-brand fs-3 fw-bold" href="#">Toko Komik</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link <?= (uri_string() == '' || uri_string() == '/') ? 'active' : ''; ?>"
                        aria-current="page" href="<?= base_url('/'); ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (uri_string() == 'Pages/about') ? 'active' : ''; ?>"
                        href="<?= base_url('/Pages/about'); ?>">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (uri_string() == 'Pages/contact') ? 'active' : ''; ?>"
                        href="<?= base_url('/Pages/contact'); ?>">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (uri_string() == 'Komik') ? 'active' : ''; ?>"
                        href="<?= base_url('/Komik'); ?>">Komik</a>
                </li>
            </ul>

        </div>
    </div>
</nav>