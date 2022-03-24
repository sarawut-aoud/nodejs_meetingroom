function viewdetail(id) {
  //    console.log(id);

 // var id = calendar.getEventById(id); // ดึงข้อมูล ผ่าน api
  $.ajax({
      type: "POST",
      url: "http://127.0.0.1:4500/event/calendar",
      dataType: 'json',
      data: {
          cid: id
      },
      success: function(event) {
        for(i in event){
          if(event[i]==cid){
              var  title = event[i].ev_title,
              room= event[i].ro_name,
              style= event[i].st_name,
              start= event[i].ev_startdate,
              end= event[i].ev_enddate,
              starttime= event[i].ev_starttime,
              endtime= event[i].ev_endtime,
              people= event[i].ev_people,
              name= event[i].firstname,
              lastname= event[i].lastname,
              dename= event[i].de_name,
              dephone= event[i].de_phone,
          }
        }
          $("#calendarmodal").modal("show");

          $("#calendarmodal-title").html(title);
          $("#calendarmodal-detail").html(room);
          $("#calendarmodal-style").html(style);
          //$("#calendarmodal-detail").html(event.extendedProps.detail);
          $("#calendarmodal-start").html(start);
          $("#calendarmodal-end").html(end);
          $("#calendarmodal-starttime").html(starttime);
          $("#calendarmodal-endtime").html(endtime);
          $("#calendarmodal-people").html(people);
          $("#calendarmodal-name").html(name);
          $("#calendarmodal-lastname").html(lastname);
          $("#calendarmodal-dename").html(dename);
          $("#calendarmodal-dephone").html(dephone);
      },
  });
}