@include("frontend.layouts.head")


<body data-container="body" id="html-body"
    class="bluesky-page-preloader cms-bluesky_armania_carparts cms-index-index page-layout-1column">

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
        @include("frontend.layouts.navbar")
        <main id="maincontent" class="page-main"><a id="contentarea" tabindex="-1"></a>


            <div class="columns">
                <div class="column main"><input name="form_key" type="hidden" value="I1iWILqSDyMvAYeg" />
                    <div id="authenticationPopup" data-bind="scope:'authenticationPopup', style: {display: 'none'}">
                        <!-- ko template: getTemplate() -->
                        <!-- /ko -->
                    </div>

                    <div>
                        <div class="banner carparts section">
                            <div class="row">
                                <div class="col-12 mt-5">

                                    <center>

                                        <h2 class="module-title"><span>Feel Free to reach out to Us</span></h2>

                                        <div style="width:70%; margin:10px auto;" class="card-body">
                                            <p>
                                                Your opinion, Your view, Your suggestions and every other thing you may
                                                wish to relate to us is most welcome.
                                            </p>
                                        </div>
                                    </center>


                                </div>





                                <div class="col-md-10 mx-auto mb-5 pb-5  col-sm-12 ">
                                    <div class="card-header p-5">

                                        <form class="form contact" id="contact-form" method="post">

                                            @if(Session::has("success"))
                                            <div class="alert alert-success">{{Session::get('success')}}</div>
                                            @endif

                                            <div id="saveFormErrors"></div>

                                            @if(Session::has("fail"))
                                            <div class="alert alert-danger">{{Session::get('fail')}}</div>
                                            @endif
                                            @csrf
                                            
                                            
                                                <center>
                                                    <div id="saveFormErrors"></div>
                                                </center>
                                               
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Full Name <span
                                                                    class="required">*</span></label>
                                                            <input class="form-control "
                                                            id="name" name="name" value=""
                                                                placeholder="" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Email Address <span
                                                                    class="required">*</span></label>
                                                            <input class="form-control  " value=""
                                                                placeholder="" id="email" name="email" type="email">
                                                        </div>
                                                        <input id="act" type="hidden" name="act"
                                                    value="{{url('/user_contact_us')}}">

                                                    <input id="actOfThanks" type="hidden" name="actOfThanks"
                                                    value="{{route('contact.thanks')}}">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="control-label">Phone Number <span
                                                                    class="required">*</span></label>
                                                            <input class="form-control "
                                                            name="telephone" id="telephone" value="" placeholder=""
                                                                type="text">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="control-label">Message <span
                                                                    class="required">*</span></label>
                                                                    <textarea name="message" id="message"
                                                            title="What’s on your mind?"
                                                            placeholder="What’s on your mind?"
                                                            class="form-control rounded" cols="5" rows="3"
                                                            style="margin-top: 0px; margin-bottom: 0px; height: 157px;">{{ old('message')}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                                <div class="row">
                                                    <div class="col-sm-12 text-center mt-2 ">

                                                        <button type="button" id="contactUsSubmitBtn"
                                                            class="btn btn-primary border-none custom_btn rounded  text-uppercase">
                                                            Submit
                                                        </button>
                                                        <button
                                                            class="btn btn-primary border-none  rounded  text-uppercase  custom_btn d-none"
                                                            id="contactUsSubmitBtnLoader"><span
                                                                style="font-size:20px;">processing</span> <span
                                                                style="width:18px; height:18px; border-width:2px;"
                                                                class="spinner-border"></span> </button>
                                                    </div>
                                                </div>
                                               
                                            
                                         
                                        </form>
                                    </div>
                                </div>


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
    const accordionTitle = document.querySelectorAll(".accordion-title");



    accordionTitle.forEach((title) => {
        title.addEventListener("click", () => {

            const accordionContent = title.nextElementSibling;


            title.classList.toggle("active");


            if (title.classList.contains("active")) {
                accordionContent.style.maxHeight = accordionContent.scrollHeight + "px";
            } else {
                accordionContent.style.maxHeight = 0;
            }
        });
    });
    </script>


</body>

</html>