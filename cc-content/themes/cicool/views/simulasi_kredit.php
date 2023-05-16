<?= get_header(); ?>

<style type="text/css">
i {
    font-size: 50px;
    width: 40px;
    height: 40px;
}

.tm-fa-6x {
    font-size: 4em;
}

.tm-fa-5x {
    font-size: 3.5em;
}

.tm-margin-b-20 {
    margin-bottom: 20px;
}

.badge-lg {
    font-size: 20px;
    font-weight: 100px;
    padding: 10px;
    border-radius: 1em;
}

.card-nganu {
    padding-top: 61px;
    padding-bottom: 61px;
    border-color: #3c763d !important;
}

.float-right {
    float: right;
}

.float-left {
    float: left;
}

.justify-content-center {
    justify-content: center;
}

h5 {
    font-size: 15px;
    font-weight: bold;
}

.pb-3 {
    padding-bottom: 10px;
}

.pt-3 {
    padding-top: 10px;
}

.mt-4 {
    margin-top: 30px;
}

.mt-5 {
    margin-top: 40px;
}

.justify-content-center {
    align-self: center;

}

.labl {
    display: block;
}

.labl>input {
    /* HIDE RADIO */
    visibility: hidden;
    /* Makes input not-clickable */
    position: absolute;
    /* Remove input from document flow */
}

.labl>input+div {
    /* DIV STYLES */
    cursor: pointer;
    border: 2px solid #3c763d;
    padding: 10px;
    border-radius: 5px;

}

.labl>input:checked+div {
    /* (RADIO CHECKED) DIV STYLES */
    background-color: #3c763d;
    border: 2px solid #3c763d;
    color: #fff;
    padding: 10px;
    border-radius: 5px;
}
</style>


<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> -->

