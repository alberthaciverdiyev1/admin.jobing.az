// aos
AOS.init();

// window width
let resizeWindowWidth;
const windWidth = $(window).width();
const windHeight = $(window).height();

// избегание дергания при открытии окна
function calcScroll() {
  let div = document.createElement('div');

  div.style.width = '50px';
  div.style.height = '50px';
  div.style.overflowY = 'scroll';
  div.style.visibility = 'hidden';

  document.body.appendChild(div);
  let scrollWidth = div.offsetWidth - div.clientWidth;
  div.remove();

  return scrollWidth;
}

// custom scroll
// gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);
// setTimeout(() => {
// 	ScrollTrigger.refresh()
// }, 1000)

// let scroller;
// let bodyScrollBar;

// if(windWidth > 1200) {
// 	scroller = document.querySelector('.scroller');
// 	bodyScrollBar = Scrollbar.init(scroller, { damping: 0.05, delegateTo: document, alwaysShowTracks: true });

// 	ScrollTrigger.scrollerProxy('.scroller', {
// 	  scrollTop(value) {
// 	    if (arguments.length) {
// 	      bodyScrollBar.scrollTop = value;
// 	    }
// 	    return bodyScrollBar.scrollTop;
// 	  }
// 	});

// 	bodyScrollBar.addListener(ScrollTrigger.update);
// 	ScrollTrigger.defaults({ scroller: scroller });
// }

// update page on resize
$(window).on('resize', function() {
	resizeWindowWidth = $(window).width();

	if(windWidth >= 1200 || resizeWindowWidth >= 1200) {
		location.reload();
		setTimeout(() => {
			ScrollTrigger.refresh()
		}, 500)
	} else {
		if(Math.abs(windWidth - resizeWindowWidth) >= 200) {
			location.reload();
		}
	}
});



// main page first screen animation
if($('.s-top-banner').length) {
	setTimeout(() => {
		$('header.animation').addClass('active');
		$('.s-top-banner.animation').addClass('active');
	}, 200)
}

// animated class
$('.toggleClass').length&&gsap.utils.toArray('.toggleClass').forEach(function(e) {
  gsap.timeline({
    scrollTrigger: {
      trigger: e,
      start: 'top center',
      onEnter: () => { e.classList.add('active') }
    }
  })
});

setTimeout(() => {
	$('.aos-init').length&&gsap.utils.toArray('.aos-init').forEach(function(e) {
	  gsap.timeline({
	    scrollTrigger: {
	      trigger: e,
	      start: 'top 75%',
	      onEnter: () => { e.classList.add('aos-animate') }
	    }
	  })
	});
}, 500)


if($('.s-top-banner').length) {
	const swiperGallery = new Swiper('.s-top-banner .stb-slider .swiper', {
		slidesPerView: 1,
		spaceBetween: 10,
		speed: 800,
		autoHeight: true,
		direction: 'horizontal',
		// autoplay: {
		// 	delay: 5000,
		// },
		// pagination: {
		// 	el: '.s-big-wrap .sbw-block .sb-gallery .swiper-pagination',
		// 	clickable: true,
		// },
		// navigation: {
		// 	nextEl: '.s-big-wrap .sbw-block .sb-gallery .swiper-button-next',
		// 	prevEl: '.s-big-wrap .sbw-block .sb-gallery .swiper-button-prev',
		// },
		breakpoints: {
			768: {
					spaceBetween: 19,
					autoplay: false,
					autoHeight: false,
					direction: 'vertical',
			}
		}
	});

	swiperGallery.on('slideChange', () => {
		const activeIndex = swiperGallery.activeIndex;

		$('.s-top-banner .stb-text-wrap .stb-tw-itm').removeClass('active');
		for(let i = 0; i <= activeIndex; i++) {
			$('.s-top-banner .stb-text-wrap .stb-tw-itm').eq(i).addClass('active');
		}


		$('.s-top-banner .stb-nav').removeClass('active-one active-two active-three');
		if(activeIndex === 0) {
			$('.s-top-banner .stb-nav').addClass('active-one');
		} else if(activeIndex === 1) {
			$('.s-top-banner .stb-nav').addClass('active-two');
		} else {
			$('.s-top-banner .stb-nav').addClass('active-three');
		}
		$('.s-top-banner .stb-nav .stb-nv-btn').removeClass('active').eq(activeIndex).addClass('active');
		if(windWidth > 768) {
			$('.s-top-banner .stb-btn-wrap .btn.green').removeClass('active').eq(activeIndex).addClass('active');
		}
	});

	$('.s-top-banner .stb-nav .stb-nv-btn').click(function() {
		swiperGallery.slideTo($(this).index());
	});
}

