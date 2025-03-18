var x, i, j, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
for (i = 0; i < x.length; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.setAttribute("value", selElmnt.options[selElmnt.selectedIndex].value)
  a.setAttribute("data-price", selElmnt.options[selElmnt.selectedIndex].dataset.price)
  a.setAttribute("data-name", selElmnt.options[selElmnt.selectedIndex].dataset.name)
  // if have multi set
  if(selElmnt.options[selElmnt.selectedIndex].dataset.multi) {
    a.setAttribute("data-multi", selElmnt.options[selElmnt.selectedIndex].dataset.multi)
  }
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 0; j < selElmnt.length; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    // options in select-items
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.setAttribute("value", selElmnt.options[j].value);
    c.setAttribute("data-price", selElmnt.options[j].dataset.price);
    // if have multi set
    if(selElmnt.options[j].dataset.multi) {
      c.setAttribute("data-multi", selElmnt.options[j].dataset.multi);
    }
    c.setAttribute("data-name", selElmnt.options[j].dataset.name);
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var i, s, h;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        h = this.parentNode.previousSibling;
        for (i = 0; i < s.length; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            h.setAttribute("data-price", this.dataset.price)
            h.setAttribute("value", this.getAttribute('value'))
            if(this.dataset.multi) {
              h.setAttribute("data-multi", this.dataset.multi)
            }
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
  });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  for (i = 0; i < y.length; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < x.length; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);

$('.select-items div').click(function() {
  $('.select-items div').removeClass('current-select');
  $(this).addClass('current-select');
});