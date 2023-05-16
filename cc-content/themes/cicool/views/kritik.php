<?= get_header(); ?>

<body id="page-top">
    <?= get_navigation(); ?>

    <body>
        <style>
        .loader {
            width: 160px;
            height: 185px;
            position: relative;
            background: #ADD8E6;
            border-radius: 100px 100px 0 0;
            margin-left: 720px;
        }

        .loader:after {
            content: "";
            position: absolute;
            width: 100px;
            height: 125px;
            left: 50%;
            top: 25px;
            transform: translateX(-50%);
            background-image: radial-gradient(circle, #000 48%, transparent 55%),
                radial-gradient(circle, #000 48%, transparent 55%),
                radial-gradient(circle, #fff 30%, transparent 45%),
                radial-gradient(circle, #000 48%, transparent 51%),
                linear-gradient(#000 20px, transparent 0),
                linear-gradient(#cfecf9 60px, transparent 0),
                radial-gradient(circle, #cfecf9 50%, transparent 51%),
                radial-gradient(circle, #cfecf9 50%, transparent 51%);
            background-repeat: no-repeat;
            background-size: 16px 16px, 16px 16px, 10px 10px, 42px 42px, 12px 3px,
                50px 25px, 70px 70px, 70px 70px;
            background-position: 25px 10px, 55px 10px, 36px 44px, 50% 30px, 50% 85px,
                50% 50px, 50% 22px, 50% 45px;
            animation: faceLift 3s linear infinite alternate;
        }

        .loader:before {
            content: "";
            position: absolute;
            width: 140%;
            height: 125px;
            left: -20%;
            top: 0;
            background-image: radial-gradient(circle, #ADD8E6 48%, transparent 50%),
                radial-gradient(circle, #ADD8E6 48%, transparent 50%);
            background-repeat: no-repeat;
            background-size: 65px 65px;
            background-position: 0px 12px, 145px 12px;
            animation: earLift 3s linear infinite alternate;
        }

        @keyframes faceLift {
            0% {
                transform: translateX(-60%);
            }

            100% {
                transform: translateX(-30%);
            }
        }

        @keyframes earLift {
            0% {
                transform: translateX(10px);
            }

            100% {
                transform: translateX(0px);
            }
        }
        </style>


        <h3 class="text-center pt-50 " style="color:green;">Kritik dan Saran</h3>
        <hr class="hrcenter">

        <div class="loader"></div>

        <div id="snackbar">Pesan Terkirim</div>

        <?php echo form_open(base_url('administrator/kritik/add_save'), array('id' => 'kritikForm')) ?>
        <div class="row p-5">
            <div class="col-lg-12">
                <strong>Nama:</strong>
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama"><br>
            </div>
            <div class="col-lg-12">
                <strong>Kritik:</strong>
                <textarea name="kritik" id="kritik" class="form-control" placeholder="Kritik/Pendapat/Saran"></textarea>
            </div>
            <div class="col-lg-12">
                <br />
                <button type="submit" class="btn btn-success center">Submit</button>
            </div>
        </div>
        <?php echo form_close() ?>

        <script type="text/javascript">
        $(function() {
            $("#kritikForm").on('submit', function(e) {
                e.preventDefault();

                var kritikForm = $(this);

                $.ajax({
                    url: kritikForm.attr('action'),
                    type: 'post',
                    data: kritikForm.serialize(),
                    success: function(response) {
                        var x = document.getElementById("snackbar");
                        x.className = "show";
                        setTimeout(function() {
                            x.className = x.className.replace("show", "");
                        }, 9000);
                        // location.reload();
                    }
                });
            });
        });
        </script>
        <?= get_footer(); ?>

    </body>