if($('.s-chars .sc-slider .swiper').length) {
	const slidesLength = $('.s-chars .sc-nav .swiper-slide').length;
	$('.s-chars .sc-numbers .scn-all').text(slidesLength);

	const swiperGallery = new Swiper('.s-chars .sc-slider .swiper', {
		slidesPerView: 1,
		spaceBetween: 10,
		speed: 700,
		effect: 'fade',
		// navigation: {
		// 	nextEl: '.s-chars .sc-slider .swiper-button-next',
		// 	prevEl: '.s-chars .sc-slider .swiper-button-prev',
		// },
	});

	const swiperGalleryNav = new Swiper('.s-chars .sc-nav .swiper', {
		slidesPerView: 'auto',
		spaceBetween: 8,
		speed: 800,
		breakpoints: {
			spaceBetween: 11,
		}
	});

	swiperGallery.on('slideChange', () => {
		const index = swiperGallery.activeIndex;
		$('.s-chars .sc-nav .swiper .swiper-slide').removeClass('active').eq(index).addClass('active');
		swiperGalleryNav.slideTo(index);

		if(windWidth > 768) {
			$('.s-chars .sc-numbers .scn-num').text(index + 1);
		}
	})

	$('.s-chars .sc-nav .swiper .swiper-slide').click(function() {
		swiperGallery.slideTo($(this).index());
	});
}

if($('.s-photo .swiper').length) {
	const swiperPhoto = new Swiper('.s-photo .swiper', {
		slidesPerView: 'auto',
		spaceBetween: 16,
		loop: true,
		centeredSlides: true,
		centeredSlidesBounds: true,
		speed: 1000,
		keyboard: {
      enabled: true,
    },
		navigation: {
			nextEl: '.s-photo .sp-slider .swiper-button-next',
			prevEl: '.s-photo .sp-slider .swiper-button-prev',
		},
		pagination: {
			el: '.s-photo .swiper-pagination',
			clickable: true,
		},
		// autoplay: {
		// 	delay: 5000,
		// },
		breakpoints: {
			1440: {
				spaceBetween: 59,
				navigation: {
					nextEl: '.s-photo .sp-top .swiper-button-next',
					prevEl: '.s-photo .sp-top .swiper-button-prev',
				},
			},
			768: {
				spaceBetween: 30,
				navigation: {
					nextEl: '.s-photo .sp-top .swiper-button-next',
					prevEl: '.s-photo .sp-top .swiper-button-prev',
				},
			}
		}
	});
}

if($('.s-adv .swiper').length) {
	const swiperAdv = new Swiper('.s-adv .swiper', {
		slidesPerView: 'auto',
		spaceBetween: 16,
		speed: 1000,
		navigation: {
			nextEl: '.s-adv .swiper-button-next',
			prevEl: '.s-adv .swiper-button-prev',
		}
	});
}

if($('.s-four .swiper').length) {
	const swiperBunkers = new Swiper('.s-four .swiper', {
		slidesPerView: 'auto',
		spaceBetween: 0,
		speed: 1000,
		// navigation: {
		// 	nextEl: '.s-chars .sc-slider .swiper-button-next',
		// 	prevEl: '.s-chars .sc-slider .swiper-button-prev',
		// },
	});
}

if($('.s-bunkers .sb-btm .swiper').length) {
	const swiperBunkers = new Swiper('.s-bunkers .sb-btm .swiper', {
		slidesPerView: 'auto',
		spaceBetween: 0,
		speed: 1000,
		// navigation: {
		// 	nextEl: '.s-chars .sc-slider .swiper-button-next',
		// 	prevEl: '.s-chars .sc-slider .swiper-button-prev',
		// },
	});

	$('.s-bunkers .sb-btm .swiper .sbb-btn').click(function() {
		setTimeout(() => {
			swiperBunkers.update()
		}, 600)
	});
}

