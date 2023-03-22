<?= get_header(); ?>

<body id="page-top">
    <?= get_navigation(); ?>
    <div class="header-content">
        <div class="header-content-inner">
            <div>
                <h2 id="homeHeading" class="text-center">Dokumentasi Kegiatan</h2>
                <hr class="hrcenter">
                <div class="row" style="padding: 5vw;">
                    <?php foreach ($dokumentasis as $dokumentasi): ?>
                        <div class="col-lg-4">
                            <?= $dokumentasi->nama_kegiatan ?>
                            <img src="<?= BASE_URL . 'uploads/dokumentasi/' . $dokumentasi->photo; ?>"
                               alt="image dokumentasi" title="photo dokumentasi" width="100%">
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>

    </div>
    </div>


    <?= get_footer(); ?>