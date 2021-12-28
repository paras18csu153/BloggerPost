function login() {
  location.href = "login.php";
}

function redirectToAddPost() {
  location.href = "addPost.php";
}

function cache(id) {
  sessionStorage.setItem("blog_id", id);
}

function clearCache() {
  sessionStorage.clear();
}

function deletePost() {
  var id = sessionStorage.getItem("blog_id");
  sessionStorage.clear();
  location.href = "deletePost.php?id=" + id;
}
