<!doctype html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Твой потолок</title>

    <link rel="stylesheet" href="./css/whatsapp.css">

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
        <div class="header__content">
            <a href="/" class="main-logo">
                <img src="./img/whatsapp_logo.svg" alt="WhatsApp logo">

                <span class="main-logo__title">
                    WhatsApp
                </span>
                <span class="main-logo__title main-logo__title--mobile">
                    Поделиться в WhatsApp
                </span>


            </a>

            <nav class="navbar header__list">
                <header class="navbar__header">
                    <a href="/" class="main-logo">
                        <img src="/img/whatsapp/main-logo.svg" alt="WhatsApp logo">
                    </a>

                    <span class="navbar__close-btn js-navbar-close-btn"></span>
                </header>

                <ul>
                    <li>
                        <a href="https://web.whatsapp.com/🌐/ru">WhatsApp Web</a>
                    </li>
                    <li>
                        <a href="https://www.whatsapp.com/features/">Функции</a>
                    </li>
                    <li>
                        <a href="https://www.whatsapp.com/download/">Скачать</a>
                    </li>
                    <li>
                        <a href="https://www.whatsapp.com/security/">Безопасность</a>
                    </li>
                    <li>
                        <a href="https://faq.whatsapp.com/">Справочный центр</a>
                    </li>
                </ul>

                <select name="" class="select-box">
                    <option value="RU">русский</option>
                    <option value="EN">английский</option>
                </select>
            </nav>


            <select name="" class="select-box" value="RU">
                <option value="RU">RU</option>
                {{--<option value="EN">EN</option>--}}
            </select>

            <button class="btn-expand header__hamburger js-navbar-show-btn"></button>
        </div>
    </div>
</header>
<main class="wrapper">
    <div class="content">
        <div class="container">

            <section class="action-block">
                <h1 class="action-block__title">
                    Начните чат в WhatsApp с&nbsp«Твой&nbspпотолок»
                </h1>
            
                <form class="form js-whatsapp-form" action="" method="post">
                    <div class="form__input-field">
                        <input type="phone" name="phone" class="form__input phone-mask" placeholder="Введите номер WhatsApp" value=""/>
            
                        <div class="error_wrapper" style="display: none"><span class="error_alert">некорректный номер</span></div>
                    </div>
                    <button type="submit" class="form__btn js-send-btn">Начать чат</button>
                </form>

                <div class="action-block__separator"></div>

                <footer class="action-block__footer">
                    <p>
                        Пока не пользуетесь WhatsApp?
                    </p>
                    <a href="https://www.whatsapp.com/download/" class="action-block__link">
                        Скачать
                    </a>
                </footer>
            </section>
        </div>
    </div>
    <footer class="footer">

        <div class="container">
            <div class="footer-navbar-group">
                <ul class="footer-navbar footer-navbar-group__item">
                    <li class="footer-navbar__title">
                        WhatsApp
                    </li>

                    <li class="footer-navbar__item">
                        <a href="https://www.whatsapp.com/features/">Функции</a>
                    </li>
                    <li class="footer-navbar__item">
                        <a href="https://www.whatsapp.com/security/">Безопасность</a>
                    </li>
                    <li class="footer-navbar__item">
                        <a href="https://www.whatsapp.com/download/">Скачать</a>
                    </li>
                    <li class="footer-navbar__item">
                        <a href="https://web.whatsapp.com/🌐/ru">WhatsApp Web</a>
                    </li>
                    <li class="footer-navbar__item">
                        <a href="https://www.whatsapp.com/business/">Business</a>
                    </li>
                    <li class="footer-navbar__item">
                        <a href="https://www.whatsapp.com/privacy">Конфиденциальность</a>
                    </li>
                </ul>
                <ul class="footer-navbar footer-navbar-group__item">
                    <li class="footer-navbar__title">
                        Компания
                    </li>
                    <li class="footer-navbar__item">
                        <a href="https://www.whatsapp.com/about/">Сведения</a>
                    </li>
                    <li class="footer-navbar__item">
                        <a href="https://www.whatsapp.com/join/">Карьера</a>
                    </li>
                    <li class="footer-navbar__item">
                        <a href="https://www.whatsappbrand.com/">Бренд-Центр</a>
                    </li>
                    <li class="footer-navbar__item">
                        <a href="https://www.whatsapp.com/contact/">Контакты</a>
                    </li>
                    <li class="footer-navbar__item">
                        <a href="https://blog.whatsapp.com/">Блог</a>
                    </li>
                    <li class="footer-navbar__item">
                        <a href="https://www.whatsapp.com/stories/">Истории успеха с WhatsApp</a>
                    </li>
                </ul>
                <ul class="footer-navbar footer-navbar-group__item">
                    <li class="footer-navbar__title">
                        Скачать
                    </li>

                    <li class="footer-navbar__item">
                        <a href="https://www.whatsapp.com/download/">Mac/ПК</a>
                    </li>
                    <li class="footer-navbar__item">
                        <a href="https://www.whatsapp.com/android/">Android</a>
                    </li>
                    <li class="footer-navbar__item">
                        <a href="https://www.whatsapp.com/appstore/">iPhone</a>
                    </li>
                </ul>
                <ul class="footer-navbar footer-navbar-group__item">
                    <li class="footer-navbar__title">
                        Помощь
                    </li>

                    <li class="footer-navbar__item">
                        <a href="https://faq.whatsapp.com/">Справочный центр</a>
                    </li>
                    <li class="footer-navbar__item">
                        <a href="https://twitter.com/whatsapp">Twitter</a>
                    </li>
                    <li class="footer-navbar__item">
                        <a href="https://www.facebook.com/WhatsApp">Facebook</a>
                    </li>
                    <li class="footer-navbar__item">
                        <a href="https://www.whatsapp.com/coronavirus/">Коронавирус</a>
                    </li>
                </ul>
            </div>
        </div>

    </footer>
    <footer class="footer-copyright">
        <div class="container">
            <span class="footer-copyright__company">
                2021 © WhatsApp LLC
            </span>
            <span>
                Конфиденциальность и Условия
            </span>
        </div>
    </footer>
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
        fetch(`/feedback.php?city=${window.city.bx_code}&name="whatsapp"&phone=${document.querySelector(".form input").value}`)
    }
</script>
<script src="./js/whatsapp/jquery-3.3.1.min.js"></script>
<script src="./js/whatsapp/jquery.inputmask.min.js"></script>
<script src="./js/whatsapp/app.js?v=1.4"></script>
</body>
</html>
