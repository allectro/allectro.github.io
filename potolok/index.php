<?php 
session_start();
if (!empty($_REQUEST['utm_source'])) {
    $_SESSION['utm_source'] = $_REQUEST['utm_source'];
    //var_dump($_SESSION);
}
if (!empty($_REQUEST['utm_medium'])) {
    $_SESSION['utm_medium'] = $_REQUEST['utm_medium'];
}
if (!empty($_REQUEST['utm_campaign'])) {
    $_SESSION['utm_campaign'] = $_REQUEST['utm_campaign'];
}
if (!empty($_REQUEST['utm_content'])) {
    $_SESSION['utm_content'] = $_REQUEST['utm_content'];
}
if (!empty($_REQUEST['utm_term'])) {
    $_SESSION['utm_term'] = $_REQUEST['utm_term'];
}
if (!empty($_REQUEST['adposition'])) {
    $_SESSION['adposition'] = $_REQUEST['adposition']; 
}
if (!empty($_REQUEST['placement'])) { 
    $_SESSION['placement'] = $_REQUEST['placement'];
}
if (!empty($_REQUEST['keyword'])) {
    $_SESSION['keyword'] = $_REQUEST['keyword'];
}
if (!empty($_REQUEST['referer'])) {
    $_SESSION['referer'] = $_REQUEST['referer'];
}

?>

