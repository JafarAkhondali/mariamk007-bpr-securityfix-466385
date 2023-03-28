<?= get_header(); ?>

<body id="page-top">
    <?= get_navigation(); ?>

    <body>

        <h3 class="text-center pt-50 " style="color:green">Kritik dan Saran</h3>
        <hr class="hrcenter">

        <div id="snackbar">Pesan Terkirim</div>

        <?php echo form_open(base_url('administrator/kritik/add_save'), array('id' => 'kritikForm')) ?>
        <div class="row p-5">
            <div class="col-lg-12">
                <strong>Nama:</strong>
                <input type="text" name="nama" id="nama" class="form-control" placeholder="nama"><br>
            </div>
            <div class="col-lg-12">
                <strong>Kritik:</strong>
                <textarea name="kritik" id="kritik" class="form-control" placeholder="kritik"></textarea>
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