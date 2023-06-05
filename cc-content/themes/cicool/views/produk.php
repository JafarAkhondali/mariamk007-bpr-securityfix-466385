<?= get_header(); ?>

<style>
ul {
    --surface-color: #fff;
    --curve: 40;
}

ul {
    box-sizing: border-box;
}

.cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
    gap: 2rem;
    margin: 4rem 5vw;
    padding: 0;
    list-style-type: none;
}

.card {
    position: relative;
    display: block;
    height: 100%;
    border-radius: calc(var(--curve) * 1px);
    overflow: hidden;
    text-decoration: none;
}

.card__image {
    width: 100%;
    height: auto;
}

.card__overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 1;
    border-radius: calc(var(--curve) * 1px);
    background-color: var(--surface-color);
    transform: translateY(100%);
    transition: .2s ease-in-out;
}

.card:hover .card__overlay {
    transform: translateY(0);
}

.card__header {
    position: relative;
    display: flex;
    align-items: center;
    gap: 2em;
    padding: 2em;
    border-radius: calc(var(--curve) * 1px) 0 0 0;
    background-color: var(--surface-color);
    transform: translateY(-100%);
    transition: .2s ease-in-out;
}

.card__arc {
    width: 80px;
    height: 80px;
    position: absolute;
    bottom: 100%;
    right: 0;
    z-index: 1;
}

.card__arc path {
    fill: var(--surface-color);
    d: path("M 40 80 c 22 0 40 -22 40 -40 v 40 Z");
}

.card:hover .card__header {
    transform: translateY(0);
}

.card__thumb {
    flex-shrink: 0;
    width: 50px;
    height: 50px;
    border-radius: 50%;
}

.card__title {
    font-size: 1em;
    margin: 0 0 .3em;
    color: #6A515E;
}

.card__tagline {
    display: block;
    margin: 1em 0;
    font-family: "MockFlowFont";
    font-size: .8em;
    color: #D7BDCA;
}

.card__status {
    font-size: .8em;
    color: #D7BDCA;
}

.card__description {
    padding: 0 2em 2em;
    margin: 0;
    color: #D7BDCA;
    font-family: "MockFlowFont";
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 3;
    overflow: hidden;
}

@media only screen and (max-width: 620px) {

    /* For mobile phones: */
    .cards {
        width: 100%;
    }
}
</style>

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
                <div class="col-sm-3">
                    <a class="text-black" rel="group" href="<?= BASE_URL . 'web/detail_kredit/' . $kredit->id; ?>">
                        <?= $kredit->nama_kredit ?><br>
                        <img src="<?= BASE_URL . 'uploads/kredit/' . $kredit->photo; ?>" class="image-responsive"
                            alt="image kredit" title="photo kredit">
                    </a>
                </div>
                <?php endforeach; ?>
            </div>

            <h3 class="text-center" style="padding: 10% 0 0 0; color:green;">Cara Bayar Angsuran</h3>
            <hr class="hrcenter">

            <!-- <div class="cards-list">

                <div class="card 1">
                    <div class="card_image">
                        <img src="<?= BASE_URL . 'uploads/kredit/' . $kredit->photo; ?>" class="image-responsive"
                            alt="image kredit" title="photo kredit">
                    </div>

                    <div class="card_title">
                        <a class="text-white" rel="group" href="<?= base_url('web/ajukan_kredit') ?>">Tunai</a>

                        <h4 style="color: white;">Card Title</h4>
                    </div>
                </div>

                <div class="card 2">
                    <div class="card_image">
                        <img src="<?= BASE_URL . 'uploads/kredit/' . $kredit->photo; ?>" class="image-responsive"
                            alt="image kredit" title="photo kredit">
                    </div>
                    <div class="card_title title-black">
                        <h4 style="color: white;">Card Title</h4>
                    </div>
                </div>

            </div> -->
            <ul class="cards">
                <li>
                    <a href="<?= base_url('web/bayar_cash') ?>" class="card">
                        <img src="https://i.pinimg.com/564x/eb/9d/38/eb9d3825496b31b1ef07958b968dddd9.jpg"
                            class="card__image" alt="" />
                        <div class="card__overlay">
                            <div class="card__header">
                                <svg class="card__arc" xmlns="http://www.w3.org/2000/svg">
                                    <path />
                                </svg>
                                <img class="card__thumb"
                                    src="https://i.pinimg.com/564x/a2/9d/29/a29d290535c8a5fd55f67631c7e454f1.jpg"
                                    alt="" />
                                <div class="card__header-text">
                                    <h3 class="card__title">Pembayaran Cash</h3>
                                    <span class="card__status">Ke Kantor</span>
                                </div>
                            </div>
                            <p class="card__description">Pembayaran Cash Angsusan Langsung Datang Ke Kantor</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('web/bayar_transfer') ?>" class="card">
                        <img src="https://i.pinimg.com/564x/43/a4/31/43a43188a31de091ab14798aa1948d4d.jpg"
                            class="card__image" alt="" />
                        <div class="card__overlay">
                            <div class="card__header">
                                <svg class="card__arc" xmlns="http://www.w3.org/2000/svg">
                                    <path />
                                </svg>
                                <img class="card__thumb"
                                    src="https://i.pinimg.com/564x/a2/9d/29/a29d290535c8a5fd55f67631c7e454f1.jpg"
                                    alt="" />
                                <div class="card__header-text">
                                    <h3 class="card__title">Pembayaran Transfer</h3>
                                    <span class="card__status">Melalui Rekening</span>
                                </div>
                            </div>
                            <p class="card__description">Pembayaran Transfer Melalui Rekening BPR Arsham Sejahtera</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('web/bayar_va') ?>" class="card">
                        <img src="https://i.pinimg.com/564x/5d/cb/27/5dcb27e015335a776e74abc7558a5105.jpg"
                            class="card__image" alt="" />
                        <div class="card__overlay">
                            <div class="card__header">
                                <svg class="card__arc" xmlns="http://www.w3.org/2000/svg">
                                    <path />
                                </svg>
                                <img class="card__thumb"
                                    src="https://i.pinimg.com/564x/a2/9d/29/a29d290535c8a5fd55f67631c7e454f1.jpg"
                                    alt="" />
                                <div class="card__header-text">
                                    <h3 class="card__title">Pembayaran Virtual Account</h3>
                                    <!-- <span class="card__tagline">Melalui Tra</span> -->
                                    <span class="card__status">Melalui Transfer Virtual Account</span>
                                </div>
                            </div>
                            <p class="card__description">Pembayaran Transfer Non Tunai Melalui Virtual Account</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('web/bayar_dompet_digital') ?>" class="card">
                        <img src="https://i.pinimg.com/564x/b1/9b/c8/b19bc802f91046a83d0e0e5178375723.jpg"
                            class="card__image" alt="" />
                        <div class="card__overlay">
                            <div class="card__header">
                                <svg class="card__arc" xmlns="http://www.w3.org/2000/svg">
                                    <path />
                                </svg>
                                <img class="card__thumb"
                                    src="https://i.pinimg.com/564x/a2/9d/29/a29d290535c8a5fd55f67631c7e454f1.jpg"
                                    alt="" />
                                <div class="card__header-text">
                                    <h3 class="card__title">Pembayaran Dompet Digital</h3>
                                    <span class="card__status">Melalui Dompet Digital</span>
                                </div>
                            </div>
                            <p class="card__description">Pembayaran Angsuran Melalui Dompet Digital</p>
                        </div>
                    </a>
                </li>
            </ul>
        </div>

        <?= get_footer(); ?>

    </body>