<?= get_header(); ?>

<body id="page-top">
    <?= get_navigation(); ?>
    <section class="container" style="color: black;text-align:center">
        <div class="header-content">
            <div class="header-content-inner">
                <div style="padding-bottom: 100px;">
                    <?php foreach ($blogs as $blog): ?>

                        <h2 id="homeHeading" style="color: black; padding-top: 50px; padding-bottom: 20px;">
                            <?= $blog->judul_artikel ?>
                        </h2>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <img src="<?= BASE_URL . 'uploads/artikel/' . $blog->photo; ?>" class="image-responsive"
                                    alt="image blog" title="photo blog" width="500px" style="padding: 10px">
                                <p style="color: black;text-align:left;padding-top:50px">
                                    <?= $blog->deskripsi_artikel ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>

        </div>
        </div>

    </section class="container" style="color: black;text-align:center">

    <?= get_footer(); ?>