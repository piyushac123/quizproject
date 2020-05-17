document.getElementById('timer').innerHTML =
 05 + ":" + 00;
startTimer();

function startTimer() {
  var presentTime = document.getElementById('timer').innerHTML;
  var timeArray = presentTime.split(/[:]+/);
  var m = timeArray[0];
  var s = checkSecond((timeArray[1] - 1));
  if(s==59){m=m-1}
  if(m==0&&s==0){alert('timer completed');
         window.location.href="https://css-tricks.com/redirect-web-page/"
   }
  
  document.getElementById('timer').innerHTML =
    m + ":" + s;
  setTimeout(startTimer, 1000);
}
function checkSecond(sec) {
  if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
  if (sec < 0) {sec = "59"};
  return sec;
}

function fun1(){
    document.getElementById("demo").innerHTML="Your choice is A";
}

function fun2(){
    document.getElementById("demo").innerHTML="Your choice is B";
}

function fun3(){
    document.getElementById("demo").innerHTML="Your choice is C";
}

function fun4(){
    document.getElementById("demo").innerHTML="Your choice is D";
}