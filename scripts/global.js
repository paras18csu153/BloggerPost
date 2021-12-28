setInterval(() => {
  $.ajax({
    url: "activity_tracker.php",
    success: function (data) {
      console.log("Timestamp Updated!!");
    },
  });
}, 5000);
