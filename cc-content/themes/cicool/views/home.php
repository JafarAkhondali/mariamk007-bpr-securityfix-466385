<?= get_header(); ?>

<body id="page-top">
    <?= get_navigation(); ?>

    <body>
        <style>
        /*
        Counter
        -------------------------------
        */
        .counterup-area {
            background-size: cover;
            background-position: top center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            position: relative;
        }

        .bg-counterup {
            position: absolute;
            background-color: #18DD67;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            opacity: 0.9;
        }

        .counter-item {
            position: relative;
            text-align: center;
            color: #fff;
            border: 1px solid #fff;
            margin-top: 30px;
            padding: 15px;
            min-height: 225px;
        }

        .counter-item:before,
        .counter-item:after {
            position: absolute;
            content: "";
            width: 50%;
            height: 5px;
            background: #fff;
            transition: all 0.4s;
        }

        .counter-item:before {
            top: 0;
            right: 0;
        }

        .counter-item:after {
            bottom: 0;
            left: 0;
        }

        .counter-item:hover:before {
            right: 50% !important;
        }

        .counter-item:hover:after {
            left: 50% !important;
        }

        .counter-item img {
            width: 56px;
            height: 56px;
            margin: 0 auto;
            margin-bottom: 15px;
        }

        .counter-item i {
            font-size: 56px;
            margin-bottom: 15px;
        }

        .counter-item h2.counter {
            font-size: 36px;
            font-weight: 700;
            margin-top: 0;
            color: black;
        }

        .counter-item h4 {
            font-size: 20px;
            color: black;
            margin: 0;
        }
        </style>

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

        <!--Counter-Area Start-->
        <div class="counterup-area pt_60 pb_90" style="background-image: url(img.jpg)">
            <div class="bg-counterup"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="counter-item flex">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <h2 class="counter">LPS <br />Kredit Umum</h2>
                            <h4>7,75%</h4>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="counter-item flex">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <h2 class="counter">LPS <br />Kredit</h2>
                            <h4>10%</h4>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="counter-item flex">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <h2 class="counter">Bunga <br /> Kredit</h2>
                            <h4>6%</h4>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="counter-item flex">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <h2 class="counter">Bunga Kredit Akhir</h2>
                            <h4>5%</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Counter-Area End-->

        <h3 class="text-center" style="color:green;">Produk dan Layanan</h3>
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

        <h3 class="text-center" style="color:green;">Kredit</h3>
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