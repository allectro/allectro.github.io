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

// Product buy modal
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

//ShowModal
document.getElementById('button-feedback').addEventListener('click', function() {
  document.getElementById('modal').classList.add("modal-visible");
})

document.getElementById('modal-close').addEventListener('click', function() {
  document.getElementById('modal').classList.remove("modal-visible");
})

document.getElementById('button-map').addEventListener('click', function() {
  document.getElementById('modal-map').classList.add("modal-visible");
})

document.getElementById('modal-close-map').addEventListener('click', function() {
  document.getElementById('modal-map').classList.remove("modal-visible");
})

//сделать счетчик для корзины и закладок