(function ($) {
  var todayDate = new Date();
  todayDate.setHours(0, 0, 0, 0);

  // These are the defaults.
  var defaults = {
    date: null,
    dia: null,
    mes: null,
    ano: null,
    weekDayLength: 1,
    prevButton: "<i class='fas fa-angle-left fs-5 text-primary'></i>",
    nextButton: "<i class='fas fa-angle-right fs-5 text-primary me-3'></i>",
    monthYearSeparator: " ",
    onClickDate: function (date) { },
    onChangeMonth: function (date) { },
    onClickToday: function (date) { },
    onClickMonthNext: function (date) { },
    onClickMonthPrev: function (date) { },
    onClickYearNext: function (date) { },
    onClickYearPrev: function (date) { },
    onShowYearView: function (date) { },
    onSelectYear: function (date) { },
    showThreeMonthsInARow: true,
    enableMonthChange: true,
    enableYearView: true,
    showTodayButton: true,
    highlightSelectedWeekday: true,
    highlightSelectedWeek: true,
    todayButtonContent: "Hoje",
    showYearDropdown: false,
    min: null,
    max: null,
    disable: function (date) { },
    startOnMonday: false,
  };

  var el,
    selectedDate,
    yearView = false;

  var monthMap = {
    1: "janeiro",
    2: "fevereiro",
    3: "março",
    4: "abril",
    5: "maio",
    6: "junho",
    7: "julho",
    8: "agosto",
    9: "setembro",
    10: "outubro",
    11: "novembro",
    12: "dezembro",
  };
  var alternateDayMap = {
    1: "segunda",
    2: "terça",
    3: "quarta",
    4: "quinta",
    5: "sexta",
    6: "sábado",
    7: "domingo",
  };

  function getFirstDayOfMonth(currentDate) {
    var thisDate =
      currentDate.getMonth() + 1 + "/1/" + currentDate.getFullYear();
    return new Date(thisDate);
  }

  function getLastDayOfMonth(currentDate) {
    return new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0);
  }

  function getLastMonthLastDay(currentDate) {
    var month = currentDate.getMonth();
    var year = currentDate.getFullYear();
    if (month === 0) {
      year -= 1;
      month = 12;
    }
    return new Date(year, month, 0);
  }

  function generateWeekData(currentDate, weekNo) {
    var firstDay = getFirstDayOfMonth(currentDate);
    var firstDayDate = firstDay.getDate();
    var lastDay = getLastDayOfMonth(currentDate);
    var lastDayFromLastMonth = getLastMonthLastDay(currentDate).getDate();
    var days = [];

    var daysFromLastMonth = firstDay.getDay();
    if (settings.startOnMonday) {
      daysFromLastMonth = daysFromLastMonth - 1;
    }
    var daysFromNextMonth = 1;


    if (weekNo === 1) {
      var dayFromLastMonth =
        daysFromLastMonth - 1 < 0
          ? 6 + daysFromLastMonth
          : daysFromLastMonth - 1;
      if (dayFromLastMonth < 6) {
        for (daysFromLastMonth; dayFromLastMonth >= 0; dayFromLastMonth--) {
          var dateObj = new Date(
            currentDate.getFullYear(),
            currentDate.getMonth() - 1,
            lastDayFromLastMonth - dayFromLastMonth
          );
          days.push(dateObj);
        }
      }

      var daysLength = 7 - days.length;
      for (var monthDate = 0; monthDate < daysLength; monthDate++) {
        var dateObj = new Date(
          firstDay.getFullYear(),
          firstDay.getMonth(),
          firstDayDate + monthDate
        );
        days.push(dateObj);
      }
    } else {
      var startWeekFrom =
        (weekNo - (daysFromLastMonth < 0 ? 2 : 1)) * 7 - daysFromLastMonth;
      for (var i = 1; i <= 7; i++) {
        if (startWeekFrom + i <= lastDay) {
          var dateObj = new Date(
            currentDate.getFullYear(),
            currentDate.getMonth(),
            startWeekFrom + i
          );
          days.push(dateObj);
        } else {
          var dateObj = new Date(
            currentDate.getFullYear(),
            currentDate.getMonth() + 1,
            daysFromNextMonth++
          );
          days.push(dateObj);
        }
      }
    }
    return days;
  }

  function generateMonthData(currentDate) {
    var lastMonthLast = getLastDayOfMonth(currentDate).getDate();
    var lastDayFromMonth = getLastDayOfMonth(currentDate).getDate();
    var weeks = parseInt(lastMonthLast / 7) + 1;

    var monthData = [];
    for (var weekNo = 1; weekNo <= weeks; weekNo++) {
      monthData.push(generateWeekData(currentDate, weekNo));
    }
    var lastBlock = monthData[monthData.length - 1];
    var lastDayInBlock = lastBlock[lastBlock.length - 1].getDate();

    if (
      lastDayInBlock < lastDayFromMonth &&
      lastDayFromMonth - lastDayInBlock < 7
    ) {
      monthData.push(generateWeekData(currentDate, weekNo));
    }
    return monthData;
  }

  function generateYearHeaderDOM(currentDate) {
    var str =
      "" +
      '<div class="buttons-container border-0 border-bottom border-dark">' +
      '<span class="label-container year-label justify-content-between d-flex">';
    if (settings.showYearDropdown) {
      str += "" + '<select class="year-dropdown text-primary fw-bold fs-5 bg-light">';
      for (var i = currentDate.getFullYear() - 200; i < currentDate.getFullYear() + 200; i++) {
        if (i === currentDate.getFullYear()) {
          str +=
            '<option selected="selected" value="' + i + '">' + i + "</option>";
        } else {
          str += '<option value="' + i + '">' + i + "</option>";
        }
      }
      str += "</select>";
    } else {
      str += currentDate.getFullYear();
    }
    str += "" +
      '<a class="today-button mx-0 me-4 fs-5 text-decoration-none text-decoration-underline text-primary">' +
      settings.todayButtonContent +
      "</a>"
    str += "</span>" +
      (settings.enableMonthChange && settings.enableYearView
        ? '<button class="prev-button">' + settings.prevButton + "</button>"
        : "") +
      (settings.enableMonthChange && settings.enableYearView
        ? '<button class="next-button">' + settings.nextButton + "</button>"
        : "") +
      "</div>";
    return str;
  }

  function generateMonthDOM(currentDate) {
    var str = "";
    str += '<div class="months-wrapper">';

    for (var month in monthMap) {
      if (monthMap.hasOwnProperty(month)) {
        var showThreeMonthsInARow = "";
        showThreeMonthsInARow = settings.showThreeMonthsInARow
          ? " one-third"
          : "";
        str +=
          '<span class="month shadow-card rounded' +
          showThreeMonthsInARow +
          '" data-month="' +
          month +
          '" data-year="' +
          currentDate.getFullYear() +
          '"><span class="text-dark mt-2">' +
          monthMap[month] +
          "</span></span>";
      }
    }

    str += "</div>";
    return str;
  }

  function generateMonthHeaderDOM(currentDate) {
    return (
      "" +
      '<div class="buttons-container border-0 border-bottom border-dark">' +
      '<span class="label-container ms-4 fs-4 text-primary month-container">' +
      '<span class="month-label text-start fw-bold">' +
      monthMap[currentDate.getMonth() + 1] +
      "</span>" +
      settings.monthYearSeparator +
      '<span class="year-label fw-bold">' +
      currentDate.getFullYear() +
      "</span>" +
      "</span>" +
      '<button class="today-button me-4 fs-5 text-decoration-underline text-primary">' +
      settings.todayButtonContent +
      "</button>" +
      (settings.enableMonthChange
        ? '<button class="prev-button">' + settings.prevButton + "</button>"
        : "") +
      (settings.enableMonthChange
        ? '<button class="next-button">' + settings.nextButton + "</button>"
        : "") +
      "</div>"
    );
  }

  function generateWeekHeaderDOM(currentDate) {
    var str = "";
    str += '<div class="weeks-wrapper header border-0 border-bottom border-dark">';
    str +=
      '<div class="week' +
      (settings.startOnMonday ? " start-on-monday" : "") +
      '" data-week-no="' +
      0 +
      '">';

    for (var weekDay in dayMap) {
      if (dayMap.hasOwnProperty(weekDay)) {
        str +=
          '<div class="day header text-dark" data-day="' +
          weekDay +
          '">' +
          dayMap[weekDay].substring(0, settings.weekDayLength) +
          "</div>";
      }
    }

    str += "</div>";
    str += "</div>";
    return str;
  }

  function generateWeekDOM(monthData, currentDate) {
    var str = "";
    str += '<div class="weeks-wrapper">';

    monthData.forEach(function (week, weekNo) {
      str +=
        '<div class="week' +
        (settings.startOnMonday ? " start-on-monday" : "") +
        '" data-week-no="' +
        (weekNo + 1) +
        '">';

      week.forEach(function (day, dayNo) {
        var disabled = false;
        if (day.getMonth() !== currentDate.getMonth()) disabled = true;
        disabled = disabled ? " disabled" : "";

        var selected = false;
        if (selectedDate) {
          if (day == selectedDate.toString()) selected = true;
          selected = selected ? " selected bg-primary rounded" : "";
        } else {
          selected = "";
        }

        var today = false;

        if (day == todayDate.toString()) today = true;
        today = today ? " today" : "";

        var dateDisabled = "";
        if (
          (settings.min && settings.min > day) ||
          (settings.max && settings.max < day) ||
          (settings.disable &&
            typeof settings.disable === "function" &&
            settings.disable(day))
        ) {
          dateDisabled = 'disabled="disabled" ';
        }

        str +=
          '<div class="day' +
          disabled +
          selected +
          today +
          '" data-date="' +
          day +
          '" ' +
          dateDisabled +
          " ><span class='text-dark'>" +
          day.getDate() +
          "</span></div>";
      });

      str += "</div>";
    });
    str += "</div>";
    return str;
  }

  function generateDomString(monthData, currentDate) {
    var calendarDump = "";

    calendarDump += '<div class="calendar-box">';

    if (yearView) {
      calendarDump += '<div class="months-container">';

      calendarDump += generateYearHeaderDOM(currentDate);

      calendarDump += generateMonthDOM(currentDate);

      calendarDump += "</div>";
    } else {
      calendarDump += '<div class="weeks-container">';

      calendarDump += generateMonthHeaderDOM(currentDate);

      calendarDump += generateWeekHeaderDOM(currentDate);

      calendarDump += generateWeekDOM(monthData, currentDate);

      calendarDump += "</div>";
    }

    calendarDump += "</div>";
    
    return calendarDump;
  }

  function highlightDays() {
    var selectedElement = el.find(".selected");

    if (selectedElement.length > 0) {
      var date = new Date(selectedElement.data("date"));
      
      var weekDayNo = date.getDay();

      defaults.dia = date.getDate();
      defaults.mes = date.getMonth()+1;
      defaults.ano = date.getFullYear();


      el.find(".week").each(function (i, elm) {
        $(elm)
          .find(
            ".day:eq(" + (weekDayNo - (settings.startOnMonday ? 1 : 0)) + ")"
          )
          .addClass("highlight");
      });
    }
  }

  function highlightWeek() {
    el.find(".selected").parents(".week").addClass("highlight");
  }

  function renderToDom(currentDate) {
    var monthData = generateMonthData(currentDate);

    el.html(generateDomString(monthData, currentDate));

    if (settings.highlightSelectedWeekday) {
      highlightDays();
    }
    if (settings.highlightSelectedWeek) {
      highlightWeek();
    }
  }

  $.fn.updateCalendarOptions = function (options) {
    var updatedOptions = $.extend(settings, options);
    var calendarInitFn = $.fn.calendar.bind(this);
    calendarInitFn(updatedOptions);
  };

  $.fn.calendar = function (options) {
    settings = $.extend(defaults, options);
    if (settings.startOnMonday) {
      dayMap = alternateDayMap;
    }
    if (settings.min) {
      settings.min = new Date(settings.min);
      settings.min.setHours(0);
      settings.min.setMinutes(0);
      settings.min.setSeconds(0);
    }
    if (settings.max) {
      settings.max = new Date(settings.max);
      settings.max.setHours(0);
      settings.max.setMinutes(0);
      settings.max.setSeconds(0);
    }

    el = $(this);
    var currentDate;

    if (settings.date) {
      if (typeof settings.date === "string") {
        selectedDate = new Date(settings.date);
      } else {
        selectedDate = settings.date;
      }
      selectedDate.setHours(0, 0, 0, 0);
      currentDate = selectedDate;
    } else {
      currentDate = todayDate;
    }

    window.currentDate = currentDate;
    renderToDom(currentDate);

    if (settings.enableMonthChange) {
      el.off("click", ".weeks-container .prev-button").on(
        "click",
        ".weeks-container .prev-button",
        function (e) {
          currentDate = new Date(
            currentDate.getFullYear(),
            currentDate.getMonth() - 1,
            1
          );
          settings.onClickMonthPrev(currentDate);
          renderToDom(currentDate);
        }
      );

      el.off("click", ".weeks-container .next-button").on(
        "click",
        ".weeks-container .next-button",
        function (e) {
          currentDate = new Date(
            currentDate.getFullYear(),
            currentDate.getMonth() + 1,
            1
          );
          settings.onClickMonthNext(currentDate);
          renderToDom(currentDate);
        }
      );
    }

    el.off("click", ".day").on("click", ".day", function (e) {
      var date = $(this).data("date");
      var isDisabled = $(this).attr("disabled") === "disabled";
      if (isDisabled) return;
      settings.onClickDate(date);
    });

    if (settings.enableMonthChange && settings.enableYearView) {
      el.off("click", ".month-container").on(
        "click",
        ".month-container",
        function (e) {
          yearView = true;
          currentDate = new Date(currentDate.getFullYear(), 0, 1);
          settings.onShowYearView(currentDate);
          renderToDom(currentDate);
        }
      );

      el.off("click", ".months-container .month").on(
        "click",
        ".months-container .month",
        function (e) {
          var monthEl = $(this);
          var month = monthEl.data("month");
          var year = monthEl.data("year");
          var selectedMonth = new Date(year, month - 1, 1);
          settings.onChangeMonth(selectedMonth);

          currentDate = selectedMonth;
          yearView = false;

          renderToDom(currentDate);
        }
      );

      el.off("click", ".months-container .prev-button").on(
        "click",
        ".months-container .prev-button",
        function (e) {
          currentDate = new Date(currentDate.getFullYear() - 1, 0, 1);
          settings.onClickYearPrev(currentDate);
          settings.onSelectYear(currentDate);
          renderToDom(currentDate);
        }
      );

      el.off("click", ".months-container .next-button").on(
        "click",
        ".months-container .next-button",
        function (e) {
          currentDate = new Date(currentDate.getFullYear() + 1, 0, 1);
          settings.onClickMonthNext(currentDate);
          settings.onSelectYear(currentDate);
          renderToDom(currentDate);
        }
      );

      el.off("change", ".months-container .year-dropdown").on(
        "change",
        ".months-container .year-dropdown",
        function (e) {
          var year = $(this).val();
          currentDate = new Date(year, 0, 1);
          settings.onSelectYear(currentDate);
          renderToDom(currentDate);
        }
      );
    }

    if (settings.showTodayButton) {
      el.off("click", ".today-button").on(
        "click",
        ".today-button",
        function (e) {
          currentDate = todayDate;
          selectedDate = todayDate;
          settings.onClickToday(todayDate);
          settings.onClickDate(todayDate);
          yearView = false;
          renderToDom(currentDate);
        }
      );
    }

    this.getSelectedDate = function () {
      return selectedDate;
    }

    var diaselec = defaults.dia;
    var messelec = defaults.mes;
    var anoselec = defaults.ano;

    function AjaxCalendar() {
            
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("divajax").innerHTML = this.responseText;

            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
            });
        }
      }
      xmlhttp.open("GET","dist/includes/ajax.inc.php?dia="+diaselec+"&mes="+messelec+"&ano="+anoselec,true);
      xmlhttp.send();
    }

    AjaxCalendar();


    return this;
    
  };
})(jQuery);
