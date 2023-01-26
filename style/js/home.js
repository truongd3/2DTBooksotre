var replace = document.getElementById("index");
console.log(replace);
var increase = 4;

function LoadMore() {
  increase = 0;
  let current = parseInt(document.getElementById("index").textContent);
  console.log(current);
  for (let i = current - 3; i <= current; i++) {
    console.log("i: " + i);
    let identity = "book" + i;
    console.log(identity);
    var each = document.getElementById(identity);
    if (each != null) {
      increase++;
      each.style.display = "inline";
    }

    if (i >= 16) {
      let booknew = document.getElementById("booknew" + i);
      booknew.src = "style/images/book/booknew.jpg";
    }
  }
  replace.innerHTML = (current + increase);
}

function a_clicked(number) {
  var check = "popup" + number;
  console.log("button has been clicked: book " + number);
  var popupScreen = document.getElementById(check);
  
  popupScreen.classList.add("activescreen");
}

function close_clicked(number) {
  var check = "popup" + number;
  console.log("close: book " + number);
  var popupScreen = document.getElementById(check);
  
  popupScreen.classList.remove("activescreen");
}
