<?= get_header(); ?>

<body id="page-top">
    <?= get_navigation(); ?>

    <body class="header-content">
        <div class="header-content-inner">
            <h3 class="text-center" style="color:green;">Produk dan Layanan</h3><br>
            <hr class="hrcenter">
            <div class="row text-center">
                <?php foreach ($produks as $produk): ?>
                <div class="col-sm-4">
                    <a class="text-black" rel="group" href="<?= BASE_URL . 'web/detail_produk/' . $produk->id; ?>">
                        <?= $produk->nama_produk ?><br>
                        <img src="<?= BASE_URL . 'uploads/produk/' . $produk->photo; ?>" class="image-responsive"
                            alt="image produk" title="photo produk">
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
            <h3 class="text-center" style="padding: 10% 0 0 0; color:green;">Kredit</h3>
            <hr class="hrcenter">

            <div class="row text-center">
                <?php foreach ($kredits as $kredit): ?>
                <div class="col-sm-4">
                    <a class="text-black" rel="group" href="<?= BASE_URL . 'web/detail_kredit/' . $kredit->id; ?>">
                        <?= $kredit->nama_kredit ?><br>
                        <img src="<?= BASE_URL . 'uploads/kredit/' . $kredit->photo; ?>" class="image-responsive"
                            alt="image kredit" title="photo kredit">
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <?= get_footer(); ?>

    </body>