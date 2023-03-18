@extends('front.layouts.app')

@section('content')
<!-- main area -->
        <!-- banner-area -->
        <section class="banner">
            <div class="container custom-container">
                <div class="row align-items-center justify-content-center justify-content-lg-between">
                    <div class="col-lg-6 order-0 order-lg-2">
                        <div class="banner__img text-center text-xxl-end" >
                            <img src="{{asset('uploads/profile/'.$AlldataP[0]->image)}}" alt="" width="450" height="700">
                            
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6">
                        <div class="banner__content">
                        
                            <h2 class="title wow fadeInUp" data-wow-delay=".2s">{{$AlldataP[0]->main_title}} <br>
                               </h2>
                            <p class="wow fadeInUp" data-wow-delay=".4s"> {{$AlldataP[0]->title}}</p>
                            <a href="{{route('about')}}" class="btn dark-purple banner__btn wow fadeInUp" data-wow-delay=".6s"> {{$AlldataP[0]->btn_name}}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="scroll__down">
                <a href="#aboutSection" class="scroll__link">Scroll down</a>
            </div>
            <div class="banner__video">
                <a href="https://www.youtube.com/watch?v=pZVdQLn_E5w" class="popup-video dark-purple"><i
                        class="fas fa-play"></i></a>

        </section>
        <!-- banner-area-end -->

        <!-- about-area -->
        <section id="aboutSection" class="about">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <ul class="about__icons__wrap">
                           
                           @foreach ( $MultiImg as $img)
                           <li>
                            <img style="object-fit:contain" src="{{asset('uploads/AboutMe/'. $img->image)}}" alt="XD" width="200" height="100">
                            {{-- <img class="dark" src="{{asset('frontDesign/img/icons/xd.png')}}" alt="XD"> --}}
                        </li>
                           @endforeach 
                           
                    </ul>
                    </div>
                    <div class="col-lg-6">
                        <div class="about__content">
                            <div class="section__title">
                                <span class="sub-title">01 - About me</span>
                                <h2 class="title">{{$AllAbt[0]->main_title}}</h2>
                            </div>
                            <div class="about__exp">
                                <div class="about__exp__icon">
                                    <img src="{{asset('frontDesign/img/icons/about_icon.png')}}" alt="">
                                </div>
                                <div class="about__exp__content">
                                    <p>{{$AllAbt[0]->title}}</p>
                                </div>
                            </div>
                            <p class="desc">{{$AllAbt[0]->desc}}</p>
                            <a href="about.html" class="btn">Download my resume</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-area-end -->

        <!-- services-area -->
        <section class="services">
            <div class="container">
                <div class="services__title__wrap">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-xl-5 col-lg-6 col-md-8">
                            <div class="section__title">
                                <span class="sub-title">02 - my Services</span>
                                <h2 class="title">Creates amazing digital experiences</h2>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-6 col-md-4">
                            <div class="services__arrow"></div>
                        </div>
                    </div>
                </div>
                <div class="row gx-0 services__active">
                    @foreach ($Allserv as $serv)
                        
                   
                    <div class="col-xl-3">
                        <div class="services__item">
                            <div class="services__thumb">
                                <a href=" {{route('servDetails',['servDetails' => $serv->id ])}} "><img src="{{asset('uploads/services/'.$serv->image)}}"
                                        alt="img" height="200"></a>
                            </div>
                            <div class="services__content">
                                <div class="services__icon">
                                    <img class="light" src="{{asset('frontDesign/img/icons/services_light_icon01.png')}}" alt="">
                                    <img class="dark" src="{{asset('frontDesign/img/icons/services_icon01.png')}}" alt="">
                                </div>
                                <h3 class="title"><a href="services-details.html">{{$serv->name}}</a></h3>
                                <p>{{$serv->desc}}</p>
                                {{-- <ul class="services__list">
                                    <li>Research & Data</li>
                                    <li>Branding & Positioning</li>
                                    <li>Business Consulting</li>
                                    <li>Go To Market</li>
                                </ul> --}}
                                <div class="my-3"> {!! html_entity_decode($serv->editor1) !!}</div>
                                {{-- <a href="{{route('servDetails')}}" class="btn border-btn">Read more</a> --}}
                               
                                <a href=" {{route('servDetails',['servDetails' => $serv->id ])}}" class="btn border-btn">Read more</a>

                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- <div class="col-xl-3">
                        <div class="services__item">
                            <div class="services__thumb">
                                <a href="services-details.html"><img src="{{asset('frontDesign/img/images/services_img02.jpg')}}"
                                        alt=""></a>
                            </div>
                            <div class="services__content">
                                <div class="services__icon">
                                    <img class="light" src="{{asset('frontDesign/img/icons/services_light_icon02.png')}}" alt="">
                                    <img class="dark" src="{{asset('frontDesign/img/icons/services_icon02.png')}}" alt="">
                                </div>
                                <h3 class="title"><a href="services-details.html">Brand Strategy</a></h3>
                                <p>Strategy is a forward-looking plan for your brand’s behavior. Strategy is a
                                    forward-looking plan.</p>
                                <ul class="services__list">
                                    <li>User Research & Testing</li>
                                    <li>UX Design</li>
                                    <li>Visual Design</li>
                                    <li>Information Architecture</li>
                                </ul>
                                <a href="services-details.html" class="btn border-btn">Read more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="services__item">
                            <div class="services__thumb">
                                <a href="services-details.html"><img src="{{asset('frontDesign/img/images/services_img03.jpg')}}"
                                        alt=""></a>
                            </div>
                            <div class="services__content">
                                <div class="services__icon">
                                    <img class="light" src="{{asset('frontDesign/img/icons/services_light_icon03.png')}}" alt="">
                                    <img class="dark" src="{{asset('frontDesign/img/icons/services_icon03.png')}}" alt="">
                                </div>
                                <h3 class="title"><a href="services-details.html">Product Design</a></h3>
                                <p>Strategy is a forward-looking plan for your brand’s behavior. Strategy is a
                                    forward-looking plan.</p>
                                <ul class="services__list">
                                    <li>User Research & Testing</li>
                                    <li>UX Design</li>
                                    <li>Visual Design</li>
                                    <li>Information Architecture</li>
                                </ul>
                                <a href="services-details.html" class="btn border-btn">Read more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="services__item">
                            <div class="services__thumb">
                                <a href="services-details.html"><img src="{{asset('frontDesign/img/images/services_img04.jpg')}}"
                                        alt=""></a>
                            </div>
                            <div class="services__content">
                                <div class="services__icon">
                                    <img class="light" src="{{asset('frontDesign/img/icons/services_light_icon04.png')}}" alt="">
                                    <img class="dark" src="{{asset('frontDesign/img/icons/services_icon04.png')}}" alt="">
                                </div>
                                <h3 class="title"><a href="services-details.html">Visual Design</a></h3>
                                <p>Strategy is a forward-looking plan for your brand’s behavior. Strategy is a
                                    forward-looking plan.</p>
                                <ul class="services__list">
                                    <li>User Research & Testing</li>
                                    <li>UX Design</li>
                                    <li>Visual Design</li>
                                    <li>Information Architecture</li>
                                </ul>
                                <a href="services-details.html" class="btn border-btn">Read more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="services__item">
                            <div class="services__thumb">
                                <a href="services-details.html"><img src="{{asset('frontDesign/img/images/services_img03.jpg')}}"
                                        alt=""></a>
                            </div>
                            <div class="services__content">
                                <div class="services__icon">
                                    <img class="light" src="{{asset('frontDesign/img/icons/services_light_icon02.png')}}" alt="">
                                    <img class="dark" src="{{asset('frontDesign/img/icons/services_icon02.png')}}" alt="">
                                </div>
                                <h3 class="title"><a href="services-details.html">Web Development</a></h3>
                                <p>Strategy is a forward-looking plan for your brand’s behavior. Strategy is a
                                    forward-looking plan.</p>
                                <ul class="services__list">
                                    <li>User Research & Testing</li>
                                    <li>UX Design</li>
                                    <li>Visual Design</li>
                                    <li>Information Architecture</li>
                                </ul>
                                <a href="services-details.html" class="btn border-btn">Read more</a>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </section>
        <!-- services-area-end -->

        <!-- work-process-area -->
        <section class="work__process">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section__title text-center">
                            <span class="sub-title">03 - Working Process</span>
                            <h2 class="title">A clear product design process is the basis of success</h2>
                        </div>
                    </div>
                </div>
                <div class="row work__process__wrap">
                    @foreach ($Allwork as $work)
                    <div class="col">
                        <div class="work__process__item">
                            <span class="work__process_step">Step -0{{$work->id}}</span>
                            <div class="work__process__icon">
                                <img class="light image-fluid" src="{{asset('uploads/working/' . $work->icon)}}" height="200"  style="object-fit: contain" alt="">
                               
                            </div>
                            <div class="work__process__content">
                                <h4 class="title"> {{$work->title}}</h4>
                                <p> {{$work->desc}}</p>
                            </div>
                        </div>
                    </div> 
                    @endforeach
                   
                       {{-- <div class="col">
                        <div class="work__process__item">
                            <span class="work__process_step">Step - 02</span>
                            <div class="work__process__icon">
                                <img class="light" src="{{asset('frontDesign/img/icons/wp_light_icon02.png')}}" alt="">
                                <img class="dark" src="{{asset('frontDesign/img/icons/wp_icon02.png')}}" alt="">
                            </div>
                            <div class="work__process__content">
                                <h4 class="title">Define</h4>
                                <p>Interpretation & Alignment of findings to project objectives.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="work__process__item">
                            <span class="work__process_step">Step - 03</span>
                            <div class="work__process__icon">
                                <img class="light" src="{{asset('frontDesign/img/icons/wp_light_icon03.png')}}" alt="">
                                <img class="dark" src="{{asset('frontDesign/img/icons/wp_icon03.png')}}" alt="">
                            </div>
                            <div class="work__process__content">
                                <h4 class="title">Develop</h4>
                                <p>Design-Led concept and Proposals hearted & assessed</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="work__process__item">
                            <span class="work__process_step">Step - 04</span>
                            <div class="work__process__icon">
                                <img class="light" src="{{asset('frontDesign/img/icons/wp_light_icon04.png')}}" alt="">
                                <img class="dark" src="{{asset('frontDesign/img/icons/wp_icon04.png')}}" alt="">
                            </div>
                            <div class="work__process__content">
                                <h4 class="title">Deliver</h4>
                                <p>Process outcomes finalised & Implemented</p>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </section>
        <!-- work-process-area-end -->

        <!-- portfolio-area -->
        <section class="portfolio">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section__title text-center">
                            <span class="sub-title">04 - Portfolio</span>
                            <h2 class="title">All creative work</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-10 col-lg-12">
                        <ul class="nav nav-tabs portfolio__nav" id="portfolioTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all"
                                    type="button" role="tab" aria-controls="all" aria-selected="true">All</button>
                            </li>
                           @foreach ($creative as $crtv)
                                <li class="nav-item" role="presentation">
                                <button class="nav-link" id="{{$crtv->name}}.-tab" data-bs-toggle="tab" data-bs-target="#{{$crtv->name}}"
                                    type="button" role="tab" aria-controls="{{$crtv->name}}"
                                    aria-selected="false">{{$crtv->name}}</button>
                                 </li>
                           @endforeach
                           
                            {{-- <li class="nav-item" role="presentation">
                                <button class="nav-link" id="apps-tab" data-bs-toggle="tab" data-bs-target="#apps"
                                    type="button" role="tab" aria-controls="apps" aria-selected="false">mobile
                                    apps</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="dashboard-tab" data-bs-toggle="tab"
                                    data-bs-target="#dashboard" type="button" role="tab" aria-controls="dashboard"
                                    aria-selected="false">Dashboard</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="landing-tab" data-bs-toggle="tab" data-bs-target="#landing"
                                    type="button" role="tab" aria-controls="landing" aria-selected="false">landing
                                    page</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="branding-tab" data-bs-toggle="tab"
                                    data-bs-target="#branding" type="button" role="tab" aria-controls="branding"
                                    aria-selected="false">Branding</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="graphic-tab" data-bs-toggle="tab" data-bs-target="#graphic"
                                    type="button" role="tab" aria-controls="graphic" aria-selected="false">Graphic
                                    Design</button>
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-content" id="portfolioTabContent">
                <div class="tab-pane show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                    <div class="container">
                        <div class="row gx-0 justify-content-center">
                            <div class="col">
                                <div class="portfolio__active">
                                  @foreach ($cretWorkImg as $wImage)
                                       <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{asset('uploads/crimages/'.$wImage->image )}}" alt="" width="1020" height="520" style="object-fit:fill">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>Apps Design</span>
                                            <h4 class="title"><a href="portfolio-details.html">Banking Management
                                                    System</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div>

                                    
                                  @endforeach
                                  {{-- $creative->CreativeWorkimages->image --}}


                                   

                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{asset('frontDesign/img/portfolio/portfolio_img03.jpg')}}" alt="">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>UX/UI Design</span>
                                            <h4 class="title"><a href="portfolio-details.html">Banking Management
                                                    System</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div>
                                    {{-- <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{asset('frontDesign/img/portfolio/portfolio_img04.jpg')}}" alt="">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>Web Development</span>
                                            <h4 class="title"><a href="portfolio-details.html">Banking Management
                                                    System</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div>
                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{asset('frontDesign/img/portfolio/portfolio_img05.jpg')}}" alt="">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>Web Development</span>
                                            <h4 class="title"><a href="portfolio-details.html">Banking Management
                                                    System</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div>
                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{asset('frontDesign/img/portfolio/portfolio_img06.jpg')}}" alt="">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>Web Development</span>
                                            <h4 class="title"><a href="portfolio-details.html">Banking Management
                                                    System</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div>
                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{asset('frontDesign/img/portfolio/portfolio_img07.jpg')}}" alt="">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>Web Development</span>
                                            <h4 class="title"><a href="portfolio-details.html">Banking Management
                                                    System</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                @foreach ($creative as $crtv )
                    
               
                <div class="tab-pane" id="website" role="tabpanel" aria-labelledby="website-tab">
                    <div class="container">
                        <div class="row gx-0 justify-content-center">
                            <div class="col">
                                <div class="portfolio__active">
                                    {{-- @foreach ( as )
                                        
                                    @endforeach --}}
                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{asset('frontDesign/img/portfolio/portfolio_img07.jpg')}}" alt="">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>Web Development</span>
                                            <h4 class="title"><a href="portfolio-details.html">Nature of Business
                                                    Strategy System</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div>

                                    {{-- <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{asset('frontDesign/img/portfolio/portfolio_img06.jpg')}}" alt="">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>Web Development</span>
                                            <h4 class="title"><a href="portfolio-details.html">Banking Management
                                                    System</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div>
                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{asset('frontDesign/img/portfolio/portfolio_img01.jpg')}}" alt="">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>Apps Design</span>
                                            <h4 class="title"><a href="portfolio-details.html">Banking Management
                                                    System</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div>
                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{asset('frontDesign/img/portfolio/portfolio_img02.jpg')}}" alt="">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>Web Design</span>
                                            <h4 class="title"><a href="portfolio-details.html">Banking Management
                                                    System</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div>
                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{asset('frontDesign/img/portfolio/portfolio_img03.jpg')}}" alt="">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>UX/UI Design</span>
                                            <h4 class="title"><a href="portfolio-details.html">Banking Management
                                                    System</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div>
                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{asset('frontDesign/img/portfolio/portfolio_img04.jpg')}}" alt="">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>Web Development</span>
                                            <h4 class="title"><a href="portfolio-details.html">Banking Management
                                                    System</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div>
                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{asset('frontDesign/img/portfolio/portfolio_img05.jpg')}}" alt="">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>Web Development</span>
                                            <h4 class="title"><a href="portfolio-details.html">Banking Management
                                                    System</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                {{-- <div class="tab-pane" id="apps" role="tabpanel" aria-labelledby="apps-tab">
                    <div class="container">
                        <div class="row gx-0 justify-content-center">
                            <div class="col">
                                <div class="portfolio__active">
                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{asset('frontDesign/img/portfolio/portfolio_img06.jpg')}}" alt="">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>Web Development</span>
                                            <h4 class="title"><a href="portfolio-details.html">Product Design and
                                                    Development</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div>
                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{asset('frontDesign/img/portfolio/portfolio_img01.jpg')}}" alt="">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>Apps Design</span>
                                            <h4 class="title"><a href="portfolio-details.html">Banking Management
                                                    System</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div>
                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{asset('frontDesign/img/portfolio/portfolio_img02.jpg')}}" alt="">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>Web Design</span>
                                            <h4 class="title"><a href="portfolio-details.html">Banking Management
                                                    System</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div>
                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{asset('frontDesign/img/portfolio/portfolio_img03.jpg')}}" alt="">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>UX/UI Design</span>
                                            <h4 class="title"><a href="portfolio-details.html">Banking Management
                                                    System</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div>
                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{asset('frontDesign/img/portfolio/portfolio_img04.jpg')}}" alt="">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>Web Development</span>
                                            <h4 class="title"><a href="portfolio-details.html">Banking Management
                                                    System</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div>
                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{asset('frontDesign/img/portfolio/portfolio_img05.jpg')}}" alt="">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>Web Development</span>
                                            <h4 class="title"><a href="portfolio-details.html">Banking Management
                                                    System</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div>
                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{asset('frontDesign/img/portfolio/portfolio_img07.jpg')}}" alt="">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>Web Development</span>
                                            <h4 class="title"><a href="portfolio-details.html">Banking Management
                                                    System</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                    <div class="container">
                        <div class="row gx-0 justify-content-center">
                            <div class="col">
                                <div class="portfolio__active">
                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{asset('frontDesign/img/portfolio/portfolio_img05.jpg')}}" alt="">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>Web Development</span>
                                            <h4 class="title"><a href="portfolio-details.html">Brand strategy System
                                                    Management</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div>
                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{asset('frontDesign/img/portfolio/portfolio_img01.jpg')}}" alt="">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>Apps Design</span>
                                            <h4 class="title"><a href="portfolio-details.html">Banking Management
                                                    System</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div>
                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{asset('frontDesign/img/portfolio/portfolio_img02.jpg')}}" alt="">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>Web Design</span>
                                            <h4 class="title"><a href="portfolio-details.html">Banking Management
                                                    System</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div>
                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{asset('frontDesign/img/portfolio/portfolio_img03.jpg')}}" alt="">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>UX/UI Design</span>
                                            <h4 class="title"><a href="portfolio-details.html">Banking Management
                                                    System</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div>
                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{asset('frontDesign/img/portfolio/portfolio_img04.jpg')}}" alt="">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>Web Development</span>
                                            <h4 class="title"><a href="portfolio-details.html">Banking Management
                                                    System</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div>
                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{asset('frontDesign/img/portfolio/portfolio_img06.jpg')}}" alt="">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>Web Development</span>
                                            <h4 class="title"><a href="portfolio-details.html">Banking Management
                                                    System</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div>
                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{asset('frontDesign/img/portfolio/portfolio_img07.jpg')}}" alt="">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>Web Development</span>
                                            <h4 class="title"><a href="portfolio-details.html">Banking Management
                                                    System</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="landing" role="tabpanel" aria-labelledby="landing-tab">
                    <div class="container">
                        <div class="row gx-0 justify-content-center">
                            <div class="col">
                                <div class="portfolio__active">
                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{asset('frontDesign/img/portfolio/portfolio_img04.jpg')}}" alt="">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>Web Development</span>
                                            <h4 class="title"><a href="portfolio-details.html">Visual Design System
                                                    Management</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div>
                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{asset('frontDesign/img/portfolio/portfolio_img01.jpg')}}" alt="">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>Apps Design</span>
                                            <h4 class="title"><a href="portfolio-details.html">Banking Management
                                                    System</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div>
                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{asset('frontDesign/img/portfolio/portfolio_img02.jpg')}}" alt="">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>Web Design</span>
                                            <h4 class="title"><a href="portfolio-details.html">Banking Management
                                                    System</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div>
                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{asset('frontDesign/img/portfolio/portfolio_img03.jpg')}}" alt="">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>UX/UI Design</span>
                                            <h4 class="title"><a href="portfolio-details.html">Banking Management
                                                    System</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div>
                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{asset('frontDesign/img/portfolio/portfolio_img05.jpg')}}" alt="">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>Web Development</span>
                                            <h4 class="title"><a href="portfolio-details.html">Banking Management
                                                    System</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div>
                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{asset('frontDesign/img/portfolio/portfolio_img06.jpg')}}" alt="">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>Web Development</span>
                                            <h4 class="title"><a href="portfolio-details.html">Banking Management
                                                    System</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div>
                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{asset('frontDesign/img/portfolio/portfolio_img07.jpg')}}" alt="">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>Web Development</span>
                                            <h4 class="title"><a href="portfolio-details.html">Banking Management
                                                    System</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="branding" role="tabpanel" aria-labelledby="branding-tab">
                    <div class="container">
                        <div class="row gx-0 justify-content-center">
                            <div class="col">
                                <div class="portfolio__active">
                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{asset('frontDesign/img/portfolio/portfolio_img03.jpg')}}" alt="">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>UX/UI Design</span>
                                            <h4 class="title"><a href="portfolio-details.html">Animation Management
                                                    System</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div>
                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{asset('frontDesign/img/portfolio/portfolio_img01.jpg')}}" alt="">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>Apps Design</span>
                                            <h4 class="title"><a href="portfolio-details.html">Banking Management
                                                    System</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div>
                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{asset('frontDesign/img/portfolio/portfolio_img02.jpg')}}" alt="">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>Web Design</span>
                                            <h4 class="title"><a href="portfolio-details.html">Banking Management
                                                    System</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div>
                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{asset('frontDesign/img/portfolio/portfolio_img04.jpg')}}" alt="">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>Web Development</span>
                                            <h4 class="title"><a href="portfolio-details.html">Banking Management
                                                    System</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div>
                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{asset('frontDesign/img/portfolio/portfolio_img05.jpg')}}" alt="">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>Web Development</span>
                                            <h4 class="title"><a href="portfolio-details.html">Banking Management
                                                    System</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div>
                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{asset('frontDesign/img/portfolio/portfolio_img06.jpg')}}" alt="">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>Web Development</span>
                                            <h4 class="title"><a href="portfolio-details.html">Banking Management
                                                    System</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div>
                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{asset('frontDesign/img/portfolio/portfolio_img07.jpg')}}" alt="">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>Web Development</span>
                                            <h4 class="title"><a href="portfolio-details.html">Banking Management
                                                    System</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="graphic" role="tabpanel" aria-labelledby="graphic-tab">
                    <div class="container">
                        <div class="row gx-0 justify-content-center">
                            <div class="col">
                                <div class="portfolio__active">
                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{asset('frontDesign/img/portfolio/portfolio_img02.jpg')}}" alt="">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>Web Design</span>
                                            <h4 class="title"><a href="portfolio-details.html">Graphic Design Management
                                                    System</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div>
                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{asset('frontDesign/img/portfolio/portfolio_img01.jpg')}}" alt="">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>Apps Design</span>
                                            <h4 class="title"><a href="portfolio-details.html">Banking Management
                                                    System</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div>
                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{asset('frontDesign/img/portfolio/portfolio_img03.jpg')}}" alt="">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>UX/UI Design</span>
                                            <h4 class="title"><a href="portfolio-details.html">Banking Management
                                                    System</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div>
                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{asset('frontDesign/img/portfolio/portfolio_img04.jpg')}}" alt="">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>Web Development</span>
                                            <h4 class="title"><a href="portfolio-details.html">Banking Management
                                                    System</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div>
                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{asset('frontDesign/img/portfolio/portfolio_img05.jpg')}}" alt="">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>Web Development</span>
                                            <h4 class="title"><a href="portfolio-details.html">Banking Management
                                                    System</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div>
                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{asset('frontDesign/img/portfolio/portfolio_img06.jpg')}}" alt="">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>Web Development</span>
                                            <h4 class="title"><a href="portfolio-details.html">Banking Management
                                                    System</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div>
                                    <div class="portfolio__item">
                                        <div class="portfolio__thumb">
                                            <img src="{{asset('frontDesign/img/portfolio/portfolio_img07.jpg')}}" alt="">
                                        </div>
                                        <div class="portfolio__overlay__content">
                                            <span>Web Development</span>
                                            <h4 class="title"><a href="portfolio-details.html">Banking Management
                                                    System</a></h4>
                                            <a href="portfolio-details.html" class="link">Case Study</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </section>
        <!-- portfolio-area-end -->

        <!-- partner-area -->
        <section class="partner">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <ul class="partner__logo__wrap">
                            <li>
                                <img class="light" src="{{asset('frontDesign/img/icons/partner_light01.png')}}" alt="">
                                <img class="dark" src="{{asset('frontDesign/img/icons/partner_01.png')}}" alt="">
                            </li>
                            <li>
                                <img class="light" src="{{asset('frontDesign/img/icons/partner_light02.png')}}" alt="">
                                <img class="dark" src="{{asset('frontDesign/img/icons/partner_02.png')}}" alt="">
                            </li>
                            <li>
                                <img class="light" src="{{asset('frontDesign/img/icons/partner_light03.png')}}" alt="">
                                <img class="dark" src="{{asset('frontDesign/img/icons/partner_03.png')}}" alt="">
                            </li>
                            <li>
                                <img class="light" src="{{asset('frontDesign/img/icons/partner_light04.png')}}" alt="">
                                <img class="dark" src="{{asset('frontDesign/img/icons/partner_04.png')}}" alt="">
                            </li>
                            <li>
                                <img class="light" src="{{asset('frontDesign/img/icons/partner_light05.png')}}" alt="">
                                <img class="dark" src="{{asset('frontDesign/img/icons/partner_05.png')}}" alt="">
                            </li>
                            <li>
                                <img class="light" src="{{asset('frontDesign/img/icons/partner_light06.png')}}" alt="">
                                <img class="dark" src="{{asset('frontDesign/img/icons/partner_06.png')}}" alt="">
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <div class="partner__content">
                            <div class="section__title">
                                <span class="sub-title">05 - partners</span>
                                <h2 class="title">I proud to have collaborated with some awesome companies</h2>
                            </div>
                            <p>I'm a bit of a digital product junky. Over the years, I've used hundreds of web and
                                mobile apps in different industries and verticals. Eventually, I decided that it would
                                be a fun challenge to try designing and building my own.</p>
                            <a href="contact.html" class="btn">Start a conversation</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- partner-area-end -->

        <!-- testimonial-area -->
        <section class="testimonial">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-6 order-0 order-lg-2">
                        <ul class="testimonial__avatar__img">
                            <li><img src="{{asset('frontDesign/img/images/testi_img01.png')}}" alt=""></li>
                            <li><img src="{{asset('frontDesign/img/images/testi_img02.png')}}" alt=""></li>
                            <li><img src="{{asset('frontDesign/img/images/testi_img03.png')}}" alt=""></li>
                            <li><img src="{{asset('frontDesign/img/images/testi_img04.png')}}" alt=""></li>
                            <li><img src="{{asset('frontDesign/img/images/testi_img05.png')}}" alt=""></li>
                            <li><img src="{{asset('frontDesign/img/images/testi_img06.png')}}" alt=""></li>
                            <li><img src="{{asset('frontDesign/img/images/testi_img07.png')}}" alt=""></li>
                        </ul>
                    </div>
                    <div class="col-xl-5 col-lg-6">
                        <div class="testimonial__wrap">
                            <div class="section__title">
                                <span class="sub-title">06 - Client Feedback</span>
                                <h2 class="title">Happy clients feedback</h2>
                            </div>
                            <div class="testimonial__active">
                                <div class="testimonial__item">
                                    <div class="testimonial__icon">
                                        <i class="fas fa-quote-left"></i>
                                    </div>
                                    <div class="testimonial__content">
                                        <p>We are motivated by the satisfaction of our clients. Put your trust in us
                                            &share in our H.Spond Asset Management is made up of a team of expert,
                                            committed and experienced people with a passion for financial markets. Our
                                            goal is to achieve continuous.</p>
                                        <div class="testimonial__avatar">
                                            <span>Rasalina De Wiliamson</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="testimonial__item">
                                    <div class="testimonial__icon">
                                        <i class="fas fa-quote-left"></i>
                                    </div>
                                    <div class="testimonial__content">
                                        <p>We are motivated by the satisfaction of our clients. Put your trust in us
                                            &share in our H.Spond Asset Management is made up of a team of expert,
                                            committed and experienced people with a passion for financial markets. Our
                                            goal is to achieve continuous.</p>
                                        <div class="testimonial__avatar">
                                            <span>Rasalina De Wiliamson</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial__arrow"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- testimonial-area-end -->

        <!-- blog-area -->
        <section class="blog">
            <div class="container">
                <div class="row gx-0 justify-content-center">
                    <div class="col-lg-4 col-md-6 col-sm-9">
                        <div class="blog__post__item">
                            <div class="blog__post__thumb">
                                <a href="blog-details.html"><img src="{{asset('frontDesign/img/blog/blog_post_thumb01.jpg')}}" alt=""></a>
                                <div class="blog__post__tags">
                                    <a href="blog.html">Story</a>
                                </div>
                            </div>
                            <div class="blog__post__content">
                                <span class="date">13 january 2021</span>
                                <h3 class="title"><a href="blog-details.html">Facebook design is dedicated to what's new
                                        in design</a></h3>
                                <a href="blog-details.html" class="read__more">Read mORe</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-9">
                        <div class="blog__post__item">
                            <div class="blog__post__thumb">
                                <a href="blog-details.html"><img src="{{asset('frontDesign/img/blog/blog_post_thumb02.jpg')}}" alt=""></a>
                                <div class="blog__post__tags">
                                    <a href="blog.html">Social</a>
                                </div>
                            </div>
                            <div class="blog__post__content">
                                <span class="date">13 january 2021</span>
                                <h3 class="title"><a href="blog-details.html">Make communication Fast and
                                        Effectively.</a></h3>
                                <a href="blog-details.html" class="read__more">Read mORe</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-9">
                        <div class="blog__post__item">
                            <div class="blog__post__thumb">
                                <a href="blog-details.html"><img src="{{asset('frontDesign/img/blog/blog_post_thumb03.jpg')}}" alt=""></a>
                                <div class="blog__post__tags">
                                    <a href="blog.html">Work</a>
                                </div>
                            </div>
                            <div class="blog__post__content">
                                <span class="date">13 january 2021</span>
                                <h3 class="title"><a href="blog-details.html">How to increase your productivity at work
                                        - 2021</a></h3>
                                <a href="blog-details.html" class="read__more">Read mORe</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blog__button text-center">
                    <a href="blog.html" class="btn">more blog</a>
                </div>
            </div>
        </section>
        <!-- blog-area-end -->

        <!-- contact-area -->
        <section class="homeContact">
            <div class="container">
                <div class="homeContact__wrap">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="section__title">
                                <span class="sub-title">07 - Say hello</span>
                                <h2 class="title">Any questions? Feel free <br> to contact</h2>
                            </div>
                            <div class="homeContact__content">
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                    suffered alteration in some form</p>
                                <h2 class="mail"><a href="mailto:Info@webmail.com">Info@webmail.com</a></h2>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="homeContact__form">
                                <form action="#">
                                    <input type="text" placeholder="Enter name*">
                                    <input type="email" placeholder="Enter mail*">
                                    <input type="number" placeholder="Enter number*">
                                    <textarea name="message" placeholder="Enter Massage*"></textarea>
                                    <button type="submit">Send Message</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-area-end -->

        @endsection
        @section('page_title','LOBNA')
        <script>
            window.onload = function() {
                ckEditor("editor1").replace();
            };
        </script>