let swiperPricesTable;
if($('.s-prices').length && windWidth <= 768) {
	swiperPricesTable = new Swiper('.s-prices .sp-block .spb-mobile-table .swiper', {
		slidesPerView: 'auto',
		spaceBetween: 0,
		speed: 1000,
		pagination: {
			el: '.s-prices .sp-block .spb-mobile-table .swiper-pagination',
			clickable: true,
		},
	});
}

// $('.s-bunkers .sb-right .sbr-nav-items .sbr-nv').click(function() {
// 	$('.s-bunkers .sb-right .sbr-nav-items .sbr-nv').removeClass('active').eq($(this).index()).addClass('active');
// 	$('.s-bunkers .sb-right .sbr-items .sbr-itm').removeClass('active').eq($(this).index()).addClass('active');
// });

if(windWidth < 768 && $('.s-bunkers').length > 0) {
	$('.s-bunkers .sb-right .sbr-items .sbr-itm:nth-child(1)').addClass('active');
}

// Click open Answer&Questions FAQ
$('.s-faq .sf-block .sf-items .sf-itm .sfi-top').click(function() {
  $('.s-faq .sf-block .sf-items .sf-itm .sfi-top.active ~ .sfi-content').slideUp();
  $('.s-faq .sf-block .sf-items .sf-itm.active').removeClass('active');
  if (!$(this).hasClass('active')) {
    $('.s-faq .sf-block .sf-items .sf-itm .active').removeClass('active');
    $(this).addClass('active');
    $(this).closest('.s-faq .sf-block .sf-items .sf-itm').addClass('active');
    $('~ .sfi-content', this).slideDown();
  } else {
    $('.s-faq .sf-block .sf-items .sf-itm .active').removeClass('active');
  }
});

$('.s-faq .sf-block .sf-items .sf-btn-wrap .btn').click(function(e) {
	e.preventDefault();
	$(this).parent().addClass('disabled');
	$('.s-faq .sf-block .sf-items .sf-itm.hidden').removeClass('hidden');

	ScrollTrigger.refresh()
});

// custom cursor
// if($('.custom-cursor').length && windWidth > 992) {
//   $('body').on('mousemove', function(event) {
//     let cX = event.pageX;
//     let cY = event.pageY;

//     let icn = $('.arrow-btn');

//     icn.css('left', `${cX - 50}px`)
//     icn.css('top', `${cY - 50}px`)
//   });

//   $('.custom-cursor').on('mousemove', function(event) {
//     $('.arrow-btn').removeClass('disable');
//   });
//   $('.custom-cursor').on('mouseleave', function(event) {
//     $('.arrow-btn').addClass('disable');
//   });
//   $(window).on('scroll', () => {
//   	$('.arrow-btn').addClass('disable');
//   });

  // $('.s-video .sv-video.custom-cursor').on('mouseover', function() {
  // 	$('.arrow-btn').addClass('video-cursor');
  // });
  // $('.s-video .sv-video.custom-cursor').on('mouseleave', function() {
  // 	$('.arrow-btn').removeClass('video-cursor');
  // });
// }

// GSAP
// s-use animation
if($('.s-use').length > 0 && windWidth >= 768) {
	const animation = gsap.timeline({
		scrollTrigger: {
			trigger: $('.s-use'),
			pinSpacing: false,
			pin: false,
			scrub: true,
			markers: false,
			start: 'center center',
			end: '+=100%',
			toggleClass: 'active'
		}
	})
}

// banners animation
// $(document).ready(function() {
//     if ($('.s-config .sc-banner-wrap').length && windWidth >= 768) {
//         const services = $('.s-config .sc-banner-wrap .sc-banner');
//         const endWay = windWidth >= 768 ? '+=100%' : '+=200%';

//         const animation = gsap.timeline({
//             scrollTrigger: {
//                 trigger: '.s-config .sc-banner-wrap',
//                 pinSpacing: true,
//                 pin: true,
//                 scrub: true,
//                 markers: false,
//                 start: 'top top',
//                 end: endWay,
//             }
//         });

//         services.each((i, service) => {
//             animation.to(service, {
//                 y: '-100%', // Banner'ın yüksekliğini yüzde olarak ayarla
//                 duration: 0.5
//             });
//         });
//     }
// });