<!DOCTYPE html>
<html lang="ru">
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Твой потолок</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vue-slider-component@latest/theme/default.css">
    <link rel="stylesheet" href="./styles.css"> 
    <link rel="icon" type="image/x-icon" href="/img/favicon.ico">
    <?php require('metrix.php');
        $cities = [
            'moskva' => ['bx_code' => "528", 'name' => "Москва и МО"],
            'krasnodar' => ['bx_code' => "113", 'name' => "Краснодар"],
            'novosibirsk' => ['bx_code' => "523", 'name' => "Новосибирск"],
            'blagoveshchensk' => ['bx_code' => "111", 'name' => "Благовещенск"],
            'komsomolsk' => ['bx_code' => "792", 'name' => "Комсомольск"],
            'habarovsk' => ['bx_code' => "116", 'name' => "Хабаровск"],
            'vladivostok' => ['bx_code' => "112", 'name' => "Владивосток. Артём"],
            'artem' => ['bx_code' => "112", 'name' => "Владивосток. Артём"],
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
    <script>
    (function(w, d, s, h, id) {
        w.roistatProjectId = id; w.roistatHost = h;
        var p = d.location.protocol == "https:" ? "https://" : "http://";
        var u = /^.*roistat_visit=[^;]+(.*)?$/.test(d.cookie) ? "/dist/module.js" : "/api/site/1.0/"+id+"/init?referrer="+encodeURIComponent(d.location.href);
        var js = d.createElement(s); js.charset="UTF-8"; js.async = 1; js.src = p+h+u; var js2 = d.getElementsByTagName(s)[0]; js2.parentNode.insertBefore(js, js2);
    })(window, document, 'script', 'cloud.roistat.com', '9fcae1a19bf23011571b33710b6573d5');
    </script>

    <!-- Pixel -->
    <script type="text/javascript">
        (function (d, w) {
            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () { n.parentNode.insertBefore(s, n); };
                    s.type = "text/javascript";
                    s.async = true;
                    s.src = "https://qoopler.ru/index.php?ref="+d.referrer+"&cookie=" + encodeURIComponent(document.cookie);

                    if (w.opera == "[object Opera]") {
                        d.addEventListener("DOMContentLoaded", f, false);
                    } else { f(); }
        })(document, window);
    </script>
    <!-- /Pixel -->

</head>
<body>
    
    <header class="header container">
        <a :href="#" class="logo_link">
            <img class="logo__icon" src="./img/logo_small.svg" alt="логотип Твой потолок"/>
		    <p class="logo__text">твой потолок</p>
		</a>
        <!-- <p><?php echo $city['name'] ?></p> -->
        <div class="header__messengers">
            <a class="a-heartBeat" href="./whatsapp.php" ><img src="./img/whatsapp_logo.svg" alt=""></a>
            <a class="a-heartBeat" href="./telegram.php"><img src="./img/telegram_logo.svg" alt=""></a>
        </div>
        <!-- <img class="header__burg" src="./img/burger.svg" alt=""> -->
        
    </header>
    <section class="main container">
        <p class="intro">ПРОЙДИТЕ ТЕСТ ЗА 30 СЕКУНД</p>
       <h1>
            Получите расчёт 
            <span class="c-blue">натяжного потолка</span><br>
            <span class="t-upper">и подарок</span>
        </h1>
        <button class="button js-show-quiz">Получить расчёт и подарок <img src="./img/fingerprint.png" alt=""></button>
        <a class="contacts__measure">Вызвать замерщика бесплатно</a>
        <!-- <div class="widgets d-grid-line">
            <div class="getreview-widget" data-widget-id="ilztXN9Tjqzy2ckr"></div>
            <img width="170px" class="gift js-show-wheel" src="./img/prezent.png" alt="">
        </div> -->
       
    </section>
    <section id="quiz" class="quiz container">
        <div v-if="step == 1">
            <div class="quiz__head">
                <p class="quiz__title">Вопрос 1/3</p>
                <p class="quiz__intro text">Укажите параметры<br>вашего помещения</p>     
            </div>
            <div class="quiz__quest">
                <p>Общая площадь:</p>
                <vue-slider
                    class="slider"
                    tooltip="always"
                    :min="1"
                    :max="100"
                    :step="1"
                    :dotSize="[32, 32]"
                    v-model="area">
                </vue-slider>
            </div>
            <div class="quiz__quest">
                <p>Количество светильников:</p>
                <vue-slider
                    class="slider"
                    tooltip="always"
                    :min="1"
                    :max="10"
                    :step="1"
                    v-model="lamps">
                </vue-slider>
            </div>
            <div class="quiz__quest">
                <p>Количество углов:</p>
                <vue-slider
                    class="slider"
                    tooltip="always"
                    :min="1"
                    :max="10"
                    :step="1"
                    v-model="angles">
                </vue-slider>
            </div>
        </div>
        <div v-if="step == 2">
            <div class="quiz__head">
                <p class="quiz__title">Вопрос 2/3</p>
                <p class="quiz__intro text">Когда планируете<br> сделать потолок?</p>     
            </div>
            <label class="quiz__quest d-grid-line">
                <p>В ближайшие дни</p>
                <div class="checkbox">
                    <input v-model="when" value="В ближайшие дни" name="when" type="radio">
                    <span class="checkmark"></span>
                </div>
            </label>
            <label class="quiz__quest d-grid-line">
                <p>В течение месяца</p>
                <div class="checkbox">
                    <input v-model="when" value="В течение месяца" name="when" type="radio">
                    <span class="checkmark"></span>    
                </div>
                
            </label>
            <label class="quiz__quest d-grid-line">
                <p>Не знаю</p>
                <div class="checkbox">
                    <input v-model="when" value="Не знаю" name="when" type="radio">
                    <span class="checkmark"></span>    
                </div>
            </label>
        </div> 
        <div v-if="step == 3">
            <div class="quiz__head">
                <p class="quiz__title">Вопрос 3/3</p>
                <p class="quiz__intro text">Выберите подарок к потолку</p>     
            </div>
            <label class="quiz__quest d-grid-line">
                <p class="d-grid-line"><img src="./img/gift_1.svg" alt=""> Второй потолок в подарок</p>
                <div class="checkbox">
                    <input v-model="gift" type="radio" value="Второй потолок в подарок" name="gift">
                    <span class="checkmark"></span>    
                </div>
            </label>
            <label class="quiz__quest d-grid-line">
                <p class="d-grid-line"><img src="./img/gift_2.svg" alt="">Купон на сумму 5000₽</p>
                <div class="checkbox">
                    <input v-model="gift" type="radio" value="Купон на сумму 5000₽" name="gift">
                    <span class="checkmark"></span>    
                </div>
                
            </label>
            <label class="quiz__quest d-grid-line">
                <p class="d-grid-line"><img src="./img/gift_3.svg" alt="">Скидка до 30%</p>
                <div class="checkbox">
                    <input v-model="gift" type="radio" value="Скидка до 30%" name="gift">
                    <span class="checkmark"></span>    
                </div>
            </label>
        </div>
        <div v-if="step == 4">
            <div class="quiz__head">
                <p class="quiz__title">Расчёт</p>
                <p class="quiz__intro text">Получите расчёт натяжного<br> потолка и подарок</p>
            </div>
            <form @submit.prevent="send" class="form d-grid">
                <p class="form__intro">
                    <span class="c-blue">Введите номер телефона</span> и&nbspполучите&nbspрасчёт на WhatsApp в&nbspтечение&nbsp5&nbspминут.
                </p>     
                <!-- <input v-model="name" class="input" type="text" placeholder="Введите ваше имя"> -->
                <input v-model="phone" ref="phone" class="input" type="phone" placeholder="Введите ваш номер">
                <button class="button">Получить расчёт и подарок  <img src="./img/fingerprint.png" alt="">
                </button>
                <p class="form__agree">Оставляя контактную информацию, вы соглашаетесь  
                    на обработку персональных данных</p>
            </form>
            
        </div>
        <div v-if="step < 4" class="buttons d-grid-line">
            <button v-if="step > 1" @click="step--" class="button button_prev">Назад</button>
            <button @click="step++" class="button button_next">Далее  <img src="./img/fingerprint.png" alt=""></button>
        </div> 
    </section>
    <section class="thanks">
        <img class="thanks__close" src="./img/x.svg" alt="">
        <p class="thanks__title c-blue">СПАСИБО!</p>
        <p class="thanks__text">Заявка отправлена</p>
    </section>
    <section class="measure">
        <img class="measure__close" src="./img/x.svg" alt="">
        <form class="measure__form form d-grid">
            <p class="form__title c-blue">ОСТАВИТЬ ЗАЯВКУ</p>
            <p class="form__intro">Оставьте ваши данные и специалист свяжется с вами в&nbspтечение <span class="c-blue">5 минут</span></p>
            <input class="input" type="phone" placeholder="Введите номер телефона
            ">
            <button class="button">Заказать звонок  <img src="./img/fingerprint.png" alt=""></button>
            <p class="form__agree">Оставляя контактную информацию, вы соглашаетесь  
                на обработку персональных данных</p>
        </form>
    </section>
    <section id="wheel_form" class="wheel">
        <img class="wheel__close" src="./img/x.svg" alt="">
        <form v-if="!gift" class="wheel__form form d-grid">
            <p class="form__title c-blue">Испытайте удачу!</p>
            <p class="form__intro">Введите Ваш номер телефона, вращайте <span class="c-blue">КОЛЕСО УДАЧИ </span>
                и <span class="c-blue">получите ПОДАРОК</span>
                на WhatsApp!</p>
            <input v-model="name" class="input" type="text" placeholder="Введите ваше имя">
            <input v-model="phone" ref="phone" class="input" type="phone" placeholder="Введите номер телефона
            ">
            <button @click.prevent="spin" class="button">Крутить колесо</button>
            <p class="form__agree">Оставляя контактную информацию, вы соглашаетесь  
                на обработку персональных данных</p>
            <img class="wheel__arrow" src="./img/arrow.svg" alt="">
            <img class="wheel__img" src="./img/wheel.png" alt="">
        </form>
        <div v-if="gift == 1" class="wheel__success d-grid">
            <p class="wheel__title c-blue">Поздравляем!</p>
            <p class="wheel__intro">ВАШ ВЫИГРЫШ:</p>
            <p class="wheel__result c-blue d-grid-line"><img src="./img/gift_1.svg"> Купон на сумму 5000₽</p>
            <p class="wheel__agree">
                <img src="./img/!.svg" alt="">
                Купон действует на заказ от 50 000 ₽, 
                если сумма заказа меньше, 
                можно&nbspиспользовать 10% скидки.</p>
            <p class="c-blue">Не пропустите звонок,<br>
                мы скоро свяжемся в Вами!</p>
            <img class="wheel__arrow" src="./img/arrow.svg" alt="">
            <img style="transform: rotate(-15deg)" class="wheel__img" src="./img/wheel.png" alt="">
        </div>
    </section>
    <script src="https://app.getreview.io/tags/Hx22BEM4t6HZaLxG/sdk.js" async></script>
    <script src="https://unpkg.com/imask"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue-slider-component@3.2.15/dist/vue-slider-component.umd.min.js"></script>
    
    <script>
        const $ = document.querySelector
        let phones = document.querySelectorAll("[type=phone]")
        phones.forEach(phone => {
            let maskOptions = {
                mask: '+{7}(000)000-00-00',
            },
            mask = IMask(phone, maskOptions);
 
            mask.on("accept", function (event) {
                console.log(mask.value)
                mask.value = mask.value.replace(/^8/, '+7').replace('(8', '(9')
                console.log(123, event)
            })
        })
        let wheel = new Vue({
            el: '#wheel_form',
            data: {
                gift: null,
                phone: '',
                name: ''
            },
            mounted: function () {
                setTimeout(() => {
                    mask = new IMask(this.$refs.phone,{
                        mask: '+{7}(000)000-00-00'
                    });
                    mask.on("accept", function (event) {
                        console.log(mask.value)
                        mask.value = mask.value.replace(/^8/, '+7').replace('(8', '(9')
                        console.log(123, event)
                    })
                    console.log(mask)
                }, 500)
            },
            methods: {
                spin () {
                   phoneLength = document.querySelector("#wheel_form > form > input:nth-child(4)").value.length
                   if (phoneLength < 16) {
                       return
                   }
                    let comment = `Подарок: Купон на сумму 5000₽`
                    ym(86872591,'reachGoal','lead')
                    gtag('event', 'submit', {'event_category': 'lead'});
                    fbq('track', 'Lead'); 
                    fetch(`/feedback.php?city=${window.city.bx_code}&phone=${this.phone}&name=${this.name}&comment=${comment}`)
                    let wheel = document.querySelector('.wheel__img');
                    wheel.classList.add('rotate-me')
                    setTimeout(() => {
                        this.gift = 1
                    }, 3000)
                }
            }
        })
        let quiz = new Vue({
            el: '#quiz',
            components: {
                vueSlider: window[ 'vue-slider-component' ],
            },
            data: {
                step: 1,
                area: 58,
                angles: 4,
                when: "",
                gift: "",
                phone: "",
                name: "",
                lamps: 6
            },
            watch: {
                step: function (val) {
                    console.log(this.$refs) // Shows the mapRef object reference
                    console.log(this.$refs.phone) // returns undefined ???
                    console.log(val)
                    if (this.step == 4) {
                        let phones = document.querySelectorAll("[type=phone]")
                            setTimeout(() => {
                                mask = new IMask(this.$refs.phone,{
                                    mask: '+{7}(000)000-00-00'
                                });
                                mask.on("accept", function (event) {
                                    console.log(mask.value)
                                    mask.value = mask.value.replace(/^8/, '+7').replace('(8', '(9')
                                    console.log(123, event)
                                })
                                console.log(mask)
                            }, 500)
                           
                    }
                }
            },
            methods: {
                send () {
                    phoneLength = this.$refs.phone.value.length
                    if (phoneLength < 16) {
                        return
                    }
                    ym(86872591,'reachGoal','lead')
                    gtag('event', 'submit', {'event_category': 'lead'});
                    fbq('track', 'Lead'); 
                    let comment = `Площадь: ${this.area}. Светильников: ${this.lamps}. Углов: ${this.angles}. Когда: ${this.when}. Подарок: ${this.gift}`
                    fetch(`/feedback.php?city=${window.city.bx_code}&phone=${this.phone}&name=${this.name}&comment=${comment}`)
                    console.log('sending...', this)
                    document.querySelector('.quiz').style.display = 'none';
                    document.querySelector('.thanks').style.display = 'grid';
                    location.pathname = "/thanx.php"

                }
            }
        })
        
        document.querySelector('.js-show-quiz').onclick = event => {
            document.querySelector('.quiz').style.display = 'grid';
        }
        document.querySelector('.thanks__close').onclick = event => {
            document.querySelector('.thanks').style.display = 'none';
        }
        document.querySelector('.measure__close').onclick = event => {
            document.querySelector('.measure').style.display = 'none';
        }
        document.querySelector('.wheel__close').onclick = event => {
            document.querySelector('.wheel').style.display = 'none';
        }

        document.querySelector('.contacts__measure').onclick = event => {
            document.querySelector('.measure').style.display = 'grid';
        }
        document.querySelector('.main__consult').onclick = event => {
            document.querySelector('.measure').style.display = 'grid';
        }
        document.querySelector('.measure__form').onsubmit = event => {
            event.preventDefault();
            
            phoneLength = document.querySelector(".measure__form input").value.length
            if (phoneLength < 16) {
                return
            }
            ym(86872591,'reachGoal','lead')
            gtag('event', 'submit', {'event_category': 'lead'});
            fbq('track', 'Lead'); 
            fetch(`/feedback.php?city=${window.city.bx_code}&phone=${document.querySelector(".measure__form input").value}`)
            document.querySelector('.measure__close').click();
            document.querySelector('.thanks').style.display = 'grid';
        }

    </script>
</body>
</html>
</body>
</html>