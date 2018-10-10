<<<<<<< HEAD
 document.forms["req"].submit();

var inputs = document.getElementsByTagName("input");
for (i=0; i<inputs.length; i++){
   inputs[i].onchange = changeHandler;
=======
var inputs = document.getElementsByTagName('input');
for (i = 0; i < inputs.length; i++) {
  inputs[i].onchange = changeHandler;
>>>>>>> b54e11780136fe3b02c06e6945bbe97278292c7b
}
document.getElementsByTagName('select')[0].onchange = function() {
  changeHandler();
};
function changeHandler(event) {
  // You can use “this” to refer to the selected element.
  document.forms['req'].submit();
}
