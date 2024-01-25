// Responsive Navigation
const body = document.querySelector("body"),
	nav = document.querySelector("nav"),
	sidebarOpen = document.querySelector(".sidebarOpen"),
	siderbarClose = document.querySelector(".siderbarClose");

	//   js code to toggle sidebar
	sidebarOpen.addEventListener("click" , () =>{
		nav.classList.add("active");
	});

	body.addEventListener("click" , e =>{
		let clickedElm = e.target;

		if(!clickedElm.classList.contains("sidebarOpen") && !clickedElm.classList.contains("menu")){
		    nav.classList.remove("active");
		}
});

// Department Course Slider
$('.courses-department').owlCarousel({
    loop:true,
    margin:12,
    nav: false,
    dots: false,
    autoplay:true,
    lazyLoad: true,
    navText: ['<i class="fa-solid fa-arrow-left"></i>','<i class="fa-solid fa-arrow-right"></i>'],
    autoplayTimeout: 2000,
    autoplayHoverPause: true,
    responsive:{
        0:{
            items:2,
            dots: true,
            margin:12,
            autoplay:true,
            center: true,
        },
        575:{
            items: 3
        },
        768:{
            items:4,
            nav:false
        },
        992:{
            items:6,
            nav:true
        }
    }
});

// Course Slider
$('.course-carosel').owlCarousel({
    margin:2,
    dots: false,
    nav: true,
    loop: true,
    navText: ['<i class="fa-solid fa-arrow-left"></i>','<i class="fa-solid fa-arrow-right"></i>'],
    responsive:{
        0:{
            items:1,
            center: true,
    		nav: true,
        },
        575:{
            items: 3
        },
        768:{
            items:4,
        },
        992:{
            items:4,
        }
    }
});

// Mentor Slider
$('.mentor-carosel').owlCarousel({
    loop:true,
    margin:12,
    nav: false,
    dots: false,
    autoplay:true,
    lazyLoad: true,
    navText: ['<i class="fa-solid fa-arrow-left"></i>','<i class="fa-solid fa-arrow-right"></i>'],
    autoplayTimeout: 2000,
    autoplayHoverPause: true,
    responsive:{
        0:{
            items:1,
            dots: true,
            margin:12,
            autoplay:true,
            center: true,
        },
        575:{
            items: 2,
        },
        768:{
            items:2
        },
        992:{
            items:3,
            nav: true
        }
    }
});

// review Slider
$('.review-carosel').owlCarousel({
    loop:true,
    margin:12,
    nav: true,
    dots: false,
    autoplay:true,
    lazyLoad: true,
    center: true,
    navText: ['<i class="fa-solid fa-arrow-left"></i>','<i class="fa-solid fa-arrow-right"></i>'],
    autoplayTimeout: 2000,
    autoplayHoverPause: true,
    responsive:{
        0:{
            items:1,
            dots: true,
            margin: 12,
            nav:false,
            center: true,
        },
        575:{
            items: 1,
        },
        768:{
            items:2,
            nav: true
        },
        992:{
            items:3
        }
    }
});

// Slick Slider Workshop image section
$(".wokspece_img").slick({
  autoplay:false,
  slidesToShow:1,
  slidesToScroll:1,
  // fade:true,
  arrows:false,
  dots:false,
  asNavFor:".wokspece_navs"
})
$(".wokspece_navs").slick({
  autoplay:false,
  slidesToShow:9,
  slidesToScroll:1,
  // fade:true,
  focusOnSelect:true,
  arrows:true,
  dots:false,
  asNavFor:".wokspece_img",
  prevArrow:'<i class="fa fa-angle-left workspecePrevArrow"></i>',
  nextArrow:'<i class="fa fa-angle-right workspeceNextArrow"></i>',
  responsive: [
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 5
      }
    },
    {
      breakpoint: 576,
      settings: {
        slidesToShow: 3
      }
    }
  ]
})

//video-popup
new VenoBox({
    selector: '.RICT_Videos',
});

// AutoColored Section
let sections = document.querySelectorAll('.sec');
let navLinks = document.querySelectorAll('.course_detailes .navtabs a');
window.onscroll = () => {
    sections.forEach(sec => {
        let top = window.scrollY;
        let offset = sec.offsetTop - 15;
        let height = sec.offsetHeight;
        let id = sec.getAttribute('id');
        if(top >= offset && top < offset + height) {
            navLinks.forEach(links => {
                links.classList.remove('active');
                document.querySelector('.course_detailes .navtabs a[href*=' + id + ']').classList.add('active');
            });
        };
    });
}

// demo-carosel
$('.demo-carosel').owlCarousel({
    loop:true,
    items: 1,
    margin:12,
    nav: true,
    dots: false,
    autoplay:true,
    lazyLoad: true,
    center: true,
    navText: ['<i class="fa-solid fa-arrow-left"></i>','<i class="fa-solid fa-arrow-right"></i>'],
    autoplayTimeout: 2000,
    autoplayHoverPause: true,
});