if($('.s-adv').length > 0 && windWidth >= 768) {
	const imgHeight = document.querySelector('.s-adv .sa-block .sab-img').offsetHeight;

	const animation = gsap.timeline({
		scrollTrigger: {
			trigger: $('.s-adv .sa-block .sab-img'),
			pinSpacing: true,
			pin: true,
			scrub: 1,
			markers: false,
			start: `top top`,
			end: '+=50%',
		}
	})
	animation.fromTo('.s-adv .sa-items', {
		y: '10%'
	}, {
		y: '-10%'
	})
}



$(document).ready(function() {
    if ($('.s-photo-gallery').length > 0) {
        const photoRows = document.querySelectorAll('.s-photo-gallery .spg-gallery .spg-row .spg-items');

        const animation = gsap.timeline({
            scrollTrigger: {
                trigger: '.s-photo-gallery .spg-top',
                pinSpacing: false,
                pin: false,
                scrub: 0.5, // Scroll hızına daha yakın bir tepki
                markers: false,
                start: 'top+=30% center',
                end: '+=50%',
            }
        });
        animation.addLabel('lb');

        photoRows.forEach((row, i) => {
            const rowWidth = row.offsetWidth;

            if (i === 0) {
                animation.to(row, {
                    x: `-${rowWidth - windWidth}px`
                }, 'lb+=0');
            } else {
                animation.to(row, {
                    x: `${rowWidth - windWidth}px`
                }, 'lb+=0');
            }
        });
    } else {
        const swiperPhotos = new Swiper('.s-photo-gallery .spg-gallery .spg-mobile-slider .swiper', {
            slidesPerView: 'auto',
            spaceBetween: 20,
            loop: true,
            speed: 1000,
            navigation: {
                nextEl: '.s-photo-gallery .spg-gallery .spg-mobile-slider .swiper-button-next',
                prevEl: '.s-photo-gallery .spg-gallery .spg-mobile-slider .swiper-button-prev',
            }
        });
    }
});


if($('.s-video .sv-video').length > 0) {
	const animation = gsap.timeline({
		scrollTrigger: {
			trigger: $('.s-video .sv-video'),
			pinSpacing: false,
			pin: false,
			scrub: 1,
			markers: false,
			start: 'top bottom',
			end: '+=100%',
		}
	})

	animation.addLabel('lb')
	.to('.s-video .sv-video .sv-borders .sb-bd:nth-child(1)', {
		width: '0%'
	}, 'lb+=0')
	.to('.s-video .sv-video .sv-borders .sb-bd:nth-child(2)', {
		width: '0%'
	}, 'lb+=0')
	.to('.s-video .sv-video .sv-borders .sb-bd:nth-child(3)', {
		height: '0%'
	}, 'lb+=0')
}

// s-prod animation
if($('.s-prod .sp-items-wrap').length > 0 && windWidth > 900) {
	const itemsHeight = document.querySelector('.s-prod .sp-items-wrap .sp-items').offsetHeight;
	const windHeight = $(window).height();

	const animationProd = gsap.timeline({
		scrollTrigger: {
			trigger: $('.s-prod .sp-items-wrap'),
			pinSpacing: false,
			pin: true,
			scrub: 1,
			markers: false,
			start: 'top top',
			end: '+=100%',
			onUpdate: (self) => {
				$('.s-prod .sp-items-wrap .sp-nav .spn-line span').css('height', `${self.progress * 100}%`)

				if(self.progress > 0.33) {
					$('.s-prod .sp-items-wrap .sp-nav .spn-itm:nth-child(2)').addClass('active');
				} else {
					$('.s-prod .sp-items-wrap .sp-nav .spn-itm:nth-child(2)').removeClass('active');
				}

				if(self.progress > 0.66) {
					$('.s-prod .sp-items-wrap .sp-nav .spn-itm:nth-child(3)').addClass('active');
				} else {
					$('.s-prod .sp-items-wrap .sp-nav .spn-itm:nth-child(3)').removeClass('active');
				}

				if(self.progress >= 0.98) {
					$('.s-prod .sp-items-wrap .sp-nav .spn-itm:nth-child(4)').addClass('active');
				} else {
					$('.s-prod .sp-items-wrap .sp-nav .spn-itm:nth-child(4)').removeClass('active');
				}

			}
		}
	})

	animationProd.to('.s-prod .sp-items-wrap .sp-items', {
		y: `-${itemsHeight - windHeight}px`
	})
}

