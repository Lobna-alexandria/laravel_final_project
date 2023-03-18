@extends('front.layouts.app')

@section('content')
<!-- main-area -->
        <main>

            <!-- breadcrumb-area -->
            <section class="breadcrumb__wrap">
                <div class="container custom-container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8 col-md-10">
                            <div class="breadcrumb__wrap__content">
                                <h2 class="title">Services Details</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route('welcome')}}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Details</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="breadcrumb__wrap__icon">
                    <ul>
                        @foreach ($AllImg as $img)
                        <li><img src="{{asset('uploads/AboutMe/'.$img->image)}}" alt=""></li>

                        @endforeach
                        
                    </ul>
                </div>
            </section>
            <!-- breadcrumb-area-end -->

            <!-- services-details-area -->
            <section class="services__details">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="services__details__thumb">
                             
                                <img src="{{asset('uploads/services/'. $AllServs[0]->image)}}" width="800" style="object-fit: contain" alt="">
                             
                            </div>
                            <div class="services__details__content">
                               
                                <h2 class="title">{{$AllServs[0]->name}}</h2>
                               
                                <p>Definition: Business strategy can be understood as the course of action or set of decisions which assist the
                                entrepreneurs in achieving specific business objectives.</p>
                                <p>It is nothing but a master plan that the management of a company implements to secure a competitive position in the market, carry on its operations, please customers and achieve the desired ends of the business.</p>
                                <p>In business, it is the long-range sketch of the desired image, direction and destination of the organization. It is a scheme of corporate intent and action, which is carefully planned and flexibly designed with the purpose of</p>
                                <ul class="services__details__list">
                                    <li>Achieving effectiveness,</li>
                                    <li>Perceiving and utilizing opportunities,</li>
                                    <li>Mobilising resources,</li>
                                    <li>Securing an advantageous position,</li>
                                    <li>Meeting challenges and threats,</li>
                                    <li>Directing efforts and behaviour and</li>
                                    <li>Gaining command over the situation.</li>
                                </ul>
                                <p>A business strategy is a set of competitive moves and actions that a business uses to attract customers, compete
                                successfully, strengthening performance, and achieve organizational goals. It outlines how business should be carried
                                out to reach the desired ends</p>
                                <div class="services__details__img">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <img src="{{asset('uploads/services/serv4.jpeg')}}" alt="">
                                        </div>
                                        <div class="col-sm-6">
                                            <img src="{{asset('uploads/services/serv5.jpeg')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <h2 class="small-title">Nature of Business Strategy</h2>
                                <p>A business strategy is a combination of proactive actions on the part of management, for the purpose of enhancing the company’s market position and overall performance and reactions to unexpected developments and new market.</p>
                                <p>The maximum part of the company’s present strategy is a result of formerly initiated actions and business approaches, but when market conditions take an unanticipated turn, the company requires a strategic reaction to cope with contingencies. Hence, for unforeseen development, a part of the business strategy is formulated as a reasoned response nature of business strategy.</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <aside class="services__sidebar">
                                <div class="widget">
                                    <h5 class="title">Get in Touch</h5>
                                    <form action="#" class="sidebar__contact">
                                        <input type="text" placeholder="Enter name*">
                                        <input type="email" placeholder="Enter your mail*">
                                        <textarea name="message" id="message" placeholder="Massage*"></textarea>
                                        <button type="submit" class="btn">send massage</button>
                                    </form>
                                </div>
                                <div class="widget">
                                    <h5 class="title">Contact Information</h5>
                                    <ul class="sidebar__contact__info">
                                        <li><span>Address :</span> {{$AllAbout[0]->address}} </li>
                                        <li><span>Mail :</span>  {{$AllAbout[0]->mail}}</li>
                                        <li><span>Phone :</span> +7464 0187 3535 645</li>
                                        <li><span>Fax id :</span> +9 659459 49594</li>
                                    </ul>
                                    <ul class="sidebar__contact__social">
                                        @foreach ($servIcons as $icon)
                                      <li><a href="{{$icon->linkname}}" blank><img src="{{asset('uploads/ServMultiIcons/'.$icon->image)}}" alt=""></a></li>

                                        @endforeach
                                       
                                    </ul>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </section>
            <!-- services-details-area-end -->


            <!-- contact-area -->
            <section class="homeContact homeContact__style__two">
                <div class="container">
                    <div class="homeContact__wrap">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="section__title">
                                    <span class="sub-title">07 - Say hello</span>
                                    <h2 class="title">Any questions? Feel free <br> to contact</h2>
                                </div>
                                <div class="homeContact__content">
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
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

        </main>
        <!-- main-area-end -->

@endsection
@section('page_title','ABOUT')
     
@section('page_js')

		<!-- JS here -->
        <script src="{{asset('frontDesign/js/vendor/jquery-3.6.0.min.js')}}"></script>
        <script src="{{asset('frontDesign/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('frontDesign/js/isotope.pkgd.min.js')}}"></script>
        <script src="{{asset('frontDesign/js/imagesloaded.pkgd.min.js')}}"></script>
        <script src="{{asset('frontDesign/js/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{asset('frontDesign/js/element-in-view.js')}}"></script>
        <script src="{{asset('frontDesign/js/slick.min.js')}}"></script>
        <script src="{{asset('frontDesign/js/ajax-form.js')}}"></script>
        <script src="{{asset('frontDesign/js/wow.min.js')}}"></script>
        <script src="{{asset('frontDesign/js/plugins.js')}}"></script>
        <script src="{{asset('frontDesign/js/main.js')}}"></script>
 @endsection
   