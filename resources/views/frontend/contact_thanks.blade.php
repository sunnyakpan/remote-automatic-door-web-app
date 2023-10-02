@include("frontend.layouts.head")

<style>
    @import url('https://fonts.googleapis.com/css?family=Raleway:400,600,900');

*{
  box-sizing:border-box;
 /* outline:1px solid ;*/
}
body{
    background: #150744 ;
    background: -moz-linear-gradient(-45deg, #150744  0%, #537895 100%);
    background: -webkit-linear-gradient(-45deg, #150744  0%, #537895 100%);
    background: linear-gradient(135deg, #150744  0%, #537895 100%);
        height: 100%;
        margin: 0;
        background-repeat: no-repeat;
        background-attachment: fixed;
  
}
a {
  color: #fff;
  text-decoration: none;
  transition: all 0.30s linear 0s;
}

.wrapper-1{
  width:100%;
  height:100vh;
  display: flex;
flex-direction: column;
}
.wrapper-2{
  padding: 30px;
  text-align:center;
}
h1{
  font-family: 'Raleway', Arial Black, Sans-Serif;
  font-size:4em;
  font-weight: 900;
  letter-spacing:3px;
  color: #fafafa;
  margin:0;
  margin-top: 40px;
  margin-bottom:40px;
}
.wrapper-2 p{
  margin:0;
  font-size:1.3em;
  color:#fafafa;
  font-family: 'Raleway', sans-serif;
  letter-spacing:1px;
  line-height: 1.5;
}
.go-home{
  border: 3px solid #e83890 !important;
  background: #150744 !important;
  border:none;
  padding: 15px 30px;
  margin: 30px 0;
  border-radius: 5px;
  cursor: pointer;
}
.go-home:hover{
  opacity: 0.9;
}
.go-home a{
  font-family: 'Raleway', Arial Black;
  font-size: 1rem;
  font-weight: 700!important;
  text-transform: uppercase;
  letter-spacing: 2px;
  
}
.footer-like{
  margin-top: auto; 
  background: rgb(31,38,130);
 
  padding:6px;
  text-align:center;
}
.footer-like p{
  margin:0;
  padding:4px;
  color:#fafafa;
  font-family: 'Raleway', sans-serif;
  letter-spacing:1px;
}
.footer-like p a{
  text-decoration:none;
  color:#5892FF;
  font-weight: 600;
}

.footer-like p a:hover{
  color:#FFF;
 }

@media (min-width:360px){
  h1{
    font-size:4.5em;
  }
  .go-home{
    margin-bottom:20px;
  }
}

@media (min-width:600px){
  .thankyoucontent{
  max-width:1000px;
  margin:0 auto;
}
  .wrapper-1{
  height: initial;
  max-width:620px;
  margin:0 auto;
  margin-top:50px;
  }
  
  
}
</style>


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


        <div class=thankyoucontent>
 <div class="wrapper-1">
    <div class="wrapper-2">
       <img src="https://i.ibb.co/Lkn7rkG/thank-you-envelope.png" alt="thank-you-envelope" border="0">
     <h1>Thank you!</h1>
      <p>for contacting us, we will reply as</p> 
      <p>soon possible. </p>
      
      <button class="go-home"><a href="{{url('home')}}">
       go to home page</a>
      </button>
    </div>
   
    <div class="footer-like">
      <p>
      </p>
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



    


</body>

</html>