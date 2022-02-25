$(document).ready(function () {
  $.ajax({
    type: "get",
    dataType: "json",
    url: "http://127.0.0.1:4500" + "/event/count",
    success: function (result) {
      var bage = 0;
      for (ii in result) {
     if(result[ii].bage >0){
         bage++;
     }
      }
      $("#bage").html(bage);
    },
  });
});
//todo: staff
//  cache_clear();

//  setInterval(function() {
//   cache_clear()
// }, 5000);
// });
// function cache_clear() {

//  $.ajax({
//   type:"POST",
//   url:"events03.php",
//   success:function(result){
// // alert(result.ev_status);.
// //<span class="badge badge-danger"></span>
// if (result.ev_status > 0) {
//   $("#uun").html('<span class="badge badge-danger">'+result.ev_status+'</span>');
// }

// }

// })
//todo : user
// $(document).ready(function() {
//   cache_clear();

//   setInterval(function() {
//    cache_clear()
//  }, 5000);
// });
//  function cache_clear() {

//   $.ajax({
//    type:"POST",
//    url:"events04.php",
//    success:function(result){
//      // alert(result.ev_status);.
//      //<span class="badge badge-danger"></span>
//      if (result.ev_status > 0) {
//        $("#uun1").html('<span class="badge badge-danger">'+result.ev_status+'</span>');
//      }

//    }

//  })
// // window.location.reload(); use this if you do not remove cache
// }
