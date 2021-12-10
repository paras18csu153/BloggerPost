function showPassword(password, hidePasswordImg, showPasswordImg) {
  var inputField = document.getElementById(password);
  var showIcon = document.getElementById(hidePasswordImg);
  var hideIcon = document.getElementById(showPasswordImg);
  if (inputField.type == "password") {
    inputField.type = "text";
    hideIcon.style.display = "none";
    showIcon.style.display = "inline-block";
  } else {
    inputField.type = "password";
    hideIcon.style.display = "inline-block";
    showIcon.style.display = "none";
  }
}

var loadFile = function (event) {
  var dummy = document.getElementById("dummy");
  var imgInp = document.getElementById("upload-photo");
  const [file] = imgInp.files;
  if (file && file.size < 200000) {
    dummy.src = URL.createObjectURL(file);
  }
};

function validate(input) {
  let value = input.value;
  let numbers = value.replace(/[^0-9]/g, "");
  input.value = numbers;
}

if (window.history.replaceState) {
  window.history.replaceState(null, null, window.location.href);
}
