<?= get_header(); ?>

<style>
.id-card-wrapper .center {
    justify-content: center;
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

.container {
    width: 50%;
    display: flex;
    justify-content: right;
    align-items: right;
}

.tree {
    position: relative;
    width: 50px;
    height: 50px;
    transform-style: preserve-3d;
    transform: rotateX(-20deg) rotateY(30deg);
    animation: treeAnimate 5s linear infinite;
}

@keyframes treeAnimate {
    0% {
        transform: rotateX(-20deg) rotateY(360deg);
    }

    100% {
        transform: rotateX(-20deg) rotateY(0deg);
    }
}

.tree div {
    position: absolute;
    top: -50px;
    left: 0;
    width: 100%;
    height: 100%;
    transform-style: preserve-3d;
    transform: translateY(calc(25px * var(--x))) translateZ(0px);
}

.tree div.branch span {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, #69c069, #77dd77);
    clip-path: polygon(50% 0%, 0% 100%, 100% 100%);
    border-bottom: 5px solid #00000019;
    transform-origin: bottom;
    transform: rotateY(calc(90deg * var(--i))) rotateX(30deg) translateZ(28.5px);
}

.tree div.stem span {
    position: absolute;
    top: 110px;
    /* updated top value */
    left: calc(50% - 7.5px);
    width: 15px;
    height: 50%;
    background: linear-gradient(90deg, #bb4622, #df7214);
    border-bottom: 5px solid #00000019;
    transform-origin: bottom;
    transform: rotateY(calc(90deg * var(--i))) translateZ(7.5px);
}

.shadow {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.4);
    filter: blur(20px);
    transform-style: preserve-3d;
    transform: rotateX(90deg) translateZ(-65px);
}
</style>

<body id="page-top">
    <?= get_navigation(); ?>

    <body class="header-content">
        <div class="header-content-inner">
            <h3 class="text-center" style="color:green;">Pembayaran Virtual Account</h3><br>
            <hr class="hrcenter">
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
                <div class="container">
                    <div class="tree">
                        <div class="branch" style="--x:0">
                            <span style="--i:0;"></span>
                            <span style="--i:1;"></span>
                            <span style="--i:2;"></span>
                            <span style="--i:3;"></span>
                        </div>
                        <div class="branch" style="--x:1">
                            <span style="--i:0;"></span>
                            <span style="--i:1;"></span>
                            <span style="--i:2;"></span>
                            <span style="--i:3;"></span>
                        </div>
                        <div class="branch" style="--x:2">
                            <span style="--i:0;"></span>
                            <span style="--i:1;"></span>
                            <span style="--i:2;"></span>
                            <span style="--i:3;"></span>
                        </div>
                        <div class="branch" style="--x:3">
                            <span style="--i:0;"></span>
                            <span style="--i:1;"></span>
                            <span style="--i:2;"></span>
                            <span style="--i:3;"></span>
                        </div>
                        <div class="stem">
                            <span style="--i:0;"></span>
                            <span style="--i:1;"></span>
                            <span style="--i:2;"></span>
                            <span style="--i:3;"></span>
                        </div>
                        <span class="shadow"></span>
                    </div>
                </div>
            </div>

        </div>

        <?= get_footer(); ?>

    </body>