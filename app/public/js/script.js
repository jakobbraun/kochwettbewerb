
function validate (elem) {
  var valid = true;
  for(var i = 0; i < elem.children.length; i++){
    var c = elem.children[i];
    if (c.validity && !c.validity.valid){
      c.classList.add("highlight");
      c.classList.add("marked");
      window.setTimeout(function(c){
        c.classList.remove("highlight");
      }, 100, c);
      valid = false;
    }
  }
  return valid;
}
