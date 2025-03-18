<!DOCTYPE html>
<html lang="az">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="0zDRs4OvzL0egLiNMOEeNbUcEWu7YEcYDqorHLnK" />

    <title>{{ ceoTitle() ?: (companyName() ? companyName() . ' » Ana səhifə' : __(Route::currentRouteName())) }}</title>

    </title>
    <!-- Meta Keywords -->
    <meta name="keywords" content="{{ ceoKeywords() ?? '' }}">
    <!-- Meta Description -->
    <meta name="description" content="{{ ceoDescription() ?? '' }}">

    {!! ceoOtherCodes() ?? '' !!}

    <link rel="apple-touch-icon" sizes="180x180" href="{{siteFavicon() ?? asset('img/poh-logo-2.png')}}"/>
    <meta name="theme-color" content="#000"/>
    <link rel="icon" href="{{siteFavicon() ?? asset('img/poh-logo-2.png')}}"/>
    <link rel="stylesheet" href="{{asset('libs/swiper-master/swiper-bundle.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('libs/fancybox/jquery.fancybox.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('libs/aos/aos.css')}}"/>
    <link rel="stylesheet" href="{{asset('libs/customSelect/cs.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/style.min.css')}}"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <style>
        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>

<body>
<div class="main-wrapper">
    <div class="scroller">
        <header id="header" class="animation abs border-bottom">
            <div class="my-container flex" style="background-color: #202c7f; height: 30px"></div>
            <div class="my-container flex">
                <a href="{{route('home')}}" class="hd-logo">
                    <img src="{{siteLogo() ?? asset('img/poh-logo-1.png')}}" alt="logo"/>
                    <img src="{{siteLogo() ?? asset('img/poh-logo-1.png')}}" alt="logo"/>
                </a>
                <div class="hd-mnu">
                    <ul>
                        <li class="with-burger">
                            <a href="#" class="open-media-menu">
                                {{__('About Company')}}
                                <div class="burger-icn"></div>
                            </a>
                        </li>
                        <li style="position: relative">
                            <a href="{{ route('home') }}#services">{{__('Services')}}</a>
                            <div class="dropdown">
                                <ul class="dropdown-menu">
                                    @forelse(getServices() as $service)
                                        <li>
                                            <a href="{{route('service',['slug'=>$service["slug"]])}}">{{$service["name"]}}</a>
                                        </li>
                                    @empty
                                    @endforelse
                                </ul>
                            </div>
                        </li>
                        <li><a href="{{route('news')}}">{{__('News')}}</a></li>
                    </ul>
                </div>
                <div class="hd-right">
                    <a href="{{route('contact')}}" class="btn">{{__('Contact')}}</a>

