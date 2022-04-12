<!doctype html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->

    <title>Твой стиль</title>

    <link rel="stylesheet" href="./css/telegram.css">

    <?php require('metrix.php');
        $cities = [
            'moskva' => ['bx_code' => "528", 'name' => "Москва и МО"],
            'krasnodar' => ['bx_code' => "113", 'name' => "Краснодар"],
            'novosibirsk' => ['bx_code' => "523", 'name' => "Новосибирск"],
            'blagoveshchensk' => ['bx_code' => "111", 'name' => "Благовещенск"],
            'komsomolsk-na-amure' => ['bx_code' => "792", 'name' => "Комсомольск"],
            'habarovsk' => ['bx_code' => "116", 'name' => "Хабаровск"],
            'vladivostok' => ['bx_code' => "112", 'name' => "Владивосток. Артём"],
            'ussuriysk' => ['bx_code' => "115", 'name' => "Уссурийск"],
            'nahodka' => ['bx_code' => "114", 'name' => "Находка"],
            'sochi' => ['bx_code' => "117", 'name' => "Сочи. Адлер"],

        ];

        if (!empty($_REQUEST['city'])) {
            $city = $cities[$_REQUEST['city']];
        } else {
            $city = $cities['moskva'];
        }
        echo "<script>window.city = ".json_encode($city)."</script>";
    ?>

</head>
<body>

<header class="header">
    <div class="container">
        <a href="https://telegram.org/" class="main-logo">
            <img src="./img/telegram_logo.svg" alt="WhatsApp logo">

            <span class="main-logo__title">
                Telegram
            </span>
        </a>
    </div>
</header>
<header class="sub-header">
    <div class="container">
        <a href="https://telegram.org/">
            Don't have <b>Telegram</b> yet? Try it now!
            <!-- <img src="./img/telegram/arrow-right.svg" alt="Arrow right icon" class="sub-header__icon"> -->
        </a>
    </div>
</header>
<main class="wrapper">
    <div class="content">

        <div class="container">

            <section class="action-block">
                <img width="170px" src="./img/logo_color.svg" alt="" class="action-block__logo">

                <h1 class="action-block__title">
                    ФАБРИКА ПОТОЛКОВ
                </h1>
            
                <p class="action-block__paragraph">
                    Для расчёта, консультации и записи на бесплатный замер начните чат
                </p>
            
                <form class="form js-whatsapp-form" action="" method="post">
                    <div class="form__input-field">
                        <input type="phone" name="phone" class="form__input phone-mask" placeholder="Введите номер Telegram" value=""/>
            
                        <div class="error_wrapper" style="display: none"><span class="error_alert">некорректный номер</span></div>
                    </div>
            
                    <button type="submit" class="form__btn js-send-btn">Начать чат</button>
                </form>

                <footer class="action-block__footer">
                    <!-- <a href="/" class="action-block__link">
                        Перейти в Telegram-канал
                    </a> -->
                </footer>
            </section>

        </div>

    </div>
</main>
<script src="https://unpkg.com/imask"></script>
<script>
    const $ = document.querySelector
    let phones = document.querySelectorAll("[type=phone]")
    phones.forEach(phone => {
        let maskOptions = {
            mask: '+{7}(000)000-00-00'
        },
        mask = IMask(phone, maskOptions);
        mask.on("accept", function (event) {
            console.log(mask.value)
            mask.value = mask.value.replace(/^8/, '+7').replace('(8', '(9')
            console.log(123, event)
        })
    })
    document.querySelector('.form').onsubmit = event => {
        event.preventDefault();
        
        phoneLength = document.querySelector(".form input").value.length
        if (phoneLength < 16) {
            return
        }
        document.querySelector('body > main > div > div > section > form > button').disabled = true
        document.querySelector('body > main > div > div > section > form > button').innerText = 'Заявка отправлена'
        ym(86872591,'reachGoal','lead')
        gtag('event', 'submit', {'event_category': 'lead'});
        fbq('track', 'Lead'); 
        fetch(`/feedback.php?city=${window.city.bx_code}&name="telegram"&phone=${document.querySelector(".form input").value}`)
    }
</script>
<script src="/js/whatsapp/jquery-3.3.1.min.js"></script>
<script src="/js/whatsapp/jquery.inputmask.min.js"></script>
<script src="/js/whatsapp/app.js?v=1.2"></script>
</body>
</html>
