<?= get_header(); ?>

<body id="page-top">
    <?= get_navigation(); ?>

    <body>

        <div class="container" style="min-height: 60vh;">
            <h3 class="text-center pt-50 ">FAQ</h3>
            <hr class="hrcenter">

            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <?php foreach ($faqs as $faq): ?>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="heading<?= $faq->id ?>">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion"
                                    href="#collapse<?= $faq->id ?>" aria-expanded="true"
                                    aria-controls="collapse<?= $faq->id ?>">
                                    <?= $faq->pertanyaan ?>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse<?= $faq->id ?>" class="panel-collapse collapse" role="tabpanel"
                            aria-labelledby="headingOne">
                            <div class="panel-body">
                                <?= $faq->jawaban ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
        <?= get_footer(); ?>

    </body>