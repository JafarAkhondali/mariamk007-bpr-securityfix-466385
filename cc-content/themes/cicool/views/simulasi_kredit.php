<?= get_header(); ?>

<body id="page-top">
    <?= get_navigation(); ?>
    <div class="header-content text-center">
        <div class="header-content-inner">
            <div>
                <h1>Simulasi Kredit</h1>
                <hr class="hrcenter">
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
                success: function (data) {
                    $.each(data, function (i, data) {
                        $('#jangkawaktu_12').html('Rp ' + formatRupiah.format(data.jangkawaktu_12));
                        $('#jangkawaktu_18').html('Rp ' + formatRupiah.format(data.jangkawaktu_18));
                        $('#jangkawaktu_24').html('Rp ' + formatRupiah.format(data.jangkawaktu_24));
                        $('#jangkawaktu_30').html('Rp ' + formatRupiah.format(data.jangkawaktu_30));
                        $('#jangkawaktu_36').html('Rp ' + formatRupiah.format(data.jangkawaktu_36));
                        $('#jangkawaktu_48').html('Rp ' + formatRupiah.format(data.jangkawaktu_48));
                        $('#jangkawaktu_60').html('Rp ' + formatRupiah.format(data.jangkawaktu_60));
                    });
                },
                error: function (respone) {
                    console.log(respone);
                }
            });
        }
    </script>

    <?= get_footer(); ?>