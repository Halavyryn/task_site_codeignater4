
$(function(){

 
    /*for responsive menu*/
    const hamburgerMenu = document.querySelector(".hamburger-menu");
    const nav = document.querySelector(".nav");

    hamburgerMenu.addEventListener("click", () => {
        nav.classList.toggle("active")
    });

    $('.slider1').owlCarousel({
        item:2,
        loop: true,
        nav: true,
        responsiveClass:true,
        responsiveBaseElement: 'body',
        margin: 30,
        navText: [$('.slider-next'),$('.slider-prev')],
        responsive:{
            0:{
                items:1,
                nav: false,
                dots: false,
                navText: false,
            },
            650:{
                items:2,
                center: true,

            },
            1000:{
                items:2,
            },
            1300:{
                items:2,
            }
        },
    })

    $('.slider2').owlCarousel({
        items: 4,
        loop: true,
        responsiveClass:true,
        responsiveBaseElement: 'body',
        margin: 30,
        navElement:'div.prev div.next',
        responsive:{
            0:{
                items:1,
                margin: 0,
                center: true,
                nav: false,
                dots: false,
                navText: false,
            },
            600:{
                items:2,
                center: true,
            },
            1000:{
                items:3,
            },
            1300:{
                items:4,
            }
        },
    })


    /*for menu categories*/
    const Dropdowns = document.querySelectorAll('.dropdown');
    Dropdowns.forEach(dropdown => dropdown.addEventListener("click", function() {
       const ContentDropdown = dropdown.querySelector('.dropdown-content');
       ContentDropdown.classList.toggle("dropdown-content-active");
    }));

});