<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Tambah Data Komik</h2>
            <form action="/komik/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text"
                            class="form-control <?= (session("errors") && array_key_exists("judul", session("errors"))) ? "is-invalid" :"" ;?>"
                            id="judul" name="judul" placeholder="Masukkan Judul Komik" autofocus
                            value="<?= old("judul"); ?>">
                        <div class="invalid-feedback">
                            <?= session("errors")["judul"] ?? "" ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="penulis" name="penulis"
                            placeholder="Masukkan Nama Penulis" value="<?= old('penulis'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="penerbit" name="penerbit"
                            placeholder="Masukkan Penerbit Komik" value="<?= old('penerbit'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
                    <div class="col-sm-2">
                        <img src="/img/default.jpg" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <div class="custom-file">
                            <input type="file"
                                class="custom-file-input <?= ($validation && $validation->hasError('sampul')) ? 'is-invalid' : ''; ?>"
                                id="sampul" name="sampul" onchange="previewImg()">
                            <label class="custom-file-label" for="sampul">Pilih gambar</label>
                            <div class="invalid-feedback">
                                <?= $validation ? $validation->getError('sampul') : ''; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary  mb-5">Tambah Data</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>