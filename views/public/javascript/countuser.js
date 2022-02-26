$(document).ready(function () {
  cache_clear();

  setInterval(function () {
    cache_clear();
  }, 5000);
});
function cache_clear() {
    var id = '<?php echo $_SESSION['mt_id'];?>',
        de_id ='<?php echo $_SESSION['mt_de_id'];?>'
        
  $.ajax({
    type: "get",
    url: "http://127.0.0.1:4500/event/COUNT/staff",
    data:{
        id:id,
        de_id:de_id,
    },
    success: function (result) {
      for (i in result) {
        if (result[i].ev_status > 0) {
          $("#uun1").html(
            '<span class="badge badge-danger">' + result[i].ev_status + "</span>"
          );
        }
      }
    },
  });
  // window.location.reload(); use this if you do not remove cache
}
