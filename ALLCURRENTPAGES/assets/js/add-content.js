// JavaScript Document

var today = new Date();
var hourNow = today.getHours();
var greeting;
var el;

if (hourNow > 18) 
{
	greeting = 'Good evening!';
}
else if (hourNow > 12) 
{
	greeting = 'Good afternoon!';
}  
else if (hourNow > 0) {
	greeting = 'Good morning!';
}  
else {
	greeting = 'welcome!';	
}

el = document.getElementById('output');
el.innerHTML='<h2>' + greeting + '<h2>';


// Function to handle header collapse on scroll
function handleScroll() {
  var header = document.querySelector('.header');
  if (window.scrollY > 10) { // Adjust this value as needed
    header.classList.add('collapsed');
  } else {
    header.classList.remove('collapsed');
  }
}

window.addEventListener('scroll', handleScroll);