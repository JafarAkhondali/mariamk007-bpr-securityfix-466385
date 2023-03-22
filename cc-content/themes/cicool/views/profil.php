<?= get_header(); ?>

<body id="page-top">
    <?= get_navigation(); ?>

    <body>
        <div style="padding: 2vw;">
            <div class="header-content text-center">
                <div class="header-content-inner">
                    <h2 id="homeHeading">Struktur Organisasi
                        <?= get_option('site_name') ?>
                    </h2>
                    <hr class="hrcenter">
                    <p>
                        <img src="<?= BASE_URL . 'asset/img/so.png' ?>" width="100%" style="padding-top: 30px;" />
                    </p>
                    <br>
                </div>
            </div>

            <h3 class="text-center">Job Deskripsi Perkerjaan</h3>
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

                <h3 class="text-center">Data Pegawai</h3>
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


                <h3 class="text-center">Sejarah Perusahaan</h3>
                <hr class="hrcenter">
                <section class="timeline p-5">
                    <?php foreach ($sejarahs as $sejarah): ?>
                        <div class="column">
                            <div class="row">
                                <div class="text">
                                    <h3>
                                        <?= $sejarah->judul_sejarah ?>
                                    </h3>
                                    <p>
                                        <?= $sejarah->deskripsi_sejarah ?>
                                    </p>
                                </div>
                                <div class="icon">
                                    <div>
                                        <i class="bi bi-patch-check-fill"></i>
                                    </div>
                                </div>
                                <div class="time">
                                    <time>
                                        <?= $sejarah->date ?>
                                    </time>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </section>
            </div>
        </div>


        <?= get_footer(); ?>

    </body>