let searchBtn=document.querySelector('.searchBtn');
let closeBtn=document.querySelector('.closeBtn');
let searchBox=document.querySelector('.searchBox');
let navigation= document.querySelector('.navigation');
let menuToggle=document.querySelector('.menuToggle');
let header = document.querySelector('header');

searchBtn.onclick=function(){
    searchBox.classList.add('active');
    closeBtn.classList.add('active');
    searchBtn.classList.add('active');
    menuToggle.classList.add('hide');
    header.classList.remove('open');
}

closeBtn.onclick=function(){
    searchBox.classList.remove('active');
    closeBtn.classList.remove('active');
    searchBtn.classList.remove('active');
    menuToggle.classList.remove('hide');

}
menuToggle.onclick=function(){
    header.classList.toggle('open');
    searchBox.classList.remove('active');
    closeBtn.classList.remove('active');
    searchBtn.classList.remove('active');
}

var modal = document.getElementById("modal");

//var openModal = document.getElementById("open-modal");
var closeModal = document.getElementsByClassName("close")[0];

/*openModal.onclick = function() {
  modal.style.display = "block";
}*/

closeModal.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}










  



