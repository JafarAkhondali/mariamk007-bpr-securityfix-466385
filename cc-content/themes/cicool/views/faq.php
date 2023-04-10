<?= get_header(); ?>
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" /> -->

<body id="page-top">
    <?= get_navigation(); ?>

    <body>

        <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap");

        :root {
            --accent-color: green;
        }

        h1 {
            margin: 50px 0 30px;
            text-align: center;
            color: var(--accent-color);
        }

        .faq-container {
            max-width: 600px;
            margin: 0 auto;
            border-radius: 10px;
            background-color: #fff;
            overflow: hidden;
            box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
        }

        .faq {
            box-sizing: border-box;
            background: transparent;
            padding: 30px;
            position: relative;
            overflow: hidden;
        }

        .faq:not(:first-child) {
            border-top: 1px solid #e6e6e6;
        }

        .faq-title {
            margin: 0 35px 0 0;
        }

        .faq-text {
            margin: 30px 0 0;
            display: none;
            line-height: 1.5rem;
        }

        .faq.active {
            background-color: #f8f8f8;
            box-shadow: inset 4px 0px 0px 0px var(--accent-color);
        }

        .faq.active .faq-title {
            color: var(--accent-color);
        }

        .faq.active .faq-text {
            display: block;
        }

        .faq-toggle {
            background-color: transparent;
            border: 1px solid #e6e6e6;
            color: inherit;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            padding-top: 3px;
            position: absolute;
            top: 30px;
            right: 30px;
            height: 30px;
            width: 30px;
            transition: 0.3s ease;
        }

        .faq-toggle:focus {
            outline: none;
        }

        .faq.active .faq-toggle {
            transform: rotate(180deg);
            background-color: var(--accent-color);
            border-color: var(--accent-color);
            color: #fff;
        }
        </style>

        <h3 class="text-center pt-50" style="color:green;">FAQ</h3>
        <hr class="hrcenter">
        <div class="faq-container" style=" min-width: 90vw; color:black;">
            <?php foreach ($faqs as $faq): ?>
            <div class="faq">
                <h3 class="faq-title">
                    <?= $faq->pertanyaan ?>
                </h3>
                <p class="faq-text"><?= $faq->jawaban ?></p>
                <button class="faq-toggle">
                    <i class="fa fa-angle-down"></i>
                </button>
            </div>
            <?php endforeach;?>
        </div>

        <?= get_footer(); ?>

    </body>
    <script>
    const buttons = document.querySelectorAll(".faq-toggle");

    buttons.forEach((button) => {
        button.addEventListener("click", () =>
            button.parentElement.classList.toggle("active")
        );
    });
    </script>