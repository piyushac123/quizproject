

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

// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

// Questions in sections
