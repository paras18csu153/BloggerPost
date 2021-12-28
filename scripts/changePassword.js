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

function goBackPage() {
  history.back();
}

$(function () {
  $('[data-toggle="tooltip"]').tooltip({ html: true, placement: "right" });
});
