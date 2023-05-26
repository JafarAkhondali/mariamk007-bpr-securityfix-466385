<?= get_header(); ?>

<style>
input,
textarea {
    padding: 10px;
    border: none;
    border-radius: 5px;
    margin-bottom: 20px;
}

input:focus,
textarea:focus {
    outline: none;
    box-shadow: 0 0 5px #ff6384;
    transform: scale(1.05);
    transition: transform 0.3s ease-in-out;
}

.col-lg-12 button[type="submit"] {
    background-color: #ff6384;
    color: #fff;
    border: 2px solid #ff5900;
    border-radius: 5px;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
}

.col-lg-12 button[type="submit"]:hover {
    border: 2px solid #66da4300;
    background: green;
    transform: scale(1.1);
    transition: transform 0.3s ease-in-out;
}
</style>

<body id="page-top">
    <?= get_navigation(); ?>

    <body>
        <h3 class="text-center pt-50 " style="color:green">Kritik dan Saran</h3>
        <hr class="hrcenter">
        <p class="text-center">*Isi Form Ini Apabila Kamu Ingin Menyampaikan Pesan atau Saran</p>
        <div id="snackbar">Pesan Terkirim</div>


        <?php echo form_open(base_url('administrator/kritik/add_save'), array('id' => 'kritikForm')) ?>
        <div class="row p-5">
            <div class="col-lg-12">

                <strong>Nama:</strong>
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Isian Nama"><br>
            </div>
            <div class="col-lg-12">
                <strong>Kritik:</strong>
                <textarea name="kritik" id="kritik" rows="7" class="form-control"
                    placeholder="Isian Saran/Kritik"></textarea>
            </div>
            <div class="col-lg-12">
                <br />
                <button type="submit" class="btn center">Kirim Pesan</button>
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