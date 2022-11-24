

// Desktop Navigation - Expand on hover:


(function ($) {
  $('#desktop_nav').hover(function () {
    // hover IN
    $('#desktop_nav').addClass('open');
  }, function () {
    // hover OUT
    $('#desktop_nav').removeClass('open');
  });
})(jQuery);



// Initialize / Mount Preview Card Sliders

var sliders = document.getElementsByClassName('preview-slider');

for (var i = 0; i < sliders.length; i++) {
  new Splide(sliders[i], {
    type: 'slide',
    perPage: 1,
    speed: 1000,
    video: {
      loop: true,
      mute: true,
      autoplay: true,
      disableOverlayUI: true,
      hideControls: true,
      playerOptions: {
        htmlVideo: {
          playsInline: true,
          autoplay: true
        }
      }
    },
  }).mount(window.splide.Extensions);
}

// Initialize AOS Animations

AOS.init();


// Initialize Masonry JS

var masonryGrid = document.querySelector('.grid');
var msnry = new Masonry(masonryGrid, {
  // options
  itemSelector: '.grid-item',
  percentPosition: true,
  gutter: 20
});

imagesLoaded(masonryGrid).on('progress', function () {
  // layout Masonry after each image loads
  msnry.layout();
});




// jQuery Modal Customizations: 

(function ($) {
  $('a[rel="modal:open"]').click(function (event) {
    $(this).modal({
      closeClass: 'isax isax-add',
      closeText: '',
      fadeDuration: 250
    });
    return false;
  });
})(jQuery);


// Ajax - Only start seaching after minimum 1 character entered: 

(function ($) {
  $("input#keyword").keyup(function () {
    if ($(this).val().length > 2) {
      $("#datafetch").show();
    } else {
      $("#datafetch").hide();
    }
  });
})(jQuery);


//Dark Mode Switch:

//identify the toggle switch HTML element
const toggleSwitch = document.querySelector('#theme-switch input[type="checkbox"]');

//function that changes the theme, and sets a localStorage variable to track the theme between page loads
function switchTheme(e) {
  if (e.target.checked) {
    localStorage.setItem('theme', 'dark');
    document.documentElement.setAttribute('data-theme', 'dark');
    toggleSwitch.checked = true;
  } else {
    localStorage.setItem('theme', 'light');
    document.documentElement.setAttribute('data-theme', 'light');
    toggleSwitch.checked = false;
  }
}

//listener for changing themes
toggleSwitch.addEventListener('change', switchTheme, false);

//pre-check the dark-theme checkbox if dark-theme is set
if (document.documentElement.getAttribute("data-theme") == "dark") {
  toggleSwitch.checked = true;
}


//If browser supports WebShare API, launch share sheet - if not, launch modal fallback:
const shareButtons = document.querySelectorAll('.sharePage');

shareButtons.forEach(shareButton => {

  shareButton.addEventListener('click', event => {
    if (navigator.share) {
      // Launch Sharesheet
      navigator.share({
        title: document.title,
        url: window.location
      }).then(() => {
        console.log('Thanks for sharing!');
      })
        .catch(console.error);
    } else {
      // Launch Modal
      (function ($) {
        $('#share-fallback').modal({
          closeClass: 'isax isax-add',
          closeText: '',
          fadeDuration: 250
        });
      })(jQuery);
    }
  });

});