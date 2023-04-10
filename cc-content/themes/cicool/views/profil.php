<?= get_header(); ?>

<body id="page-top">
    <?= get_navigation(); ?>

    <body>
        <style>
        .tm-position-relative {
            position: relative;
        }

        .tm-flex-align-center {
            align-items: center;
        }

        .tm-fa-6x {
            font-size: 6em;
        }

        .tm-margin-b-0 {
            margin-bottom: 0;
        }

        .tm-margin-b-20 {
            margin-bottom: 20px;
        }

        .tm-p-4 {
            padding: 2rem !important;
        }

        .tm-color-white {
            color: white;
        }

        .tm-color-primary {
            color: #2ab859;
        }

        .tm-bg-primary {
            background: #2ab859;
        }

        .tm-bg-gray {
            background: #f4f4f4;
        }

        .tm-bg-white {
            background: white;
        }

        .tm-bg-dark-blue {
            background: #1f3646;
        }

        .tm-bg-white-shadow {
            -webkit-box-shadow: 0px 0px 7px 0px rgba(214, 214, 214, 1);
            -moz-box-shadow: 0px 0px 7px 0px rgba(214, 214, 214, 1);
            box-shadow: 0px 0px 7px 0px rgba(214, 214, 214, 1);
        }

        .tm-section-pad {
            padding: 30px 50px;
        }

        .tm-section-pad-2 {
            padding: 30px 40px;
        }

        .tm-article-pad {
            padding: 28px;
        }

        .tm-sidebar-pad {
            padding: 15px 20px;
        }

        .tm-sidebar-pad-2 {
            padding: 21px 20px;
        }

        .tm-pad {
            padding: 20px;
        }

        a.tm-color-primary:hover,
        a.tm-color-primary:active {
            color: #d53239;
        }

        .tm-font-light {
            font-weight: 300;
        }

        .tm-font-normal {
            font-weight: 400;
        }

        .tm-font-semibold {
            font-weight: 600;
        }

        .tm-pt-5 {
            padding-top: 150px;
        }

        .tm-pb-4 {
            padding-bottom: 100px;
        }

        .tm-section-2 {
            background: #2ab859;
            padding-top: 50px;
            position: relative;
        }

        .tm-section-title {
            color: white;
            font-size: 3rem;
        }

        .tm-select {
            border-radius: 0;
            color: #858789;
        }

        .tm-section-title-2 {
            font-size: 3.2rem;
            font-weight: 600;
        }

        .tm-section-subtitle {
            font-size: 1rem;
            font-weight: 300;
            margin-bottom: 25px;
        }

        .tm-section-subtitle-2 {
            font-size: 1.8rem;
        }

        .tm-btn-white-bordered {
            display: inline-block;
            padding: 10px 25px;
            border: 2px solid white;
            background: transparent;
            text-transform: uppercase;
        }

        .tm-btn-white-bordered:hover,
        .tm-btn-white-bordered:focus {
            color: #2ab859;
            background: white;
        }

        .slick-dots {
            bottom: -35px;
        }


        .tm-article {
            padding: 40px;
            transition: all 0.3s ease;
        }

        .tm-article:hover {
            -webkit-box-shadow: 0px 0px 7px 0px rgb(139, 237, 48);
            -moz-box-shadow: 0px 0px 7px 0px rgb(139, 237, 48);
            box-shadow: 0px 0px 7px 0px rgb(139, 237, 48);
            transform: scale(1.1);
        }

        .tm-article-title-1 {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 20px;
            color: green;
        }

        .tm-article-title-2 {
            font-size: 1rem;
            font-weight: 700;
            letter-spacing: 1px;
            color: green;
        }

        .tm-article-title-3 {
            font-size: 1.1rem;
            color: green;
        }

        .tm-btn-primary {
            display: block;
            width: 100%;
            text-align: center;
            margin-left: auto;
            margin-right: auto;
            font-size: 0.75rem;
        }

        html {
            font-size: 14px;
        }

        body {
            font-family: "Open Sans", sans-serif;
            color: #525f7f;
        }

        h2 {
            margin: 5%;
            text-align: center;
            font-size: 2rem;
            font-weight: 100;
        }

        .timeline {
            display: flex;
            flex-direction: column;
            width: 50vw;
            margin: 5% auto;
        }

        .timeline__event {
            background: #fff;
            margin-bottom: 20px;
            position: relative;
            display: flex;
            margin: 20px 0;
            border-radius: 8px;
            box-shadow: 0 30px 60px -12px rgba(50, 50, 93, 0.25), 0 18px 36px -18px rgba(0, 0, 0, 0.3), 0 -12px 36px -8px rgba(0, 0, 0, 0.025);
        }

        .timeline__event__title {
            font-size: 1.2rem;
            line-height: 1.4;
            text-transform: uppercase;
            font-weight: 600;
            color: #9251ac;
            letter-spacing: 1.5px;
        }

        .timeline__event__content {
            padding: 20px;
        }

        .timeline__event__date {
            color: #f6a4ec;
            font-size: 1.5rem;
            font-weight: 600;
            white-space: nowrap;
        }

        .timeline__event__icon {
            border-radius: 8px 0 0 8px;
            background: #9251ac;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-basis: 40%;
            font-size: 2rem;
            color: #9251ac;
            padding: 20px;
        }

        .timeline__event__icon i {
            position: absolute;
            top: 50%;
            left: -65px;
            font-size: 2.5rem;
            transform: translateY(-50%);
        }

        .timeline__event__description {
            flex-basis: 60%;
        }

        .timeline__event:after {
            content: "";
            width: 2px;
            height: 100%;
            background: #9251ac;
            position: absolute;
            top: 52%;
            left: -3.5rem;
            z-index: -1;
        }

        .timeline__event:before {
            content: "";
            width: 5rem;
            height: 5rem;
            position: absolute;
            background: #f6a4ec;
            border-radius: 100%;
            left: -6rem;
            top: 50%;
            transform: translateY(-50%);
            border: 2px solid #9251ac;
        }

        .timeline__event--type2:before {
            background: #87bbfe;
            border-color: #555ac0;
        }

        .timeline__event--type2:after {
            background: #555ac0;
        }

        .timeline__event--type2 .timeline__event__date {
            color: #87bbfe;
        }

        .timeline__event--type2 .timeline__event__icon {
            background: #555ac0;
            color: #555ac0;
        }

        .timeline__event--type2 .timeline__event__title {
            color: #555ac0;
        }

        .timeline__event--type3:before {
            background: #aff1b6;
            border-color: #24b47e;
        }

        .timeline__event--type3:after {
            background: #24b47e;
        }

        .timeline__event--type3 .timeline__event__date {
            color: #aff1b6;
        }

        .timeline__event--type3 .timeline__event__icon {
            background: #24b47e;
            color: #24b47e;
        }

        .timeline__event--type3 .timeline__event__title {
            color: #24b47e;
        }

        .timeline__event:last-child:after {
            content: none;
        }

        @media (max-width: 786px) {
            .timeline__event {
                flex-direction: column;
            }

            .timeline__event__icon {
                border-radius: 4px 4px 0 0;
            }
        }
        </style>

        <div style="padding: 2vw;">
            <div class="header-content text-center">
                <div class="header-content-inner">
                    <h2 id="homeHeading" style="color:green;">Struktur Organisasi
                        <?= get_option('site_name') ?>
                    </h2>
                    <hr class="hrcenter">
                    <p>
                        <img src="<?= BASE_URL . 'asset/img/so.png' ?>" width="100%" style="padding-top: 30px;" />
                    </p>
                    <br>
                </div>
            </div>

            <h3 class="text-center" style="color:green;">Job Deskripsi Perkerjaan</h3>
            <hr class="hrcenter">

            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <?php foreach ($pekerjaans as $pekerjaan): ?>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading<?= $pekerjaan->id ?>">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion"
                                href="#collapse<?= $pekerjaan->id ?>" aria-expanded="true"
                                aria-controls="collapse<?= $pekerjaan->id ?>">
                                <?= $pekerjaan->nama_department ?>
                            </a>
                        </h4>
                    </div>
                    <div id="collapse<?= $pekerjaan->id ?>" class="panel-collapse collapse" role="tabpanel"
                        aria-labelledby="headingOne">
                        <div class="panel-body" style="padding: 25px;">
                            <?= $pekerjaan->deskripsi_pekerjaan ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

                <h3 class="text-center" style="color:green;">Data Pegawai</h3>
                <hr class="hrcenter">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jabatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1; foreach ($pegawais as $pegawai):
                            ?>
                        <tr>
                            <th scope="row">
                                <?= $no++ ?>
                            </th>
                            <td>
                                <?= $pegawai->nama ?>
                            </td>
                            <td>
                                <?= $pegawai->jabatan ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>


                <h3 class="text-center" style="color:green;">Sejarah Perusahaan</h3>
                <hr class="hrcenter">

                <div class="timeline">
                    <?php foreach ($sejarahs as $sejarah): ?>
                    <div class="timeline__event  animated fadeInUp delay-3s timeline__event--type<?= $sejarah->id ?>">

                        <div class="timeline__event__icon ">
                            <i class="lni-cake"></i>
                            <div class="timeline__event__date">
                                <?= $sejarah->date ?>
                            </div>
                        </div>
                        <div class="timeline__event__content ">
                            <div class="timeline__event__title">
                                <?= $sejarah->judul_sejarah ?>
                            </div>
                            <div class="timeline__event__description">
                                <p><?= $sejarah->deskripsi_sejarah ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="container tm-pt-5 tm-pb-4">
                <h3 class="text-center" style="color:green;">Visi, Misi, Moto Perusahaan</h3>
                <hr class="hrcenter">
                <div class="row text-center">
                    <?php foreach ($visi_misis as $visimisi): ?>
                    <article class="col-sm-12 col-md-4 col-lg-4 col-xl-4 tm-article">
                        <i class="fa tm-fa-6x <?= $visimisi->icon ?> tm-color-primary tm-margin-b-20"></i>
                        <h3 class="tm-color-primary tm-article-title-1"><?= $visimisi->title ?></h3>
                        <p><?=$visimisi->deskripsi ?>
                        </p>
                    </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <?= get_footer(); ?>

    </body>