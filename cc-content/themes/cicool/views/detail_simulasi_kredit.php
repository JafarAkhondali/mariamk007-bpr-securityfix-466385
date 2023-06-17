<?= get_header(); ?>

<body id="page-top">
    <?= get_navigation(); ?>
    <section class="container" style="color: black;">
        <div class="header-content">
            <div class="header-content-inner">
                <div>
                    <h1 style="color:green;text-align:center;">Simulasi Kredit</h1>
                    <hr class="hrcenter">
                </div>
                <div class="row mb-3">
                    <form class="col-md-12" id="simulasiKredit">
                        <div class="form-group">
                            <label for="jumlahKredit">Jumlah Kredit <em>(rupiah)</em>: </label>
                            <input type="number" class="form-control" id="jumlahKredit" name="jumlahKredit"
                                placeholder="Contoh: 150000000" value="2000000">
                        </div>

                        <div class="form-group">
                            <label for="jangkaWaktu">Jangka Waktu <em>(bulan)</em>: </label>
                            <input type="number" class="form-control" id="jangkaWaktu" name="jangkaWaktu"
                                placeholder="Contoh: 120" value="12">
                        </div>

                        <div class="form-group">
                            <label for="bungaPertahun">Bunga Per Bulan (Per Bulan/1 Tahun) <em>(%)</em>: </label>
                            <input type="number" class="form-control" id="bungaPertahun" name="bungaPertahun"
                                placeholder="Contoh: 10.5" value="1.5">
                        </div>

                        <div class="form-group">
                            <div class="form-check-inline">
                                <input type="radio" class="form-check-input" value="1" name="metode" id="Flat" checked>
                                <label class="form-check-label" for="Flat">Flat</label>
                            </div>

                            <div class="form-check-inline">
                                <input type="radio" class="form-check-input" value="2" name="metode" id="Efektif">
                                <label class="form-check-label" for="Efektif">Efektif</label>
                            </div>

                            <div class="form-check-inline">
                                <input type="radio" class="form-check-input" value="3" name="metode" id="Anuitas">
                                <label class="form-check-label" for="Anuitas">Anuitas</label>
                            </div>
                        </div>

                        <div class="form-group float-end float-right pull-right">
                            <button id="btnHitung" type="submit" class="btn btn-primary">Hitung</button>
                            <button id="btnUlangi" type="submit" class="btn btn-secondary">Ulangi</button>
                        </div>
                    </form>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <h3 class="mb-3 text-center">Hasil Simulasi Pinjaman</h3>
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-3">Total Pinjaman</div>
                            <div class="col-md-9">: <span id="resultTotalPinjaman"></span></div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-3">Lama Pinjaman</div>
                            <div class="col-md-9">: <span id="resultLamaPinjaman"></span></div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-3">Bunga Per Bulan (Per Bulan/1 Tahun)</div>
                            <div class="col-md-9">: <span id="resultBungaPertahun"></span></div>
                        </div>
                        <div class="flatOnly">
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-3">Angsuran Pokok Perbulan</div>
                                <div class="col-md-9">: <span id="resultAngPokokBulan"></span></div>
                            </div>
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-3">Angsuran Bunga Perbulan</div>
                                <div class="col-md-9">: <span id="resultAngBungaBulan"></span></div>
                            </div>

                            <div class="row d-flex justify-content-center">
                                <div class="col-md-3">Total angsuran per bulan</div>
                                <div class="col-md-9">: <span id="resultAngBulan"></span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <br>
                        <table id="tableAngsuran" class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Bulan</th>
                                    <th scope="col">Pokok</th>
                                    <th scope="col">Bunga</th>
                                    <th scope="col">Angsuran</th>
                                    <th scope="col">Sisa Pinjaman</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </section class="container" style="color: black;text-align:center">
    <?= get_footer(); ?>
    <script src="<?= base_url() ?>assets/jquery.min.js"></script>

    <script src="<?= base_url() ?>assets/jquery/jquery.validate.min.js"></script>
    <script src="<?= base_url() ?>assets/numeraljs/numeral.min.js"></script>
    <script src="<?= base_url() ?>assets/custom.js"></script>
    <script>
    $(document).ready(function() {
        init();
        // const URL_REQUEST = "function.php";
        // const URL_REQUEST = url: '<?= base_url() ?>' + 'function.php';
        const URL_REQUEST = '<?= base_url("function.php") ?>';

        let $jumlahKredit = $('#jumlahKredit');
        let $jangkaWaktu = $('#jangkaWaktu');
        let $bungaPertahun = $('#bungaPertahun');
        let submited = false;

        $("#simulasiKredit").validate({
            rules: {
                jumlahKredit: "required",
                jangkaWaktu: "required",
                bungaPertahun: "required"
            },

            messages: {
                jumlahKredit: "Silahkan masukkan jumlah kredit atau pinjaman.",
                jangkaWaktu: "Silahkan masukkan jangka waktu.",
                bungaPertahun: "Silahkan masukkan bunga."
            },

            submitHandler: function() {
                hitung();
                submited = true;
            }
        });

        $("#btnUlangi").click(function(e) {
            e.preventDefault();
            ulangi();
            submited = false;
        });

        $("input[name=metode]").change(function() {
            if (submited) hitung();
        });

        function init() {
            $("aside").hide();
        }

        function hitung() {
            $("aside").hide();
            $("#tableAngsuran tbody tr").remove();
            let data = $("#simulasiKredit").serializeArray();
            $.post(URL_REQUEST, data, function(e) {
                setInfoPinjaman(
                    e.metode,
                    $jumlahKredit.val(),
                    $jangkaWaktu.val(),
                    $bungaPertahun.val(),
                    e.data[0].pokok,
                    e.data[0].bunga,
                    e.data[0].jumlahAngsuran
                );
                $.each(e.data, function(key, val) {
                    setInfoTable(
                        val.no,
                        val.pokok,
                        val.bunga,
                        val.jumlahAngsuran,
                        val.sisaPinjaman
                    );
                })
            });
            $("aside").show();
        }

        function ulangi() {
            $("aside").hide();
            $jumlahKredit.val("");
            $jangkaWaktu.val("");
            $bungaPertahun.val("");
        }

        function setInfoPinjaman(
            metode,
            total,
            lama,
            bunga,
            angsuranPokok,
            angsuranBunga,
            totalAngsuran
        ) {
            let $totalPinjaman = $("#resultTotalPinjaman");
            let $lamaPinjaman = $("#resultLamaPinjaman");
            let $bunga = $("#resultBungaPertahun");
            let $angPokok = $("#resultAngPokokBulan");
            let $angBunga = $("#resultAngBungaBulan");
            let $ang = $("#resultAngBulan");
            let $flatOnly = $(".flatOnly");

            if (metode == 1) {

                $totalPinjaman.text(rupiah_format(total));
                $lamaPinjaman.text(lama);
                $bunga.text(bunga + " %");
                $flatOnly.show();

                $angPokok.text(rupiah_format(angsuranPokok));
                $angBunga.text(rupiah_format(angsuranBunga));
                $ang.text(rupiah_format(totalAngsuran));

            } else {

                $totalPinjaman.text(rupiah_format(total));
                $lamaPinjaman.text(lama);
                $bunga.text(bunga + " %");
                $flatOnly.hide();

            }
        }

        function setInfoTable(
            bulan,
            angsuranpokok,
            angsuranBunga,
            jumlahAngsuran,
            sisaPinjaman
        ) {
            let markup = `
            <tr>
                <td>Bulan Ke ${bulan}</td>
                <td>${rupiah_format(angsuranpokok)}</td>
                <td>${rupiah_format(angsuranBunga)}</td>
                <td>${rupiah_format(jumlahAngsuran)}</td>
                <td>${rupiah_format(sisaPinjaman)}</td>
            </tr>
        `;
            $("#tableAngsuran > tbody:last-child").append(markup);
        }

        function rupiah_format(number) {
            return number == 0 ? "Rp. " + 0 : "Rp. " + numeral(number).format('0,0');
        }

    }); // eof document.ready
    </script>