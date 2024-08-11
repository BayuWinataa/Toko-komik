<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- ------------ASIDE KONTAK-------------- -->
<aside id="kontak">
    <div class="kontak-deskripsi">
        <h1>Kontak</h1>
        <div class="kontak-konten">
            <div class="bio">
                <div class="nama-pembuat">
                    <!-- <img src="../assets/img/profile.png" alt="pembuat" width="120px"> -->
                    <img src="../assets/img/profile.png" alt="pembuat" width="120px">
                    <h2>Bayu Winata</h2>
                    <p> Front-End Web Developer</p>
                </div>
                <div class="informasi-pembuat">
                    <img src="../assets/img/email-1-svgrepo-com.svg" alt="email" width="50px">
                    <p>bayuwinata94@gmail.com</p>
                    <img src="../assets/img/location-xmark-svgrepo-com.svg" alt="lokasi" width="50px">
                    <p>Sumatera Utara, Indonesia</p>
                </div>
                <div class="sosmed-pembuat">
                    <a href="#"><img src="../assets/img/github-svgrepo-com.svg" alt="github"></a>
                    <a href="#"><img src="../assets/img/instagram-svgrepo-com.svg" alt="instagram"></a>
                    <a href="#"><img src="../assets/img/facebook-svgrepo-com.svg" alt="facebook"></a>
                </div>
            </div>
            <div class="form">
                <h1>Hubungi via email</h1>
                <form action="#">
                    <div class="box-input">
                        <input type="text" placeholder="Masukan nama " required>
                    </div>
                    <div class="box-input">
                        <input type="email" placeholder="Masukan email" required>
                    </div>
                    <div class="box-input box-pesan">
                        <textarea name="pesan" id="pesan" placeholder="Tulis pesan...." required></textarea>
                    </div>
                    <div class="btn-kontak">
                        <input type="button" value="Kirim">
                    </div>
                </form>
            </div>
        </div>
    </div>
</aside>
</main>

<?= $this->endSection(); ?>