var inputs = document.getElementsByTagName("input");
for (i=0; i<inputs.length; i++){
   inputs[i].onchange = changeHandler;
}
document.getElementsByTagName('select')[0].onchange = function() {
changeHandler();
}
function changeHandler(event) {
    // You can use “this” to refer to the selected element.
     document.forms["req"].submit();
}