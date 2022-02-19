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
