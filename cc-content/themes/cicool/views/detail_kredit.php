<?= get_header(); ?>

<body id="page-top">
    <?= get_navigation(); ?>
    <div class="header-content">
        <div class="header-content-inner text-center">
            <div style="padding-bottom: 100px;">
                <?php foreach ($kredits as $kredit): ?>

                    <h2 id="homeHeading">
                        <?= $kredit->nama_kredit ?>
                    </h2>
                    <hr class="hrcenter">
                    <div class="row" style="padding: 15px;">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <img src="<?= BASE_URL . 'uploads/kredit/' . $kredit->photo; ?>" class="image-responsive"
                                alt="image kredit" title="photo kredit" width="500px" style="padding: 10px">
                            <h4 style="color: black;text-align:left">
                                Deskripsi :<br>
                            </h4>
                            <p style="color: black;text-align:left">
                                <?= $kredit->deskripsi_kredit ?>
                            </p>

                            <?php if (app()->aauth->is_loggedin()): ?>
                                <a href="<?= BASE_URL . 'web/ajukan_kredit' ?>"><button class="btn btn-success">Ajukan
                                        Kredit </button></a>
                            <?php else: ?>
                                <div class="bg-danger" style="padding: 10px;">Mohon login untuk dapat mengajukan kredit</div>
                            <?php endif; ?>


                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>

    </div>
    </div>


    <?= get_footer(); ?>