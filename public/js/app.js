const checkbox = document.getElementById('checkbox');
const checknav = document.getElementById('mainNav');
 const colortext = document.querySelectorAll('.nav-item a');

checkbox.addEventListener('change', ()=>{
    
  document.body.classList.toggle('dark');
  checknav.classList.toggle('maindark');
  checknav.classList.toggle('navbar-b');

  // colortext.classList.toggle('navlinkscroll');
  // console.log(colortext ) ;
  
 
 
// var links = document.querySelector('a.nav-link.js-scroll');
// colortext[i].classList.toggle('navlinkscroll');

for (let i = 0; i < colortext.length; i++) {

  colortext[i].classList.toggle('navlinkscroll');
  console.log(colortext[i]) ;
  
}


});