<body id="page-top">
    <?= get_navigation(); ?>

    <div class="header-content text-center">
        <div class="header-content-inner">
            <div>
                <h1 style="color:green;">Tabel Angsuran Kredit</h1>
                <hr class="hrcenter">
                <p syle="font-size: 19px">*Tabel ini sewaktu-waktu bisa berubah</p>
                <form class="form-inline" style="padding: 5vh;">
                    <div class="form-group" style="padding-bottom: 3vh;">
                        <label>Nominal Pinjaman : </label>

                        <select class="form-control chosen chosen-select-deselect " name="jumlah_pinjaman"
                            id="jumlah_pinjaman" data-placeholder="Pilih Jumlah Pinjaman"
                            onchange="getNominalPinjaman()">
                            <option value="" readonly>Pilih Jumlah Pinjaman</option>

                            <?php foreach (db_get_all_data('simulasi_kredit', $conditions) as $row): ?>
                            <option value="<?= $row->plafond ?>">Rp. <?= number_format($row->plafond, 0, '.', '.') ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Jangka Waktu 12</th>
                                    <th scope="col">Jangka Waktu 18</th>
                                    <th scope="col">Jangka Waktu 24</th>
                                    <th scope="col">Jangka Waktu 30</th>
                                    <th scope="col">Jangka Waktu 36</th>
                                    <th scope="col">Jangka Waktu 48</th>
                                    <th scope="col">Jangka Waktu 60</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><span id="jangkawaktu_12"></span></td>
                                    <td><span id="jangkawaktu_18"></span></td>
                                    <td><span id="jangkawaktu_24"></span></td>
                                    <td><span id="jangkawaktu_30"></span></td>
                                    <td><span id="jangkawaktu_36"></span></td>
                                    <td><span id="jangkawaktu_48"></span></td>
                                    <td><span id="jangkawaktu_60"></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
            <div>
                <h1 style="color:green;">Kalkulator Kredit</h1>
                <hr class="hrcenter">
                <div class="container mt-5">
                    <div class="col-lg-5" style="float:none;margin:0 auto;">
                        <div class="row">
                            <div class="col-lg-3">

                                <label class="labl" align="center">
                                    <input type="radio" class="radio" name="radioname" value="1" />
                                    <div><i class="fa tm-fa-6x fa-dollar tm-margin-b-20"></i></div>
                                    <span>Modal</span>
                                </label>


                            </div>
                            <div class="col-lg-3">

                                <label class="labl" align="center">
                                    <input type="radio" class="radio" name="radioname" value="2" id="investasi" />
                                    <div><i class="fa tm-fa-6x fa-dollar tm-margin-b-20"></i></div>
                                    <span>Investasi</span>
                                </label>


                            </div>
                            <div class="col-lg-3">

                                <label class="labl" align="center">
                                    <input type="radio" class="radio" name="radioname" value="3" id="konsumtif" />
                                    <div><i class="fa tm-fa-6x fa-dollar tm-margin-b-20"></i></div>
                                    <span>Konsumtif</span>
                                </label>


                            </div>

                            <div class="col-lg-3">

                                <label class="labl" align="center">
                                    <input type="radio" class="radio" name="radioname" value="4" id="kartama" />
                                    <div><i class="fa tm-fa-6x fa-dollar tm-margin-b-20"></i></div>
                                    <span>Kartama</span>
                                </label>


                            </div>


                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="panel panel-default border border-success border-5"
                                style="display:table;padding: 30px;border-color: #3c763d !important;height: 590px;">
                                <div class="panel-body card-nganu" style="display: table-cell;vertical-align: middle;">
                                    <div class="row">
                                        <div class="col-lg-6" style="display:table;">
                                            <h5 style="display: table-cell;vertical-align: middle;" class="float-left">
                                                Nominal Pinjaman</h5>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <span class="input-group-addon" id="result"
                                                    style="border-color: #3c763d;color: #3c763d !important;background: #fff;">Rp.</span>
                                                <input type="text" class="form-control text-success" id="results"
                                                    value="0"
                                                    style="border-left:0px;border-color: #3c763d;color: #3c763d !important;">
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="price"></label>
                                                <input type="range" class="form-control-range" id="price" value="0">
                                                <span class="float-left" id="spanmin">Rp. 12.000.000</span>
                                                <span class="float-right" id="spanmax">Rp. 100.000.000</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row d-flex" style="margin-top: 20px;">
                                        <div class="col-lg-6" style="display:table;">
                                            <h5 style="display: table-cell;vertical-align: middle;" class="float-left">
                                                Lama Pinjaman</h5>
                                        </div>
                                        <div class="col-lg-6" style="display:table-cell;">
                                            <select class="form-control w-100 p-1 text-success"
                                                aria-label="Default select example" id="bulan"
                                                style="border-color: #3c763d;color: #3c763d !important;vertical-align: middle;">
                                                <!-- <option>--Bulan--</option> -->
                                                <option value="1" selected>1 Bulan</option>
                                                <option value="3">3 Bulan</option>
                                                <option value="6">6 Bulan</option>
                                                <option value="12">12 Bulan</option>
                                                <option value="24">24 Bulan</option>
                                                <option value="36">36 Bulan</option>
                                                <option value="48">48 Bulan</option>
                                                <option value="60">60 Bulan</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-12">


                                            <div class="form-group">
                                                <label for="formControlRange"></label>
                                                <input type="range" class="form-control-range" id="range_bulan"
                                                    value="0" min="0" max="7" step="1">
                                                <span class="float-left">1</span>
                                                <span class="float-right">60</span>
                                            </div>

                                        </div>
                                    </div>




                                    <div class="row d-flex" style="margin-top:10px">
                                        <div class="col-lg-6" style="display:table;">
                                            <h5 style="display: table-cell;vertical-align: middle;" class="float-left">
                                                Suku Bunga</h5>
                                        </div>
                                        <div class="col-lg-6 ">
                                            <div class="input-group">

                                                <input type="text" class="form-control text-success"
                                                    aria-label="Amount (to the nearest dollar)" id="bunga_input"
                                                    value="2"
                                                    style="border-right:0px;border-color: #3c763d;color: #3c763d !important;">
                                                <span class="input-group-addon" id="result"
                                                    style="border-color: #3c763d;color: #3c763d !important;background: #fff;">%</span>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="formControlRange"></label>
                                                <input type="range" class="form-control-range" id="range_bunga" min="2"
                                                    max="20" value="0">
                                            </div>
                                            <span class="float-left">2%</span>
                                            <span class="float-right">20%</span>
                                        </div>
                                    </div>

                                    <form>

                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="panel panel-default badge-dark justify-content-center"
                                style="padding:25px;background: #343a40;color: #fff;">
                                <div align="center">
                                    <div class="panel-body">
                                        <h3 class="text-center">Cicilan Bulanan Kamu</h3>
                                        <span class="badge badge-light badge-lg"
                                            style="margin-top: 10px;margin-bottom: 10px;padding: 10px;background: #fff;color: #000;">Rp.<span
                                                id="hasil_id">....</span></span>
                                        <h3 class="text-center">Termasuk Biaya Bulanan</h3>
                                        <p><i style="font-size: 15px;">* Perhitungan bersifat simulasi dan bertujuan
                                                simulasi</i></p>
                                    </div>
                                    <div class="row pb-3 pt-3">
                                        <div class="col-lg-3 col-xs-3">
                                            <i class="fa tm-fa-5x fa-clock-o tm-margin-b-20"></i>
                                        </div>
                                        <div class="col-lg-9 col-xs-9">
                                            <div class="float-left">
                                                Berapa lama proses pengajuannya?
                                                <h6><strong class="float-left">Sekitar 5 Hari</strong></h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row pb-3 pt-3">
                                        <div class="col-lg-3 col-xs-3">
                                            <i class="fa tm-fa-5x fa-clock-o tm-margin-b-20"></i>
                                        </div>
                                        <div class="col-lg-9 col-xs-9">
                                            <div class="float-left">
                                                Apa saja yang diperlukan?
                                                <h6><strong class="float-left">KTP + Lainnya</strong></h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row pb-3 pt-3">
                                        <div class="col-lg-3 p-0 col-xs-3">
                                            <i class="fa tm-fa-5x fa-clock-o tm-margin-b-20"></i>
                                        </div>
                                        <div class="col-lg-9 col-xs-9">
                                            <div class="float-left">
                                                Kemana kamu dapat mengajukan?
                                                <h6><strong class="float-left">BPR Arsham Sejahtera</strong></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center mt-3" align="center">
                                    <button class="btn bg-white text-success">
                                        <h5><strong>AJUKAN SEKARANG</strong></h5>
                                    </button>
                                </div>
                            </div>


                        </div>
                    </div>


                </div>

            </div>
        </div>

    </div>
    </div>

    <script type="text/javascript">
    function getNominalPinjaman() {
        var select = document.getElementById('jumlah_pinjaman');
        var option = select.options[select.selectedIndex];
        var jumlah_pinjaman = option.value;
        var formatRupiah = new Intl.NumberFormat("id-ID");
        $.ajax({
            type: "get",
            url: '<?= BASE_URL ?>' + 'web/getKredit/' + jumlah_pinjaman,
            dataType: 'json',
            success: function(data) {
                $.each(data, function(i, data) {
                    $('#jangkawaktu_12').html('Rp ' + formatRupiah.format(data.jangkawaktu_12));
                    $('#jangkawaktu_18').html('Rp ' + formatRupiah.format(data.jangkawaktu_18));
                    $('#jangkawaktu_24').html('Rp ' + formatRupiah.format(data.jangkawaktu_24));
                    $('#jangkawaktu_30').html('Rp ' + formatRupiah.format(data.jangkawaktu_30));
                    $('#jangkawaktu_36').html('Rp ' + formatRupiah.format(data.jangkawaktu_36));
                    $('#jangkawaktu_48').html('Rp ' + formatRupiah.format(data.jangkawaktu_48));
                    $('#jangkawaktu_60').html('Rp ' + formatRupiah.format(data.jangkawaktu_60));
                });
            },
            error: function(respone) {
                console.log(respone);
            }
        });
    }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/0.9.0/jquery.mask.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#results').mask('000.000.000', {
            reverse: true
        });
        // $('#bunga_input').mask('000.000.000', {reverse: true});

        var p = document.getElementById("price")
        var a = document.getElementById("range_bunga");
        var b = document.getElementById("range_bulan");
        var c = document.getElementById("bulan");
        var d = document.getElementById("results");

        const values = [1, 3, 6, 12, 24, 36, 48, 60];

        p.addEventListener("input", function() {
            $('#results').val(format(p.value));
            hasil();
        }, false);

        d.addEventListener("input", function() {
            $('#price').attr("value", d.value);
            hasil();
        }, false);

        b.addEventListener("input", function() {
            $('#bulan').val(values[this.value]);
            hasil();
        }, false);

        c.addEventListener("change", function() {

            var isi = $('#bulan').val();

            if (isi == 1) {
                $('#range_bulan').val(0);
            } else if (isi == 3) {
                $('#range_bulan').val(1);
            } else if (isi == 6) {
                $('#range_bulan').val(2);
            } else if (isi == 12) {
                $('#range_bulan').val(3);
            } else if (isi == 24) {
                $('#range_bulan').val(4);
            } else if (isi == 36) {
                $('#range_bulan').val(5);
            } else if (isi == 48) {
                $('#range_bulan').val(6);
            } else if (isi == 60) {
                $('#range_bulan').val(7);
            }

            hasil();

        });


        $('#bunga_input').keypress(function() {
            if (event.which === 13) {
                hasil();
            }
        });
        $('#results').keypress(function() {
            if (event.which === 13) {
                hasil();
            }
        });


        a.addEventListener("input", function() {
            $('#bunga_input').val(format(a.value));
            hasil();
        }, false);


        $(document).on('keyup', '#bunga_input', function() {
            $("#range_bunga").val($(this).val());
        })



        $(document).on('keyup', '#results', function() {
            // console.log($(this).val().replaceAll('.', ''));
            $("#price").val($(this).val().replaceAll('.', ''));
        });

        $(document).on("click", ".radio", function() {
            var val = $('input[name="radioname"]:checked').val();
            console.log(val);




            // var val = $(this).val();
            var min = 0;
            var max = 0;

            if (val == 1) {
                min = 2000000;
                max = 15000000;
            } else if (val == 2) {
                min = 12000000;
                max = 100000000;
            } else if (val == 3) {
                min = 500000;
                max = 25000000;
            } else if (val == 4) {
                min = 8000000;
                max = 100000000;
            }

            console.log(min);
            console.log(max);

            $("#results").val(min);
            $('#price').attr("value", min);

            $("#price").attr("min", min);
            $("#price").attr("max", max);

            $("#spanmin").html("Rp. " + format(min));
            $("#spanmax").html("Rp. " + format(max));

        });



        var format = function(num) {
            var str = num.toString().replace("", ""),
                parts = false,
                output = [],
                i = 1,
                formatted = null;
            if (str.indexOf(".") > 0) {
                parts = str.split(".");
                str = parts[0];
            }
            str = str.split("").reverse();
            for (var j = 0, len = str.length; j < len; j++) {
                if (str[j] != ",") {
                    output.push(str[j]);
                    if (i % 3 == 0 && j < (len - 1)) {
                        output.push(".");
                    }
                    i++;
                }
            }
            formatted = output.reverse().join("");
            return ("" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
        };


        function hasil() {
            var jumlah = $('#results').val().replaceAll('.', '');
            var bulan = $('#bulan').val();
            var bunga = $('#bunga_input').val();
            var hasil = hitungCicilan(jumlah, bulan, bunga);

            $('#hasil_id').text(format(hasil));
        }

        function hitungCicilan(nominalPinjaman, lamaPinjamanBulan, bungaBulan) {
            bungaBulan = bungaBulan / 100;

            var cicilBungaBulan = nominalPinjaman * bungaBulan;
            var cicilPokok = nominalPinjaman / lamaPinjamanBulan;

            var akhir = cicilPokok + cicilBungaBulan;

            return akhir;
        }

    });
    </script>

    </section class="container" style="color: black;text-align:center">

    <?= get_footer(); ?>