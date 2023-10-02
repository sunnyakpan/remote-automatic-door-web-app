<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale()) }}" class="bg-light">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>AUTORMATIC DOOR USING HTML CSS AND JAVASCRIPT</title>
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/style.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/simple-line-icons.css')}}">
   
   <style>
       .d-none{
           display:none !important;
       }
   </style>
</head>
<body>
<input type="hidden" id="actOfGetCommands" value="{{route('get.commands.pt')}}">
	    <div id="dream_env" class="dream-env ">
         <img src="{{asset('frontend/assets/img/light.png')}}" class="light light-1">
         <img src="{{asset('frontend/assets/img/light.png')}}" class="light light-2">
         <div class="wall_shadow"></div>
           <div class="shadow">
        <div class="shadow-main">
        <div class="shadow-content shadow-shadow">
            <span class="left-light"></span>
            <span class="right-light"></span>
            <span class="top-light"></span>
        </div>
        </div>

           <div class="top-floor-body">
	        <div class="top-floor-body-main">    
	            <div class="top-floor-body-content top-top"></div>
	        </div>
    </div>

    <div class="env-sideWall-1"></div>

    <div class="door_sec">
         <div class="door_main">
                <div class="margic-door_main">
                  <div class="margic-door_main-front">
                     <img src="{{asset('frontend/assets/img/door-handle.png')}}">
                  </div>
                  <div class="margic-door_main-inner">
                     <h1>
                     <span>w</span>
                     <span>e</span>
                     <span>l</span>
                     <span>c</span>
                     <span>o</span>
                     <span>m</span>
                     <span>e</span>
                  </h1>
                  </div>
                </div>
        </div><!--door_main-->
        <span class="lock_icon">
           <i class="icon-lock"></i>
        </span>
    </div>


    </div><!--dream-env-->

       <div class="commant_txt">
           <p id="txtInput">Enter Command Code</p>
       </div>

    <div class="command_input">
      <select name="" id="voiceList" style="display: none;"></select>
         <input type="hidden" id="passwordTrialCounter" value="0">
         <div class="d-none">
            <input type="text" name="" id="main-input" value="door is opened">
            <button id="btnSpeak">Send command</button>
         </div>

    </div>

    <audio src="{{asset('frontend/assets/sound/alarm.mp3')}}" loop   autoplay="true" id="alarm"></audio>
    <audio src="{{asset('frontend/assets/sound/welcome_2.mpeg')}}"    autoplay="true" id="welcomeSound"></audio>

    <audio src="{{asset('frontend/assets/sound/door-open.mp3')}}"   autoplay="true" id="door-alarm"></audio>


    <script type="text/javascript" src="{{asset('frontend/assets/js/jquery-3.3.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/assets/js/sweetalert.min.js')}}"></script>
    
    <script src="{{asset('frontend/assets/js/main.js')}}"></script>

    <script>
        function TriggerWelcomeSound(){
                
				if ($("#welcomeSound")[0].paused) {
					// If the audio is paused, play it
					$("#welcomeSound")[0].play();
				  } else {
					// If the audio is playing, pause it
					$("#welcomeSound")[0].pause();
				  }
        }
        swal({
                title: "Notice",
                text: "You must Use the remote to control this door",
                icon: "success",
                // buttons: true,
                successMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    TriggerWelcomeSound();
                }else{
                    TriggerWelcomeSound();

                } 
            });
    </script>

</body>
</html>