// s-servicesanimation
if($('.s-services').length > 0) {
	if(windWidth > 768) {
		const animationServices = gsap.timeline({
			scrollTrigger: {
				trigger: $('.s-services .ss-top'),
				pin: true,
				pinSpacing: false,
				scrub: true,
				markers: false,
				start: 'top top',
				end: '+=50%',
			}
		})

		animationServices.addLabel('labelServ')

		.to('.s-services .ss-top .sst-left .sst-theme-wrap .sst-theme:nth-child(1)', {
			y: '-100%'
		}, 'labelServ+=0')
		.to('.s-services .ss-top .sst-left .sst-theme-wrap .sst-theme:nth-child(2)', {
			y: '0%'
		}, 'labelServ+=0')

		.to('.s-services .ss-top .sst-left .sst-hdr .sst-hdr-line .sst-hdr-words:nth-child(1)', {
			y: '-100%'
		}, 'labelServ+=0')
		.to('.s-services .ss-top .sst-left .sst-hdr .sst-hdr-line .sst-hdr-words:nth-child(2)', {
			y: '0%'
		}, 'labelServ+=0')

		.to('.s-services .ss-top .sst-left .sst-btn-wrap .btn.green:nth-child(1)', {
			y: '-100%'
		}, 'labelServ+=0')
		.to('.s-services .ss-top .sst-left .sst-btn-wrap .btn.green:nth-child(2)', {
			y: '0%'
		}, 'labelServ+=0')

		.to('.s-services .ss-top .sst-right .sst-r-nums .sst-rn-left .sst-rn-descr:nth-child(1)', {
			y: '-100%'
		}, 'labelServ+=0')
		.to('.s-services .ss-top .sst-right .sst-r-nums .sst-rn-left .sst-rn-descr:nth-child(2)', {
			y: '0%'
		}, 'labelServ+=0')

		.to('.s-services .ss-top .sst-right .sst-r-items .sst-r-itm:nth-child(1) .sst-r-descr .over-hid span', {
			y: '-100%'
		}, 'labelServ+=0')
		.to('.s-services .ss-top .sst-right .sst-r-items .sst-r-itm:nth-child(2) .sst-r-descr .over-hid span', {
			y: '0%'
		}, 'labelServ+=0')
	} else {
		$('.s-services .ss-top .sst-left .sst-theme-wrap .sst-theme').click(function() {
			$('.s-services .ss-top .sst-left .sst-theme-wrap .sst-theme').removeClass('active');
			$(this).addClass('active');
			$('.s-services .ss-top .sst-left .sst-content-wrap .sst-content').slideUp().eq($(this).index()).slideDown();

			setTimeout(function() {
				ScrollTrigger.refresh()
			}, 500)
		});
	}
}

// OTHER scripts
// select options in detail bunker
$('.s-bunkers .sb-right .sbr-items .sbr-itm .sbr-options-items .sbr-opt-itm').click(function() {
	$(this).toggleClass('active');
});

// config chars tab
if($('.s-config-chars').length > 0) {
	if(windWidth > 768) {
		$('.s-config-chars .scc-top .scc-t-nav .scc-tn-itm').click(function() {
			const tabId = $(this).attr('data-tab');

			$('.s-config-chars .scc-top .scc-t-nav .scc-tn-itm').removeClass('active');
			$(this).addClass('active');

			setTimeout(function() {
				ScrollTrigger.refresh()
			}, 300)

			$('.s-config-chars .sc-content-wrap .sc-content').removeClass('active');
			$(`#${tabId}`).addClass('active');
		});
	} else {
		$('.s-config-chars .sc-content-wrap .sc-content .scc-btn-wrap .btn.green').click(function(e) {
			e.preventDefault();
			$(this).toggleClass('active');

			$(this).closest('.sc-content').find('.mobile-hidden').slideToggle();

			setTimeout(function() {
				ScrollTrigger.refresh()
			}, 300)
		});
	}
}

// click scroll
$('[data-scroll]').click(function(e) {
	e.preventDefault();
	const section = $(this).attr('data-scroll');

	if(windWidth <= 768) {
		gsap.to(window, {
	    duration: 1,
	    scrollTo: {
	      y: document.querySelector(`.${section}`),
	      offsetY: 0
	    }
	  });
	} else {
		bodyScrollBar.scrollIntoView(document.querySelector(`.${section}`));
	}
});

