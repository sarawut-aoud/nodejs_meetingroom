document.addEventListener("DOMContentLoaded", function () {
  var calendarEl = document.getElementById("calendar");
  var initialLocaleCode = "th";
  var calendar = new FullCalendar.Calendar(calendarEl, {
    themeSystem: "bootstrap",
     dayHeaderClassNames: "#C5FFA8",
    // expandRows: true,
    slotMinTime: "08:00",
    slotMaxTime: "21:00",
   
    headerToolbar: {
      left: "prev,next today",
      center: "title",
      right: "dayGridMonth,timeGridDay,listMonth",
    },
    // week: {
    //   dow: 1, // Monday is the first day of the week.
    //   doy: 4, // The week that contains Jan 4th is the first week of the year.
    // },
    buttonText: {
      prev: "ก่อนหน้า",
      next: "ถัดไป",
      prevYear: "ปีก่อนหน้า",
      nextYear: "ปีถัดไป",
      year: "ปี",
      today: "วันนี้",
      month: "เดือน",
      week: "สัปดาห์",
      day: "วันนี้",
      list: "กำหนดการ",
    },

    weekText: "สัปดาห์",
    allDayText: "ตลอดวัน",
    moreLinkText: "เพิ่มเติม",
    noEventsText: "ไม่มีกิจกรรมที่จะแสดง",
    locale: initialLocaleCode,
    buttonIcons: true, // show the prev/next text
    // weekNumbers: true,
    // navLinks: true, // can click day/week names to navigate views
    // editable: true,
    // selectable: true,
    // businessHours: true,
     dayMaxEvents: true, // allow "more" link when too many events
    firstDay: 0, // กำหนดวันแรกในปฏิทินเป็นวันอาทิตย์ 0 เป็นวันจันทร์ 1
    displayEventTime: true,
    // displayEventEnd: true,
    eventTimeFormat: {
      // รูปแบบการแสดงของเวลา เช่น '14:30'
      hour: "2-digit",
      minute: "2-digit",
      meridiem: false,
    },
    events: {
      // เรียกใช้งาน event จาก json ไฟล์ ที่สร้างด้วย php
      // url: "../event01.php?gData=1",
      url:"http://127.0.0.1:4500/event/list",
      error: function () {},
    },
  });

  calendar.render();
});
