<?= get_header(); ?>

<style>
.id-card-wrapper .center {
    justify-content: center;
    align-items: center;
    height: 100vh;
    width: 100%;
    display: flex;
}

.id-card {
    flex-basis: 100%;
    border: 1px solid #61f5f5;
    max-width: 30em;
    color: #fff;
    padding: 1em;
    margin: auto;
    background-color: #0d2c36;
    box-shadow: 0px 0px 3px 1px #12a0a0, inset 0px 0px 3px 1px #12a0a0;
}

.profile-row {
    display: flex;
    justify-content: center;
}

.profile-row .dp {
    flex-basis: 33.3%;
    align-self: center;
    position: relative;
    margin: 24px;
}

.profile-row .dp img {
    object-fit: cover;
    object-position: 0% 0%;
    width: 150px;
    height: 150px;
    border-radius: 50%;
    display: block;
    box-shadow: 0px 0px 4px 3px #12a0a0;
}

.profile-row .dp .dp-arc-outer {
    position: absolute;
    width: 162px;
    height: 162px;
    border: 6px solid transparent;
    border-bottom-color: #0ae0df;
    border-radius: 50%;
    top: -12px;
    left: -12px;
    animation-duration: 2s;
    animation-name: rotate-anticlock;
    animation-iteration-count: infinite;
    animation-timing-function: linear;
}

.profile-row .dp .dp-arc-inner {
    position: absolute;
    width: 150px;
    height: 150px;
    border: 6px solid transparent;
    border-top-color: #0ae0df;
    border-radius: 50%;
    top: -6px;
    left: -6px;
    animation-duration: 2s;
    animation-name: rotate-clock;
    animation-iteration-count: infinite;
    animation-timing-function: linear;
}

.profile-row .desc {
    padding: 1em;
    font-family: "Orbitron", sans-serif;
    color: #d3f8f7;
    letter-spacing: 1px;
    text-shadow: 0px 0px 4px #12a0a0;
}

.profile-row .desc h1 {
    margin: 0px;
}

@keyframes rotate-clock {
    from {
        transform: rotate(0deg);
    }

    to {
        transform: rotate(360deg);
    }
}

@keyframes rotate-anticlock {
    from {
        transform: rotate(0deg);
    }

    to {
        transform: rotate(-360deg);
    }
}

@keyframes rotate-clock {
    from {
        transform: rotate(0deg);
    }

    to {
        transform: rotate(360deg);
    }
}

@keyframes rotate-anticlock {
    from {
        transform: rotate(0deg);
    }

    to {
        transform: rotate(-360deg);
    }
}
</style>

<body id="page-top">
    <?= get_navigation(); ?>

    <body class="header-content">
        <div class="header-content-inner">
            <h3 class="text-center" style="color:green;">Pembayaran Virtual Account</h3><br>
            <hr class="hrcenter">
            <p class="text-center">*Pembayaran dengan Virtual Account Dapat Melalui ATM atau Mobile Banking atau
                Internet Banking</p>
            <div class="id-card-wrapper center">
                <div class="id-card">
                    <div class="profile-row">
                        <div class="dp">
                            <div class="dp-arc-outer"></div>
                            <div class="dp-arc-inner"></div>
                            <img src="https://i.pinimg.com/564x/6f/3f/42/6f3f424dca4b1172ca7c510efdd81faa.jpg" alt="">
                        </div>
                        <div class="desc">
                            <h1>Virtual Account</h1>
                            <p>Saat Ini Kami Tidak Melayani Pembayaran Virtual Account</p>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <?= get_footer(); ?>

    </body>