// plus info in banners
$('.si-points .si-pnt').click(function(e) {
	e.stopPropagation();

	if($(this).hasClass('active')) {
		$('.si-points .si-pnt').removeClass('active');
		$(this).find('.sip-content').slideUp();
	} else {
		$('.si-points .si-pnt.active .sip-content').slideUp();
		$('.si-points .si-pnt').removeClass('active');

		$(this).addClass('active');
		setTimeout(() => {
			$(this).find('.sip-content').slideDown();
		}, 200)
	}
});

$('body').on('click', function() {
	$('.si-points .si-pnt.active .sip-content').slideUp();
	$('.si-points .si-pnt').removeClass('active');
});


// fly button in mobile on project detail
if($('.s-bunkers').length && windWidth < 768) {
	const btn = $('.s-bunkers .sb-right .sbr-price-wrap .btn.green')[0]
	const btnOffsetTop = btn.offsetTop
	const btnHeight = btn.offsetHeight

	$('.s-bunkers .sb-right .sbr-price-wrap .btn.green').addClass('fixed');
	$(window).scroll(function() {
		const st = $(this).scrollTop();

		if(st >= btnOffsetTop - windHeight + btnHeight + 8) {
			$('.s-bunkers .sb-right .sbr-price-wrap .btn.green').removeClass('fixed');
		} else {
			$('.s-bunkers .sb-right .sbr-price-wrap .btn.green').addClass('fixed');
		}

	});
}

$('.open-catalog-menu, header .hd-right .burger-icn').click(function(e) {
	e.preventDefault();

	$('.catalog-menu').addClass('active');
});
$('.catalog-menu .cm-top .cm-close, .catalog-menu .cm-shadow').click(function() {
	$('.catalog-menu').removeClass('active');
});
$('.open-mobile-menu, header .hd-right .burger-icn-mobile').click(function(e) {
	e.preventDefault();

	$('.mobile-menu').addClass('active');
});
$('.mobile-menu .cm-top .cm-close, .mobile-menu .cm-shadow').click(function() {
	$('.mobile-menu').removeClass('active');
});
$('.open-media-menu, header .hd-right .burger-icn').click(function(e) {
	e.preventDefault();

	$('.media-menu').addClass('active');
});
$('.media-menu .cm-top .cm-close, .media-menu .cm-shadow').click(function() {
	$('.media-menu').removeClass('active');
});
// обработка файлов input file

if($('.def-file').length) {
	const inputs = document.querySelectorAll('.def-file');

	inputs.forEach((inpWrap) => {
		inpWrap.querySelector('input').addEventListener('change', function() {
			const files = this.files;

			if(files.length) {
				const fileName = files[0].name;
				inpWrap.querySelector('.df-descr').innerText = fileName;
			} else {
				inpWrap.querySelector('.df-descr').innerText = 'Прикрепить файл';
			}
		});
	});
}


// default form
$('[data-form]').click(function(e) {
	e.preventDefault();
	const formId = $(this).attr('data-form');

	$('.default-popup').removeClass('active');
	$(`#${formId}`).addClass('active');

	if($(window).width() + calcScroll() <= 1200) {
		$('body').css('overflow-y', 'hidden');
	}
});

$('.default-popup .dp-shadow, .default-popup .dp-close, .default-popup .dpc-close').click(function() {
	$('.default-popup').removeClass('active');

	if($(window).width() + calcScroll() <= 1200) {
		$('body').css('overflow-y', 'scroll');
	}

	setTimeout(() => {
		$('#form').trigger("reset"); // очистка формы
		$('#econom_zapros').trigger("reset");
		document.getElementById('files').value='';
		document.getElementById('span').textContent="Close";
		}, 1000);

	//document.getElementById('files').value=''; //удаляем значение, но визуально остается все как и было.Но файла уже нет
	//document.getElementById('span').textContent="Прикрепить файл";

});

// tabs in econom page first screen
$('.s-bunkers .sb-right .sbr-items-choose .sbr-ic-itm').click(function() {
	$('.s-bunkers .sb-right .sbr-items-choose .sbr-ic-itm').removeClass('active');
	$(this).addClass('active');

	$('.s-bunkers .sb-right .sbr-items-wrap .sbr-items').removeClass('active').eq($(this).index()).addClass('active');


	//скидываем опции в неактивное(невыбранное) состояние
	$('.s-bunkers .sb-right .sbr-items .sbr-itm .sbr-options-items .sbr-opt-itm').removeClass('active');

	$('.sbr-opt-itm').removeClass('active');
	$('.sbr-opt-itm').removeClass('active').all;
	$('#stelagi_1').removeClass('active');
	$('#stelagi_2').removeClass('active');
});

