<?= get_header(); ?>

<style>
.box {
    width: 1200px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    grid-gap: 15px;
    margin: 0 auto;
}

.card {
    position: relative;
    width: 300px;
    height: 350px;
    background: #fff;
    margin: 0 auto;
    border-radius: 4px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, .2);
}

.card:before,
.card:after {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border-radius: 4px;
    background: #fff;
    transition: 0.5s;
    z-index: -1;
}

.card:hover:before {
    transform: rotate(20deg);
    box-shadow: 0 2px 20px rgba(0, 0, 0, .2);
}

.card:hover:after {
    transform: rotate(10deg);
    box-shadow: 0 2px 20px rgba(0, 0, 0, .2);
}

.card .imgBx {
    position: absolute;
    top: 10px;
    left: 10px;
    bottom: 10px;
    right: 10px;
    background: #222;
    transition: 0.5s;
    z-index: 1;
}

.card:hover .imgBx {
    bottom: 80px;
}

.card .imgBx img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.card .details {
    position: absolute;
    left: 10px;
    right: 10px;
    bottom: 10px;
    height: 60px;
    text-align: center;
}

.card .details h2 {
    margin: 0;
    padding: 0;
    font-weight: 600;
    font-size: 20px;
    color: #777;
    text-transform: uppercase;
}

.card .details h2 span {
    font-weight: 500;
    font-size: 16px;
    color: #f38695;
    display: block;
    margin-top: 5px;
}

@media only screen and (max-width: 620px) {

    /* For mobile phones: */
    .box {
        width: 100%;
    }
}
</style>

<body id="page-top">
    <?= get_navigation(); ?>
    <div class="header-content">
        <div class="header-content-inner">
            <div>
                <h2 id="homeHeading" class="text-center" style="color:green;">Dokumentasi Kegiatan</h2>
                <hr class="hrcenter">
                <!-- <div class="row" style="padding: 5vw;">
                    <?php foreach ($dokumentasis as $dokumentasi): ?>
                    <div class="col-lg-4">
                        <?= $dokumentasi->nama_kegiatan ?>
                        <img src="<?= BASE_URL . 'uploads/dokumentasi/' . $dokumentasi->photo; ?>"
                            alt="image dokumentasi" title="photo dokumentasi" width="100%">
                    </div>
                    <?php endforeach; ?>
                </div> -->
                <div class="box">
                    <?php foreach ($dokumentasis as $dokumentasi): ?>
                    <div class="card">
                        <div class="imgBx">
                            <img src="<?= BASE_URL . 'uploads/dokumentasi/' . $dokumentasi->photo; ?>"
                                alt="image dokumentasi" title="photo dokumentasi" width="100%">
                        </div>
                        <div class="details">
                            <h2><?= $dokumentasi->nama_kegiatan ?></h2>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>


    <?= get_footer(); ?>