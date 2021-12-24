function checkForm() {
  var blogTitle = document.getElementById("blogTitle").value;
  var tags = document.getElementById("tags").value;
  var description = document.getElementById("description").value;
  var blog = document.getElementById("blog").value;

  if (blogTitle == "" && tags == "" && description == "" && blog == "") {
    $("#exampleModalCenter").modal("hide");
    location.href = "index.php";
  }
}
