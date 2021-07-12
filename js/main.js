// ServicesSlider
var ServicesSlides = document.querySelectorAll('.services-slide');
var ServiceButtons = document.querySelectorAll('.services-item');

if (ServicesSlides.length) {
  for (var i = 0; i < ServiceButtons.length; i++) {
    ServiceButtons[i].addEventListener('click', function (e) {
      document.querySelector('.services-visible').classList.remove('services-visible');
      document.querySelector('.services-item-current').classList.remove('services-item-current');

      ServicesSlides[e.target.dataset.slide].classList.add('services-visible');
      ServiceButtons[e.target.dataset.slide].classList.add('services-item-current');
    })
  }
}

// FeaturesSlider
var FeaturesSlides = document.querySelectorAll('.slider-item');
var SlideButtonBwd = document.querySelector('.slider-btn-bwd');
var SlideButtonFwd = document.querySelector('.slider-btn-fwd');
var SlideTabs = document.querySelectorAll('.slider-tab');

if (FeaturesSlides.length) {
  var CurrentFeaturesSlide = 0;

  var switchToNextSlide = function (id) {
    document.querySelector('.slider-item-active').classList.remove('slider-item-active');
    document.querySelector('.slider-tab-active').classList.remove('slider-tab-active');

    CurrentFeaturesSlide = id >= 0 ? id % FeaturesSlides.length : FeaturesSlides.length - 1;

    FeaturesSlides[CurrentFeaturesSlide].classList.add('slider-item-active');
    SlideTabs[CurrentFeaturesSlide].classList.add('slider-tab-active');
  }

  for (var i = 0; i < SlideTabs.length; i++) {
    SlideTabs[i].addEventListener('click', function (e) {
      switchToNextSlide(e.target.dataset.slide);
    })
  }
  SlideButtonFwd.addEventListener('click', function () {
    switchToNextSlide(CurrentFeaturesSlide + 1);
  });
  SlideButtonBwd.addEventListener('click', function () {
    switchToNextSlide(CurrentFeaturesSlide - 1)
  });
}

// Product modal
var BuyButton = document.querySelectorAll('.products-buy');
var ShowModal = document.getElementById('modal-order');
var CloseModal = document.querySelectorAll('.modal-close');

for (var i = 0; i < BuyButton.length; i++) {
  BuyButton[i].addEventListener('click', function (e) {
    e.preventDefault();
    ShowModal.classList.add('modal-visible');
  });
}
for (var i = 0; i < CloseModal.length; i++) {
  CloseModal[i].addEventListener('click', function () {
    document.querySelector('.modal-visible').classList.remove('modal-visible');
  });
}

window.addEventListener("keydown", function (evt) {
  if (evt.keyCode === 27) {
    if (ShowModal.classList.contains("modal-visible")) {
      evt.preventDefault();
      ShowModal.classList.remove("modal-visible");
    }
  }
});

//Map
const mapLink = document.querySelector(".contacts-map-link");
const mapPopup = document.querySelector(".modal-map");
const mapClose = mapPopup.querySelector(".modal-close");

mapLink.addEventListener("click", function (evt) {
  evt.preventDefault();
  mapPopup.classList.add("modal-visible");
});

mapClose.addEventListener("click", function (evt) {
  evt.preventDefault();
  mapPopup.classList.remove("modal-visible");
});

window.addEventListener("keydown", function (evt) {
  if (evt.keyCode === 27) {
    if (mapPopup.classList.contains("modal-visible")) {
      evt.preventDefault();
      mapPopup.classList.remove("modal-visible");
    }
  }
});

//Feedback
const feedbackLink = document.querySelector(".contacts-feedback-link");
const feedbackPopup = document.querySelector(".modal-feedback");
const feedbackClose = mapPopup.querySelector(".modal-close");

feedbackLink.addEventListener("click", function (evt) {
  evt.preventDefault();
  feedbackPopup.classList.add("modal-visible");
});

feedbackClose.addEventListener("click", function (evt) {
  evt.preventDefault();
  feedbackPopup.classList.remove("modal-visible");
});
window.addEventListener("keydown", function (evt) {
  if (evt.keyCode === 27) {
    if (feedbackPopup.classList.contains("modal-visible")) {
      evt.preventDefault();
      feedbackPopup.classList.remove("modal-visible");
    }
  }
});

//Auth form
const loginLink = document.querySelector(".login-link");
const loginPopup = document.querySelector(".modal-login");
const loginClose = loginPopup.querySelector(".modal-close");
const loginForm = loginPopup.querySelector(".login-form");
const loginLogin = loginPopup.querySelector(".login-icon-user");
const loginPassword = loginPopup.querySelector(".login-icon-password");

let isStorageSupport = true;
let storage = "";

try {
  storage = localStorage.getItem("login");
} catch (err) {
  isStorageSupport = false;
}

loginLink.addEventListener("click", function (evt) {
  evt.preventDefault();
  loginPopup.classList.add("modal-show");
  
  if (storage) {
    loginLogin.value = storage;
    loginPassword.focus();
  } else {
    loginLogin.focus();
  }
});

loginClose.addEventListener("click", function (evt) {
  evt.preventDefault();
  loginPopup.classList.remove("modal-show");
  loginPopup.classList.remove("modal-error");
});

loginForm.addEventListener("submit", function (evt) {
  if (!loginLogin.value || !loginPassword.value) {
    evt.preventDefault();
    loginPopup.classList.remove("modal-error");
    loginPopup.offsetWidth = loginPopup.offsetWidth;
    loginPopup.classList.add("modal-error");
  } else {
    if (isStorageSupport) {
      localStorage.setItem("login", loginLogin.value);
    }
  }
});

window.addEventListener("keydown", function (evt) {
  if (evt.keyCode === 27) {
    if (loginPopup.classList.contains("modal-show")) {
      evt.preventDefault();
      loginPopup.classList.remove("modal-show");
      loginPopup.classList.remove("modal-error");
    }
  }
});