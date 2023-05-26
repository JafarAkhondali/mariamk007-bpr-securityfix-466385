<?= get_header(); ?>

<body id="page-top">
    <?= get_navigation(); ?>

    <body>
        <style>
        .form {
            position: relative;
            display: flex;
            padding: 2.2rem;
            max-width: 350px;
            background: linear-gradient(14deg, rgba(102, 255, 153, 0.8) 0%, rgba(77, 255, 136, 0.7) 66%,
                    rgb(51, 255, 119) 100%), radial-gradient(circle, rgba(0, 230, 77, 0.5) 0%,
                    rgba(0, 204, 68, 0.2) 65%, rgba(26, 255, 102, 0.9) 100%);
            border: 2px solid rgba(26, 255, 102);
            -webkit-box-shadow: rgba(0, 230, 77) 0px 0px 50px -15px;
            box-shadow: rgba(0, 230, 77) 0px 0px 50px -15px;
            overflow: hidden;
            z-index: +1;
            top: 10%;
            left: 50%;
            transform: translate(-50%, -50%);
            justify-content: center;
            align-items: center;
        }

        .loader {
            width: 160px;
            height: 185px;
            position: relative;
            background: rgba(26, 255, 102);
            border-radius: 100px 100px 0 0;
            display: flex;
            top: 10%;
            left: 50%;
            transform: translate(-50%, -50%);
            justify-content: center;
            align-items: center;
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
            background-image: radial-gradient(circle, rgba(26, 255, 102) 48%, transparent 50%),
                radial-gradient(circle, rgba(26, 255, 102) 48%, transparent 50%);
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
        <form class="form"
            <?php echo form_open(base_url('administrator/kritik/add_save'), array('id' => 'kritikForm')) ?> <div
            class="row p-5">

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
        </form>


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