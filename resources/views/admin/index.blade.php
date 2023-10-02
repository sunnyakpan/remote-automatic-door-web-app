<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale()) }}" class="bg-light">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AUTORMATIC DOOR USING HTML CSS AND JAVASCRIPT</title>
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/simple-line-icons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/themify-icons.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/admin.css')}}">

</head>

<body>

    <div class="control_sec">
        <input type="hidden" id="actOfUpdateCommands" value="{{route('update.commands.pt')}}">
        <div class="password_sec">
            <div class="password-input">
                <input type="password" id="commandInput" class="text-view">
                <p id="responseMessage" class="password_error_msg">Enter password</p>
            </div>
            <div class="password_btns">
                <ul>
                    <li onclick="insert(1)">
                        <p>1</p>
                    </li>
                    <li onclick="insert(2)">
                        <p>2</p><span>abc</span>
                    </li>
                    <li onclick="insert(3)">
                        <p>3</p><span>def</span>
                    </li>
                </ul>
                <ul>
                    <li onclick="insert(4)">
                        <p>4</p><span>ghi</span>
                    </li>
                    <li onclick="insert(5)">
                        <p>5</p><span>jkl</span>
                    </li>
                    <li onclick="insert(6)">
                        <p>6</p><span>mno</span>
                    </li>
                </ul>
                <ul>
                    <li onclick="insert(7)">
                        <p>7</p><span>pqrs</span>
                    </li>
                    <li onclick="insert(8)">
                        <p>8</p><span>tuv</span>
                    </li>
                    <li onclick="insert(9)">
                        <p>9</p><span>wxyz</span>
                    </li>
                </ul>
                <ul>
                    <li onclick="back()">
                        <p><i class="ti-close"></i></p>
                    </li>
                    <li onclick="insert(0)">
                        <p>0</p> <span></span>
                    </li>
                    <li onclick="insert('#')">
                        <p>#</p>
                    </li>
                </ul>
                <ul>
                    <li data-oldcommand="" id="sendCommandBtn" class="ok_btn">
                        <p>Ok
                    </li>
                </ul>
            </div>
        </div>
    </div>


    <script type="text/javascript" src="{{asset('frontend/assets/js/jquery-3.3.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/assets/js/sweetalert.min.js')}}"></script>


    <script type="text/javascript">
    const textview = document.querySelector('.text-view');
    const ErroMsg = document.querySelector('.password_error_msg');



    function insert(num) {
        textview.value = textview.value + num;
    }

    function back() {
        var exp = textview.value;
        textview.value = exp.substring(0, exp.length - 1);
    }


    function validatePasword() {
        if (textview.value == null || textview.value == "") {
            ErroMsg.innerText = "enter password"
            return false
        }

        if (textview.value == null || textview.value == "555") {
            ErroMsg.innerText = "Welcome !!"

            pTune.play();
            return false
        }

        if (textview.value == null || textview.value !== "555") {
            ErroMsg.innerText = "Incorrect pin"
            textview.value = ""
            return false
        }
    }

    $(document).ready(function() {
        function denyAccessForAWhile() {
				var input = $("#commandInput");
				var countdown = $("#responseMessage");
				var counter = 30;
			  
				// Disable input initially
				input.prop("disabled", true);
			  
				// Start countdown timer
				var interval = setInterval(function() {
				  countdown.text(counter);
				  counter--;
				  
				  // Enable input and clear interval when counter reaches 0
				  if (counter < 0) {
					clearInterval(interval);
					countdown.text("");
					input.prop("disabled", false);
				  }
				}, 1000);
			}
        $("#sendCommandBtn").on("click", function(e) {
            e.preventDefault();
            var command = $("#commandInput").val();
            command = command.trim();
            var oldcommand = $(this).attr("data-oldcommand");

            if (command == oldcommand) {
                return false;
            } else {
                $(this).attr("data-oldcommand", command);
                var data = {
                    "command": command,

                }


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var actUrl = $("#actOfUpdateCommands").val();



                $.ajax({
                    type: "POST",
                    url: actUrl,
                    data: data,
                    dataType: "json",
                    success: function(response) {

                        $("#commandInput").val('');

                        if (response.status == 400) {


                            swal("Error!", response.error, "warning");

                        } else if (response.status == 200) {
                            var passwordTrialCounter = response.command.num_trial;

                            $("#responseMessage").html();
                                if(passwordTrialCounter >3){
                                    denyAccessForAWhile();

                                }


                        }


                    }
                });
            }

        });
    });
    </script>

</body>

</html>