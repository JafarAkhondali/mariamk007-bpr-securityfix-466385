<?= get_header(); ?>

<style type="text/css">
.ag-format-container {
    width: 1142px;
    margin: 0 auto;
    position: center;
    /* top: 50%;
    left: 30%;
    margin: -25px 0 0 -25px; */
}

.ag-courses_box {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: start;
    -ms-flex-align: start;
    align-items: flex-start;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;

    padding: 50px 0;
}

.ag-courses_item {
    -ms-flex-preferred-size: calc(33.33333% - 30px);
    flex-basis: calc(33.33333% - 30px);

    margin: 0 15px 30px;

    overflow: hidden;

    border-radius: 28px;
}

.ag-courses-item_link {
    display: block;
    padding: 30px 20px;
    background-color: #121212;

    overflow: hidden;

    position: relative;
}

.ag-courses-item_link:hover,
.ag-courses-item_link:hover .ag-courses-item_date {
    text-decoration: none;
    color: #FFF;
}

.ag-courses-item_link:hover .ag-courses-item_bg {
    -webkit-transform: scale(10);
    -ms-transform: scale(10);
    transform: scale(10);
}

.ag-courses-item_title {
    min-height: 87px;
    margin: 0 0 25px;

    overflow: hidden;

    font-weight: bold;
    font-size: 30px;
    color: #FFF;

    z-index: 2;
    position: relative;
}

.ag-courses-item_date-box {
    font-size: 18px;
    color: #FFF;

    z-index: 2;
    position: relative;
}

.ag-courses-item_date {
    font-weight: bold;
    color: #f9b234;

    -webkit-transition: color .5s ease;
    -o-transition: color .5s ease;
    transition: color .5s ease
}

.ag-courses-item_bg {
    height: 128px;
    width: 128px;
    background-color: #f9b234;

    z-index: 1;
    position: absolute;
    top: -75px;
    right: -75px;

    border-radius: 50%;

    -webkit-transition: all .5s ease;
    -o-transition: all .5s ease;
    transition: all .5s ease;
}

.ag-courses_item:nth-child(2n) .ag-courses-item_bg {
    background-color: #3ecd5e;
}

.ag-courses_item:nth-child(3n) .ag-courses-item_bg {
    background-color: #e44002;
}

.ag-courses_item:nth-child(4n) .ag-courses-item_bg {
    background-color: #952aff;
}

.ag-courses_item:nth-child(5n) .ag-courses-item_bg {
    background-color: #cd3e94;
}

.ag-courses_item:nth-child(6n) .ag-courses-item_bg {
    background-color: #4c49ea;
}



@media only screen and (max-width: 979px) {
    .ag-courses_item {
        -ms-flex-preferred-size: calc(50% - 30px);
        flex-basis: calc(50% - 30px);
    }

    .ag-courses-item_title {
        font-size: 24px;
    }
}

@media only screen and (max-width: 767px) {
    .ag-format-container {
        width: 96%;
    }

}

@media only screen and (max-width: 639px) {
    .ag-courses_item {
        -ms-flex-preferred-size: 100%;
        flex-basis: 100%;
    }

    .ag-courses-item_title {
        min-height: 72px;
        line-height: 1;

        font-size: 24px;
    }

    .ag-courses-item_link {
        padding: 22px 40px;
    }

    .ag-courses-item_date-box {
        font-size: 16px;
    }
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
            <h1 style="color:green;">Pilih Tampilan Simulasi Kredit</h1>
            <hr class="hrcenter">
            <div class="ag-format-container">
                <div class="ag-courses_box" style="justify-content: center;">

                    <div class="ag-courses_item">
                        <a href="<?= base_url('web/detail_simulasi_kredit') ?>" class="ag-courses-item_link">
                            <div class="ag-courses-item_bg"></div>

                            <div class="ag-courses-item_title">
                                SIMULASI KREDIT
                            </div>
                            <div class="ag-courses-item_date-box">
                                Digunakan:
                                <span class="ag-courses-item_date">
                                    Untuk simulasi pinjaman
                                </span>
                            </div>
                        </a>
                    </div>

                    <div class="ag-courses_item">
                        <a href="detail_kalkulator_kredit" class="ag-courses-item_link">
                            <div class="ag-courses-item_bg"></div>

                            <div class="ag-courses-item_title">
                                KALKULATOR KREDIT
                            </div>
                            <div class="ag-courses-item_date-box">
                                Digunakan:
                                <span class="ag-courses-item_date">
                                    Untuk kalkulasi kredit
                                </span>
                            </div>
                        </a>
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