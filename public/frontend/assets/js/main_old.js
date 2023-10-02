var voiceList = document.querySelector('#voiceList');
var txtInput = document.querySelector('#txtInput');
var btnSpeak = document.querySelector('#btnSpeak');

var MainInput = document.querySelector('#main-input');

const Alarm = document.querySelector('#alarm');

const DoorAlarm = document.querySelector('#door-alarm');

 function validatePasword(passwordTrialCounter){
    if(MainInput.value == "555"){
        txtInput.innerHTML = "Door opened (10:47 AM - 16 may 2023)";
        document.querySelector('.dream-env').classList.add('success_pass');
        document.querySelector('.dream-env').classList.remove('wrong_pass');
        document.querySelector('.dream-env').classList.remove('alerm_wrong_pass');
        Alarm.pause();
        DoorAlarm.play();
        $("#passwordTrialCounter").val(0);

    }else if(passwordTrialCounter >3){
        txtInput.innerHTML = "Access denied";
        document.querySelector('.dream-env').classList.remove('success_pass');
         document.querySelector('.dream-env').classList.remove('wrong_pass');
         document.querySelector('.dream-env').classList.add('alerm_wrong_pass');
         Alarm.play();
         DoorAlarm.pause();
        return false;
    }
      
     if(MainInput.value == null || MainInput.value == ""){
         txtInput.innerHTML = "Enter Pin";
         document.querySelector('.dream-env').classList.remove('success_pass');
         document.querySelector('.dream-env').classList.remove('wrong_pass');
         DoorAlarm.pause();
         return false;
     }
    
    if(MainInput.value == "000"){
        txtInput.innerHTML = "Door closed (10:47 AM - 16 may 2023)";
        document.querySelector('.dream-env').classList.remove('success_pass');
         document.querySelector('.dream-env').classList.remove('wrong_pass');
         document.querySelector('.dream-env').classList.remove('alerm_wrong_pass');
         $("#passwordTrialCounter").val(0);
         DoorAlarm.play();

    }if(MainInput.value !== "000" && MainInput.value !== "555"){
        txtInput.innerHTML = "Incorrect pin (10:47 AM - 16 may 2023)";
        document.querySelector('.dream-env').classList.remove('success_pass');
        document.querySelector('.dream-env').classList.add('wrong_pass');
        document.querySelector('.dream-env').classList.remove('alerm_wrong_pass');
        DoorAlarm.pause();

    }

}




var tts = window.speechSynthesis;
var voices = [];

GetVoices();

if (speechSynthesis !== undefined) {
    speechSynthesis.onvoiceschanged = GetVoices;
}








function GetVoices(){
    voices = tts.getVoices();
    voiceList.innerHTML = '';
    voices.forEach((voice)=>{
        var listItem = document.createElement('option');
        listItem.textContent =  voice.name;
        listItem.setAttribute('data-lang', voice.lang);
        listItem.setAttribute('data-name', voice.name);
        voiceList.appendChild(listItem);
    });

    voiceList.selectedIndex = 0;

}

$(document).ready(function(){
    $("#btnSpeak").click(function(){
        var passwordTrialCounter = $("#passwordTrialCounter").val();
        var mainInput = $("#main-input").val();
        passwordTrialCounter = Number(passwordTrialCounter);
        if(!mainInput==''){
            $("#passwordTrialCounter").val(passwordTrialCounter+1);

        }

        var passwordTrialCounter = $("#passwordTrialCounter").val();
        
        validatePasword(passwordTrialCounter);


    var toSpeak = new SpeechSynthesisUtterance(txtInput.innerHTML);
    var selectedVoiceName = voiceList.selectedOptions[0].getAttribute('data-name');
    voices.forEach((voice)=>{
        if(voice.name ===selectedVoiceName){
            toSpeak.voice = voice;
        }
    });
    tts.speak(toSpeak);
    });
});
