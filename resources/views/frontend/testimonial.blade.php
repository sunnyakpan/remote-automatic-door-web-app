@include("frontend.layouts.head")

<body data-container="body" id="html-body"
    class="bluesky-page-preloader cms-bluesky_armania_carparts cms-index-index page-layout-1column">
    <!-- <div class="cookie-status-message" id="cookie-status">
        The store will not work correctly in the case when cookies are disabled.</div> -->
    <noscript>
        <div class="message global noscript">
            <div class="content">
                <p>
                    <strong>JavaScript seems to be disabled in your browser.</strong>
                    <span>
                        For the best experience on our site, be sure to turn on Javascript in your browser. </span>
                </p>
            </div>
        </div>
    </noscript>
    <div class="page-wrapper">
        @include("frontend.layouts.header")
        <main id="maincontent" class="page-main"><a id="contentarea" tabindex="-1"></a>


            <div class="columns">
                <div class="column main"><input name="form_key" type="hidden" value="I1iWILqSDyMvAYeg" />
                    <div id="authenticationPopup" data-bind="scope:'authenticationPopup', style: {display: 'none'}">
                        <!-- ko template: getTemplate() -->
                        <!-- /ko -->
                    </div>
                    <div class="section slider-on-top">
                        <div class="section full-width slider-wrapper theme-default wrapper-the-blue-sky-slider">
                            <div id="rokanthemes-slidebanner-2">

                                <div class="container-the-blue-sky-slider nivoSlider">

                                    <img class="nivo-main-image" src="{{asset('mainuser/assets/img/tf_banner3.jpg')}}"
                                        style="display: inline-block; height: 226px;">
                                    <div class="nivo-caption" style="display: block;">
                                        <div class="banner-postion-fixed the-blue-sky-banner-text left_center">
                                            <div class="container">

                                                <center>
                                                    <h4 class="animate__animated animate__slideInDown"
                                                        style="color:#FFFFFF;">
                                                        Testimonial</h4>
                                                    <h5 class="animate__animated animate__slideInUp"
                                                        style="font-size:15px; color:#fbb71c; text-transform:capitalize;">
                                                        Home/Testimonial
                                                    </h5>
                                                </center>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>

                    </div>
                    <div>
                        <div class="banner carparts section">
                            <div class="row">
                                <div class="col-12">

                                    <center>

                                        <h2 class="module-title"><span>What our users say about us</span></h2>

                                        <div style="width:70%; margin:10px auto;" class="card-body">
                                            <p>
                                                Below are the different honest reviews of our users.
                                            </p>
                                        </div>
                                    </center>


                                </div>







                                <section id="testimonials">
                                            
                                    <!--testimonials-box-container------>
                                    <div  class="testimonial-box-container col-md-10 col-sm-12 mx-auto">
                                        

                                        @if(count($testimonial)>0)

                                        @foreach($testimonial as $item)
                                       

                                        <div style="width:100%" class="testimonial-box">
                                            <!--top------------------------->
                                            <div class="box-top">
                                                <!--profile----->
                                                <div class="profile">
                                                    <!--img---->
                                                    <div class="profile-img">
                                                        @empty(\App\User::where("id",$item->user_id)->value("photo"))

                                                        <img src="{{Helper::userDefaultImage()}}"
                                                            class="" />
                                                        @else

                                                        <img src="{{asset('uploads/mainuser/profile/'.\App\User::where('id',$item->user_id)->value('photo'))}}"
                                                            class="" />
                                                        @endempty
                                                     
                                                    </div>
                                                    <!--name-and-username-->
                                                    <div class="name-user">
                                                        <strong>{{\App\User::where("id",$item->user_id)->value("name")}}</strong>
                                                        <span>{{\App\User::where("id",$item->user_id)->value("country")}}</span>
                                                    </div>
                                                </div>
                                                <!--reviews------>
                                                <div class="reviews">
                                                {!! \App\Ratings::where("id",$item->rating_id)->value("content")!!}
                                                </div>
                                            </div>
                                            <!--Comments---------------------------------------->
                                            <div class="client-comment">
                                                <p>
                                                {{$item->message}}
                                                </p>
                                            </div>
                                        </div>
                                        @endforeach


                                        @endif
                                       
                                    </div>
                                </section>



                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </main>
        @include("frontend.layouts.footer")


    </div>
    <!-- <script data-cfasync="false" src="{{asset('frontend/js/cloudflare-static/email-decode.min.js')}}"></script> -->

    <!-- <script type="text/javascript" src="{{asset('frontend/js/merged/1f49a1cfe9efcd8d5ab58011ade3dace.min.js')}}"> -->
    </script>

    <script src="{{asset('mainuser/assets/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('mainuser/assets/js/bootstrap.min.js')}}"></script>

    <script src="{{asset('mainuser/assets/js/sweetalert.min.js') }}"></script>
    <script src="{{asset('mainuser/assets/js/vuescript.vue.js')}}"></script>
    <script src="{{asset('mainuser/assets/js/genjs.js')}}"></script>



    <script>
 

    </script>


</body>

</html>