<?= get_header(); ?>


<link href="<?= BASE_ASSET; ?>/fine-upload/fine-uploader-gallery.min.css" rel="stylesheet">
<script src="<?= BASE_ASSET; ?>/fine-upload/jquery.fine-uploader.js"></script>
<?php $this->load->view('core_template/fine_upload'); ?>
<style>
#heading {
    text-transform: uppercase;
    color: #3AB759;
    font-weight: normal;
}

#msform {
    text-align: center;
    position: relative;
    margin-top: 20px;
}

#msform fieldset {
    background: white;
    border: 0 none;
    border-radius: 0.5rem;
    box-sizing: border-box;
    width: 100%;
    margin: 0;
    padding-bottom: 20px;
    position: relative;
}

.form-card {
    text-align: left
}

#msform fieldset:not(:first-of-type) {
    display: none
}

#msform input,
#msform textarea {
    padding: 8px 15px 8px 15px;
    border: 1px solid #ccc;
    border-radius: 0px;
    margin-bottom: 25px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;
    font-family: montserrat;
    color: #2C3E50;
    background-color: #ECEFF1;
    font-size: 16px;
    letter-spacing: 1px
}

#msform input:focus,
#msform textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #3AB759;
    outline-width: 0
}

#msform .action-button {
    width: 100px;
    background: #3AB759;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 0px 10px 5px;
    float: right
}

#msform .action-button:hover,
#msform .action-button:focus {
    background-color: #311B92
}

#msform .action-button-previous {
    width: 100px;
    background: #616161;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px 10px 0px;
    float: right
}

#msform .action-button-previous:hover,
#msform .action-button-previous:focus {
    background-color: #000000
}

.card {
    z-index: 0;
    border: none;
    position: relative
}

.fs-title {
    font-size: 25px;
    color: #3AB759;
    margin-bottom: 15px;
    font-weight: normal;
    text-align: left
}

.purple-text {
    color: #3AB759;
    font-weight: normal
}

.steps {
    font-size: 25px;
    color: gray;
    margin-bottom: 10px;
    font-weight: normal;
    text-align: right
}

.fieldlabels {
    color: gray;
    text-align: left
}

#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    color: lightgrey
}

#progressbar .active {
    color: #3AB759
}

#progressbar li {
    list-style-type: none;
    font-size: 15px;
    width: 25%;
    float: left;
    position: relative;
    font-weight: 400;
}

#progressbar #account:before {
    font-family: FontAwesome;
    content: "\f13e"
}

#progressbar #personal:before {
    font-family: FontAwesome;
    content: "\f007"
}

#progressbar #payment:before {
    font-family: FontAwesome;
    content: "\f030"
}

#progressbar #confirm:before {
    font-family: FontAwesome;
    content: "\f00c"
}

#progressbar li:before {
    width: 50px;
    height: 50px;
    line-height: 45px;
    display: block;
    font-size: 20px;
    color: #ffffff;
    background: lightgray;
    border-radius: 50%;
    margin: 0 auto 10px auto;
    padding: 2px
}

#progressbar li:after {
    content: '';
    width: 100%;
    height: 2px;
    background: lightgray;
    position: absolute;
    left: 0;
    top: 25px;
    z-index: -1
}

#progressbar li.active:before,
#progressbar li.active:after {
    background: #3AB759
}

.progress {
    height: 20px
}

.progress-bar {
    background-color: #3AB759
}

.fit-image {
    width: 100%;
    object-fit: cover
}
</style>

<body id="page-top">
    <?= get_navigation(); ?>

    <body>

        <div class="container-fluid">
            <div class="row justify-content-center" style="padding-top:100px;display: flex;
  justify-content: center;">
                <div class="col-md-8 text-center p-0 mt-3 mb-2">
                    <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                        <h2 id="heading">Ajukan Kredit</h2>
                        <!-- progressbar -->
                        <div id="msform">
                            <ul id="progressbar">
                                <li class="active" id="account"><strong>Mengisi Formulir</strong></li>
                                <li class="active" id="personal"><strong>Pilihan Kredit</strong></li>
                                <li id="payment"><strong>Dokumen Persyaratan</strong></li>
                                <li id="confirm"><strong>Dokumen Pelengkap</strong></li>
                            </ul>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div> <br> <!-- fieldsets -->
                            <fieldset>
                                <div class="row">
                                    <?php
                                    $daftarkredit = $this->db->get('kredit')->result();
                                    foreach ($daftarkredit as $kredit) {
                                    ?>
                                    <form method="post" action="<?= base_url('web/ajukan_kredit2') ?>">

                                        <div class="col-md-6 col-6" style="margin-bottom:25px">
                                            <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
                                                <input type="hidden" name="idkredit" value="<?= $kredit->id ?>">
                                                <div class="card-body" style="padding: 15px;">
                                                    <img src="<?= base_url('uploads/kredit/' . $kredit->photo) ?>"
                                                        width="90px" height="90px">
                                                    <br>
                                                    <br>
                                                    <button type="submit" class="btn btn btn-success">Ajukan Kredit
                                                        <?= strtoupper($kredit->nama_kredit) ?></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <?php } ?>
                                </div>
                                <!-- <div class="pull-right">
                                    <a href="<?= base_url('web/ajukan_kredit') ?>" class="btn btn-danger">Sebelumnya</a>
                                </div> -->
                            </fieldset>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?= get_footer(); ?>
        <script>
        $(document).ready(function() {
            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;
            var current = 1;
            var steps = 2;
            setProgressBar(current);
            $(".next").click(function() {
                current_fs = $(this).parent();
                next_fs = $(this).parent().next();
                //Add Class Active
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
                //show the next fieldset
                next_fs.show();
                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;
                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        next_fs.css({
                            'opacity': opacity
                        });
                    },
                    duration: 500
                });
                setProgressBar(++current);
            });
            $(".previous").click(function() {
                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();
                //Remove class active
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
                //show the previous fieldset
                previous_fs.show();
                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;
                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        previous_fs.css({
                            'opacity': opacity
                        });
                    },
                    duration: 500
                });
                setProgressBar(--current);
            });

            function setProgressBar(curStep) {
                var percent = parseFloat(100 / steps) * curStep;
                percent = percent.toFixed();
                $(".progress-bar")
                    .css("width", percent + "%")
            }
            $(".submit").click(function() {
                return false;
            })
        });
        </script>
    </body>