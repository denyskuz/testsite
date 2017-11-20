jQuery(document).ready(function(){

var modal = document.getElementById('contactus');
var btn = document.getElementById("contactbtn");
btn.onclick = function(e) {
  e.preventDefault();
    modal.style.display = "block";
}
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
});
