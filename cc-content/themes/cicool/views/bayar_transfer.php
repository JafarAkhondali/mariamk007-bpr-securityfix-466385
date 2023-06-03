<?= get_header(); ?>

<style>
.row {
    display: flex;
    justify-content: center;
    align-items: center;
}

.card {
    border-radius: 5px;
    box-shadow: 7px 7px 13px 0px rgba(50, 50, 50, 0.22);
    padding: 30px;
    margin: 20px;
    width: 400px;
    transition: all 0.3s ease-out;
}

.card:hover {
    transform: translateY(-5px);
    cursor: pointer;
}

.card p {
    color: #a3a5ae;
    font-size: 16px;
}

.image {
    float: right;
    max-width: 64px;
    max-height: 64px;
}

.blue {
    border-left: 3px solid #4895ff;
}

.green {
    border-left: 3px solid #3bb54a;
}
</style>

<body id="page-top">
    <?= get_navigation(); ?>

    <body class="header-content">
        <div class="header-content-inner">
            <h3 class="text-center" style="color:green;">Pembayaran Transfer</h3><br>
            <hr class="hrcenter">

            <p class="text-center" style="color:black;">*Berikut Ini Nomor Rekening BPR Arsham Sejahtera. Anda Dapat
                Memilih Salah Satu Diantara Pilihan Dibawah Ini</p><br>

            <div class="row">
                <div class="card green">
                    <h2>Mandiri</h2>
                    <p>Nomor Rek: 108-0012-152121</p>
                    <img class="image" src="https://i.pinimg.com/564x/16/5d/36/165d3631292b958714f9829f20a02b17.jpg"
                        alt="money" />
                </div>

                <div class="card blue">
                    <h2>BRI</h2>
                    <p>Nomor Rek: 0696-0100-2351-567</p>
                    <img class="image" src="https://i.pinimg.com/564x/8e/99/8d/8e998dae40b35a53bc3cf375c72763a4.jpg"
                        alt="settings" />
                </div>
            </div>
        </div>

        <?= get_footer(); ?>

    </body>