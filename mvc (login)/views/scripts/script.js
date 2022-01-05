function showPassword(){
    var inputField = document.getElementById("password");
    var showIcon = document.getElementById("showPasswordImg");
    var hideIcon = document.getElementById("hidePasswordImg");
  if (inputField.type === "password") {
    inputField.type = "text";
    showIcon.style.display="none";
    hideIcon.style.display="inline-block";
  } else {
    inputField.type = "password";
    showIcon.style.display="inline-block";
    hideIcon.style.display="none";
  }
}