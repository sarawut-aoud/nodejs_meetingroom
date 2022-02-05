document.addEventListener("DOMContentLoaded", function () {
  var calendarEl = document.getElementById("calendar");
  var initialLocaleCode = "th";

  var calendar = new FullCalendar.Calendar(calendarEl, {
    themeSystem: 'bootstrap',
    dayHeaderClassNames:'#C5FFA8',
    expandRows: true,
    slotMinTime: "08:00",
    slotMaxTime: "21:00",
    initialDate: "2022-02-12",
    headerToolbar: {
      left: "prev,next today",
      center: "title",
      right: "dayGridMonth,timeGridDay,listMonth",
    },
    week: {
      dow: 1, // Monday is the first day of the week.
      doy: 4, // The week that contains Jan 4th is the first week of the year.
    },
    buttonText: {
      // prev: 'ก่อนหน้า',
      // next: 'ถัดไป',
      prevYear: "ปีก่อนหน้า",
      nextYear: "ปีถัดไป",
      year: "ปี",
      today: "วันนี้",
      month: "เดือน",
      week: "สัปดาห์",
      day: "วัน",
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
    editable: false,
    selectable: true,
    // businessHours: true,
    dayMaxEvents: true, // allow "more" link when too many events
    events: [
      {
        title: "All Day Event",
        start: "2022-02-01",
        time: "12:00",
      },
      {
        title: "Long Event",
        start: "2022-02-07",
        end: "2020-09-10",
      },
      {
        groupId: 999,
        title: "Repeating Event",
        start: "2022-02-09T16:00:00",
      },
      {
        groupId: 999,
        title: "Repeating Event",
        start: "2020-09-16T16:00:00",
      },
      {
        title: "Conference",
        start: "2020-09-11",
        end: "2020-09-13",
      },
      {
        title: "Meeting",
        start: "2022-02-12T10:30:00",
        end: "2022-02-12T12:30:00",
      },
      {
        title: "Lunch",
        start: "2022-02-12T12:00:00",
      },
      {
        title: "Meeting",
        start: "2020-02-12T14:30:00",
      },
      {
        title: "Happy Hour",
        start: "2020-09-12T17:30:00",
      },
      {
        title: "Dinner",
        start: "2020-09-12T20:00:00",
      },
      {
        title: "Birthday Party",
        start: "2020-09-13T07:00:00",
      },
    ],
  });

  calendar.render();
});
