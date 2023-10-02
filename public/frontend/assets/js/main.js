

	


		$(document).ready(function(){
		

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

			function validateCommand(command, correct_password, passwordTrialCounter,close_password, updated_at){
			   
				var AlarmSrc = $("#alarm").attr("src");
				var DoorAlarmSrc = $("#door-alarm").attr("src");
				// Web Alarm audio API example
				var audioCtx = new AudioContext();
				var Alarm = new Audio(AlarmSrc);
				var Alarmsource = audioCtx.createMediaElementSource(Alarm);
				Alarmsource.connect(audioCtx.destination);

				var DoorAlarm = new Audio(DoorAlarmSrc);
				var DoorAlarmsource = audioCtx.createMediaElementSource(DoorAlarm);
				DoorAlarmsource.connect(audioCtx.destination);
				
			   if(command == correct_password){
				   $('#txtInput').html("Door opened ("+updated_at+")");
				   $("#dream_env").addClass('success_pass');
				   $("#dream_env").removeClass('wrong_pass');
				   $("#dream_env").removeClass('alerm_wrong_pass');
				   Alarm.pause();
				   DoorAlarm.play();
			   
   
			   }else if(passwordTrialCounter >3){
				   $('#txtInput').html("Access denied, Sorry You Have Tried more than three times ("+updated_at+")");
				   $("#dream_env").removeClass('success_pass');
					$("#dream_env").removeClass('wrong_pass');
					$("#dream_env").addClass('alerm_wrong_pass');
					Alarm.play();
					DoorAlarm.pause();
					
				
			   }else if(command == close_password){
				   $('#txtInput').html("Door closed ("+updated_at+")");
				   $("#dream_env").removeClass('success_pass');
					$("#dream_env").removeClass('wrong_pass');
					$("#dream_env").removeClass('alerm_wrong_pass');
			   
					DoorAlarm.play();
   
			   }else if(command !== close_password && command !== correct_password){
				   $('#txtInput').html("Incorrect pin ("+updated_at+")");
				   $("#dream_env").removeClass('success_pass');
				   $("#dream_env").addClass('wrong_pass');
				   $("#dream_env").removeClass('alerm_wrong_pass');
				   DoorAlarm.pause();
   
			   }else if(command == null || command == ""){
				   $('#txtInput').html("Enter Pin");
				   $("#dream_env").removeClass('success_pass');
				   $("#dream_env").removeClass('wrong_pass');
				   DoorAlarm.pause();
				   
			   }
			   var speechSynthesis = window.speechSynthesis; // get the speech synthesis object
			   var text = $('#txtInput').html();
			   var utterance = new SpeechSynthesisUtterance(text); // create a new utterance object
			   speechSynthesis.speak(utterance); // speak the text
				 
				
			   
			   
   
		 }
   
   
			setInterval(RequestForCommands, 5000);


			function RequestForCommands() {
				var request = "get commands";
				var data = {
                    "request": request,

                }


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var actUrl = $("#actOfGetCommands").val();



                $.ajax({
                    type: "POST",
                    url: actUrl,
                    data: data,
                    dataType: "json",
                    success: function(response) {

                        // $("#commandInput").val('');

                        if (response.status == 400) {


                            // swal("Error!", response.error, "warning");

                        } else {
							var command = response.command.command;
							var old_command = response.command.old_command;
							var correct_password = response.command.password;
							var close_password = response.command.close_password;
							var passwordTrialCounter = response.command.num_trial;
							var updated_at = response.updated_at;
							var txtInput = $("#txtInput").val();
							command = command.trim();
							correct_password = correct_password.trim();
							close_password = close_password.trim();

							
							if(!(command == old_command)){
								
								
								validateCommand(command, correct_password, passwordTrialCounter, close_password, updated_at);


							
							}

                                


                        }


                    }
                });
			}
		});
