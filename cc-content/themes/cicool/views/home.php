<?= get_header(); ?>

<body id="page-top">
    <?= get_navigation(); ?>

    <body>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <?php foreach ($sliders as $slideshow): ?>
                <li data-target="#myCarousel" data-slide-to="<?= $slideshow->id - 1 ?>"
                    class="<?= $slideshow->id == 1 ? "active" : "" ?>"></li>
                <?php endforeach ?>
            </ol>
            <div class="carousel-inner" role="listbox">
                <?php foreach ($sliders as $slideshow): ?>


                <div class="<?= $slideshow->id - 1 == 0 ? "item active" : "item" ?>">
                    <img src="<?= BASE_URL . 'uploads/slider/' . $slideshow->slideshow; ?>" style="width:100%;">
                    <div class="carousel-caption">
                        <p class="carousel-caption-text"><?= $slideshow->text ?>
                        </p>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
        </div>
        <h3 class="text-center">Produk dan Layanan</h3>
        <hr class="hrcenter">

        <div class="row text-center" style="padding: 3% 0;">
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

        <h3 class="text-center">Kredit</h3>
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

        <?= get_footer(); ?>

    </body>