// see more in s-prices
$('.s-prices .sp-block .spb-btn-wrap .btn.green').click(function(e) {
	e.preventDefault();
	$(this).parent().addClass('disabled');

	if($(window).width() > 768) {
		$(this).closest('.sp-block').find('.spb-row.hidden').removeClass('hidden');
		ScrollTrigger.refresh()
	} else {
		$('.s-prices .sp-block .spb-mobile-table .smt-col.hidden').removeClass('hidden');
		swiperPricesTable.update();
	}
});

// loop true in fancybox
$.fancybox.defaults.loop = true;


// будет перенос в отдельный файл
if($('.s-bunkers123').length) {
	function calculator() {
		// HTML для вывода цены
		const $price = document.querySelector('.s-bunkers .sb-right .sbr-price-wrap .spw-price');
		const $formPrice = document.querySelector('#dp_comfort .dp-content .dpc-row .dpc-total-price span');
		const $longValue = +document.querySelector('.sbr-items.active .select-selected[data-name="long"]').getAttribute('value') - 6;

		// Общая цена
		let totalPrice = 0;

		// Объект со всеми параметрами
		const acc = {
			basePrice: 0,
			long: 0,
			fatness: 0,
			warm: 0,
			deep: 0,
			options: 0,
		};

		// Берем базовую стоимость комплектации
		acc.basePrice = +document.querySelector('.sbr-items.active [data-base-price]')?.getAttribute('data-base-price') || 0;

		// вывод динамичных цен в опциях
		function showNumbersOptions(longValue = $longValue) {
			const optionsItems = document.querySelectorAll('.sbr-items.active .sbr-itm .sbr-options-items .sbr-opt-itm[data-multi]');

			Array.from(optionsItems).forEach((itm) => {
				const itmPrice = +itm.dataset.price;
				const itmMultiPrice = +itm.dataset.multi;
				const visiblePrice = itmPrice + (longValue * itmMultiPrice);

				itm.querySelector('.sbr-oi-descr:nth-child(2)').textContent = '+' + visiblePrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + '₽';
			});
		}

		showNumbersOptions();

		// Расчет выбранных элементов и запись в объект
		function calcPrice() {
			const multiNum = +document.querySelector('.sbr-items.active .select-selected[data-name="long"]').getAttribute('value') - 6 || 0;
			// доп опции
			const optionsItems = document.querySelectorAll('.sbr-items.active .sbr-itm .sbr-options-items .sbr-opt-itm.active');
			const optionsPrice = Array.from(optionsItems).reduce(function(sum, current) {
				if(current.hasAttribute('data-multi')) {
					const multiPrice = current.getAttribute('data-multi');
					return sum + +current.getAttribute('data-price') + (multiNum * multiPrice);
				} else {
					return sum + +current.getAttribute('data-price');
				}
			}, 0)
			acc.options = optionsPrice;
			showNumbersOptions(multiNum)

			// селекты
			const selectedItems = document.querySelectorAll('.sbr-items.active .select-selected[data-price]');
			selectedItems.forEach((itm) => {
				let price;

				// если есть мультипликатор, то цену меняем в зависимости от мультипликатора
				if(itm.hasAttribute('data-multi')) {
					const multiPrice = itm.getAttribute('data-multi') || 0;
					price = +itm.getAttribute('data-price') + (multiNum * multiPrice);
				} else {
					price = +itm.getAttribute('data-price');
				}

				const priceName = itm.getAttribute('data-name');
				acc[priceName] = price;
			})
		}
		calcPrice();

		function calcTotalPrice() {
			totalPrice = 0;

			for (key in acc) {
				totalPrice+= acc[key];
			}
		}
		calcTotalPrice();

		function showPrice() {
			$price.innerText = totalPrice.toLocaleString('ru') + '₽';
			$formPrice.innerText = totalPrice.toLocaleString('ru') + '₽';
		}
		showPrice();

		// Отслеживаем изменения в комплектации
		$('.sbr-items.active [data-price]:not(.select-selected)').click(function() {
			calcPrice();
			calcTotalPrice();
			showPrice();
		});
	}
	calculator();
}