{{--                    <div class="search-box" style="position: relative">--}}
{{--                        <input type="text" id="search" placeholder="{{__("Search...")}}" class="btn"/>--}}
{{--                        <img class="search-img" src="https://svgsilh.com/png-1024/1093183.png" alt=""--}}
{{--                             onclick="searchFunction()"/>--}}
{{--                    </div>--}}
                    <style>
                     .search-box a:hover{
                         background-color: #f0f4f9;
                     }
                     .d-none{
                         display: none;
                     }
                    </style>
                    <div class="search-box" style="position: relative;" >
                        <input type="text" id="search" placeholder="{{__("Search...")}}" class="btn">
                        <img style="z-index: 2;position: absolute;top: 11px;left: 14px; height: 20px; margin-left: 16px;" src="https://svgsilh.com/png-1024/1093183.png" alt="" onclick="searchFunction()">
                        <div class="d-none" style="position: absolute;top: 50px;right:5px;background-color: #fff;width: 400px;border-radius: 10px;padding: 10px;">

                        </div>
                    </div>



                    <form action="{{ route('lang.switch', ['locale' => 'az']) }}" method="GET" id="lang-form">
                        <select name="locale" class="lang-select" onchange="updateLanguage(this)">
                            @foreach (['az' => 'Az', 'ru' => 'Ru', 'en' => 'En'] as $key => $label)
                                <option value="{{ $key }}" {{ session('locale', 'az') === $key ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </form>

                    <script>
                        function updateLanguage(selectElement) {
                            const form = document.getElementById('lang-form');
                            form.action = "{{ url('lang') }}/" + selectElement.value;
                            form.submit();
                        }
                    </script>


                    <div class="burger-icn-mobile"></div>
                </div>
            </div>
        </header>
        @yield('content')
        <footer>
            <div class="ft-top">
                <div class="my-container flex">
                    <div class="ft-logo">
                        <img src="{{siteLogo()??asset('img/poh-logo-1.png')}}" alt="logo"/>
                    </div>
                    <a data-form="dp_1" class="btn green">{{__('Send request')}}</a>
                </div>
            </div>
            <div class="ft-mid">
                <div class="my-container flex">
                    <div class="ftm-left">
              <span class="ftm-l-descr">{!!companyName() .  __(' can unload, load and store 11,000 containers per year.')!!}
              </span>
                        <a href="mailto:{{siteEmail()}}" class="ftm-mail"><span>{{siteEmail()}}</span></a>
                        <a href="tel:{{sitePhoneNo1() }}" class="ftm-phone">{{sitePhoneNo1() }}</a>
                        <a href="tel:{{sitePhoneNo2() }}" class="ftm-phone">{{sitePhoneNo2() }}</a>
                        <a href="tel:{{sitePhoneNo3() }}" class="ftm-phone">{{sitePhoneNo3() }}</a>
                    </div>
                    <div class="ftm-right">
                        <a href="mailto:{{siteEmail()}}" class="ftm-mail"><span>{{siteEmail()}}</span></a>
                        <a href="tel:{{sitePhoneNo1() }}" class="ftm-phone">{{sitePhoneNo1()}}</a>
                        <a href="tel:{{sitePhoneNo2() }}" class="ftm-phone">{{sitePhoneNo2()}}</a>
                        <a href="tel:{{sitePhoneNo3() }}" class="ftm-phone">{{sitePhoneNo3()}}</a>
                        <ul>
                            <li style="margin-right: 20px;">
                                <a href="{{siteInstagram()}}" class="social-icons" target="_blank">
                                    <svg width="32px" height="32px" viewBox="0 -0.5 25 25" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                           stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M15.5 5H9.5C7.29086 5 5.5 6.79086 5.5 9V15C5.5 17.2091 7.29086 19 9.5 19H15.5C17.7091 19 19.5 17.2091 19.5 15V9C19.5 6.79086 17.7091 5 15.5 5Z"
                                                  stroke="#fff" stroke-width="1.5" stroke-linecap="round"
                                                  stroke-linejoin="round"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M12.5 15C10.8431 15 9.5 13.6569 9.5 12C9.5 10.3431 10.8431 9 12.5 9C14.1569 9 15.5 10.3431 15.5 12C15.5 12.7956 15.1839 13.5587 14.6213 14.1213C14.0587 14.6839 13.2956 15 12.5 15Z"
                                                  stroke="#fff" stroke-width="1.5" stroke-linecap="round"
                                                  stroke-linejoin="round"></path>
                                            <rect x="15.5" y="9" width="2" height="2" rx="1"
                                                  transform="rotate(-90 15.5 9)" fill="#fff">
                                            </rect>
                                            <rect x="16" y="8.5" width="1" height="1" rx="0.5"
                                                  transform="rotate(-90 16 8.5)" stroke="#fff"
                                                  stroke-linecap="round"></rect>
                                        </g>
                                    </svg>
                                </a>
                            </li>
                            <li style="margin-right: 20px;">
                                <a href="{{siteFacebook()}}" class="social-icons" target="_blank">
                                    <svg fill="#fff" width="32px" height="32px" viewBox="0 0 32 32"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                           stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                    d="M21.95 5.005l-3.306-.004c-3.206 0-5.277 2.124-5.277 5.415v2.495H10.05v4.515h3.317l-.004 9.575h4.641l.004-9.575h3.806l-.003-4.514h-3.803v-2.117c0-1.018.241-1.533 1.566-1.533l2.366-.001.01-4.256z">
                                            </path>
                                        </g>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="{{siteWhatsapp()}}" class="social-icons" target="_blank">
                                    <svg width="32px" height="32px" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                           stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                    d="M6.014 8.00613C6.12827 7.1024 7.30277 5.87414 8.23488 6.01043L8.23339 6.00894C9.14051 6.18132 9.85859 7.74261 10.2635 8.44465C10.5504 8.95402 10.3641 9.4701 10.0965 9.68787C9.7355 9.97883 9.17099 10.3803 9.28943 10.7834C9.5 11.5 12 14 13.2296 14.7107C13.695 14.9797 14.0325 14.2702 14.3207 13.9067C14.5301 13.6271 15.0466 13.46 15.5548 13.736C16.3138 14.178 17.0288 14.6917 17.69 15.27C18.0202 15.546 18.0977 15.9539 17.8689 16.385C17.4659 17.1443 16.3003 18.1456 15.4542 17.9421C13.9764 17.5868 8 15.27 6.08033 8.55801C5.97237 8.24048 5.99955 8.12044 6.014 8.00613Z"
                                                    fill="#fff"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M12 23C10.7764 23 10.0994 22.8687 9 22.5L6.89443 23.5528C5.56462 24.2177 4 23.2507 4 21.7639V19.5C1.84655 17.492 1 15.1767 1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12C23 18.0751 18.0751 23 12 23ZM6 18.6303L5.36395 18.0372C3.69087 16.4772 3 14.7331 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12C21 16.9706 16.9706 21 12 21C11.0143 21 10.552 20.911 9.63595 20.6038L8.84847 20.3397L6 21.7639V18.6303Z"
                                                  fill="#fff"></path>
                                        </g>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                        <ul>
                            <li><a href="{{ route('home') }}#services">{{__('Services')}}</a></li>
                            <li><a href="{{route('contact')}}">{{__('Contact')}}</a></li>
                            <li>
                                <a href="{{route('about',['variable'=>'history'])}}">{{__('About Us')}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="ft-btm">
                <div class="my-container flex">
            <span class="ftb-left">
              {!! companyName() !!},
              2025</span>
                    <div class="ftb-right">
                        <a href="https://npa.az/" rel="nofollow" target="_blank" title="Veb saytlarin hazirlanmasi">
                            <img src="{{asset('img/logo-white.png')}}" alt="" width="100%"/>
                            </a>
                        <p>tərəfindən hazırlanıb</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

<div class="mobile-menu">
    <div class="cm-shadow"></div>
    <div class="cm-top">
        <div class="my-container flex">
            <div class="cmt-logo">
                <a href="{{route('home')}}"><img src="{{siteLogo()??asset('img/poh-logo-1.png')}}" alt="logo"/></a>
            </div>
            <div class="cm-close"></div>
            <div class="cmt-right">
                <a href="tel:{{sitePhoneNo1() }}" class="btn">{{sitePhoneNo1() }}</a>
                <a href="tel:{{sitePhoneNo2() }}" class="btn">{{sitePhoneNo2() }}</a>
                <a href="tel:{{sitePhoneNo3() }}" class="btn">{{sitePhoneNo3() }}</a>
            </div>
        </div>
    </div>
    <div class="cm-btm">
        <div class="my-container flex">
            <div class="cmb-left">
                <div class="cmb-l-btn-wrap">
                    <a href="{{route('home')}}" class="btn">{{__("Home Page")}}</a>
                    <a href="{{route('about',['variable'=>'history'])}}" class="btn">{{__("About Us")}}</a>
                    <a href="{{ route('home') }}#services" class="btn">{{__('Services')}}</a>
                    <a href="{{route('news')}}" class="btn">{{__('News')}}</a>
                    <a href="{{route('about',['variable'=>'gallery'])}}" class="btn">{{__('Gallery')}}</a>
                    <a href="videos.html" class="btn">{{__('Videos')}}</a>
                    <a href="{{route('contact')}}" class="btn">{{__('Contact')}}</a>
                    <form action="{{ route('lang.switch', ['locale' => 'az']) }}" method="GET" id="lang-form">
                        <select name="locale" class="lang-select" onchange="updateLanguage(this)">
                            @foreach (['az' => 'Az', 'ru' => 'Ru', 'en' => 'En'] as $key => $label)
                                <option value="{{ $key }}" {{ session('locale', 'az') === $key ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="media-menu">
    <div class="cm-shadow"></div>
    <div class="cm-top">
        <div class="my-container flex">
            <div class="cmt-logo">
                <a href="{{route('home')}}"><img src="{{siteLogo() ?? asset('img/poh-logo-1.png')}}" alt="logo"/></a>
            </div>
            <div class="cm-close"></div>
            <div class="cmt-right">
                <a href="tel:{{sitePhoneNo1() }}" class="btn">{{sitePhoneNo1() }}</a>
                <a href="tel:{{sitePhoneNo2() }}" class="btn">{{sitePhoneNo2() }}</a>
                <a href="tel:{{sitePhoneNo3() }}" class="btn">{{sitePhoneNo3() }}</a>
            </div>
        </div>
    </div>
    <div class="cm-btm">
        <div class="my-container flex">
            <div class="cmb-left">
                <div class="cmb-l-btn-wrap">
                    <a href="{{route('about',['variable'=>'history'])}}" class="btn">{{__("Our History")}}</a>
                    <a href="{{route('about',['variable'=>'activity'])}}" class="btn">{{__('Our field of activity')}}</a>
                    <a href="{{route('about',['variable'=>'documents'])}}" class="btn">{{__('Documents')}}</a>
                    <a href="{{route('about',['variable'=>'gallery'])}}" class="btn">{{__('Gallery')}}</a>
                </div>
            </div>
        </div>
    </div>
</div>


<form id="contactForm" class="scp-m-form form-store" enctype="multipart/form-data" method="POST"
      action="{{ route('contactRequest') }}">
    @csrf
    <div id="dp_1" class="default-popup">
        <div class="dp-shadow" id="dp_12"></div>
        <div class="dp-content">
            <div class="dp-close"></div>
            <div class="my-container">
                <span class="dpc-hdr">Sorğu göndərin</span>

                <div class="dpc-row two">
                    <div class="def-input">
                        <span class="di-descr">Ad və soyad *</span>
                        <input type="text" name="full_name" placeholder="Ad və soyad" required/>
                        @error('full_name') <span class="error-message">{{ $message }}</span> @enderror
                    </div>
                    <div class="def-input">
                        <span class="di-descr">Telefon *</span>
                        <input type="tel" name="phone" placeholder="Telefon" required/>
                        @error('phone') <span class="error-message">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="dpc-row">
                    <div class="def-input">
                        <span class="di-descr">E-poçt ünvanı *</span>
                        <input type="email" name="email" placeholder="E-poçt ünvanı" required/>
                        @error('email') <span class="error-message">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="dpc-row">
                    <div class="def-input">
                        <span class="di-descr">Mesajınız *</span>
                        <textarea name="message" placeholder="Mesajınızı daxil edin" required></textarea>
                        @error('message') <span class="error-message">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="dpc-btn-wrap">
                    <button type="submit" class="btn green">Göndər</button>
                </div>
            </div>
        </div>
    </div>
</form>

<div id="mail_send_good" class="default-popup">
    <div class="dp-shadow"></div>
    <div class="dp-content">
        <div class="dp-close" onclick="closePopup('mail_send_good')"></div>
        <div class="my-container">
            <span class="dpc-hdr2">{{__('Your application has been sent successfully!')}}</span>
            <div class="dpc-row">
                <div class="def-input">
                    <span class="di-descr2">{{__('Our staff will contact you soon.')}}</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="mail_send_error" class="default-popup">
    <div class="dp-shadow"></div>
    <div class="dp-content">
        <div class="dp-close" onclick="closePopup('mail_send_error')"></div>
        <div class="my-container">
            <span class="dpc-hdr2">{{__('An error occurred!')}}</span>
            <div class="dpc-row">
                <div class="def-input">
                    <span class="di-descr2">{{__('Please fill in all fields correctly and try again.')}}</span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById("contactForm").addEventListener("submit", async function (event) {
        event.preventDefault();

        let form = event.target;
        let formData = new FormData(form);

        let response = await fetch(form.action, {
            method: "POST",
            body: formData,
            headers: {
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
            }
        });

        let result = await response.json();
        console.log(response, result)
        if (response.ok && result.success) {
            document.getElementById("mail_send_good").classList.add("active");
            form.reset();
        } else {
            document.getElementById("mail_send_error").classList.add("active");
        }
    });

    function closePopup(id) {
        document.getElementById(id).classList.remove("active");
    }
</script>


<!-- libs JS -->
<script src="{{asset('libs/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('libs/gsap/gsap.min.js')}}"></script>
<script src="{{asset('libs/gsap/ScrollTrigger.min.js')}}"></script>
<script src="{{asset('libs/gsap/ScrollToPlugin.min.js')}}"></script>
<script src="{{asset('libs/gsap/smooth-scrollbar.js')}}"></script>
<script src="{{asset('libs/fancybox/jquery.fancybox.min.js')}}"></script>
<script src="{{asset('libs/swiper-master/swiper-bundle.min.js')}}"></script>
<script src="{{asset('libs/aos/aos.js')}}"></script>
<script src="{{asset('libs/customSelect/cs.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>


<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="{{asset('js/custom.js')}}"></script>
<script>
    var swiper = new Swiper(".CustomSwiper", {
        slidesPerView: 1,
        spaceBetween: 10,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            640: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 6,
                spaceBetween: 40,
            },
            1024: {
                slidesPerView: 8,
                spaceBetween: 50,
            },
        },
        autoplay: {
            delay: 2000,
        },
        loop: true,
    });
</script>
<script>
    var swiper = new Swiper(".mySwiper-2", {
        loop: true,
        rewind: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>
<script>
    var swiper = new Swiper(".mySwiper-2", {
        loop: true,
        rewind: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>
<script>

</script>
</body>

</html>
