class FlatpickrDemo {
    init() {
        document.getElementById("basic-datepicker").flatpickr(), document.getElementById("datetime-datepicker").flatpickr({
            enableTime: !0,
            dateFormat: "Y-m-d H:i"
        }), document.getElementById("humanfd-datepicker").flatpickr({
            altInput: !0,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d"
        }), document.getElementById("minmax-datepicker").flatpickr({
            minDate: "2020-01",
            maxDate: "2020-03"
        }), document.getElementById("disable-datepicker").flatpickr({
            onReady: function () {
                this.jumpToDate("2025-01")
            },
            disable: ["2025-01-10", "2025-01-21", "2025-01-30", new Date(2025, 4, 9)],
            dateFormat: "Y-m-d"
        }), document.getElementById("multiple-datepicker").flatpickr({
            mode: "multiple",
            dateFormat: "Y-m-d"
        }), document.getElementById("conjunction-datepicker").flatpickr({
            mode: "multiple",
            dateFormat: "Y-m-d",
            conjunction: " :: "
        }), document.getElementById("range-datepicker").flatpickr({
            mode: "range"
        }), document.getElementById("inline-datepicker").flatpickr({
            inline: !0
        }), document.getElementById("basic-timepicker").flatpickr({
            enableTime: !0,
            noCalendar: !0,
            dateFormat: "H:i"
        }), document.getElementById("24hours-timepicker").flatpickr({
            enableTime: !0,
            noCalendar: !0,
            dateFormat: "H:i",
            time_24hr: !0
        }), document.getElementById("minmax-timepicker").flatpickr({
            enableTime: !0,
            noCalendar: !0,
            dateFormat: "H:i",
            minDate: "16:00",
            maxDate: "22:30"
        }), document.getElementById("preloading-timepicker").flatpickr({
            enableTime: !0,
            noCalendar: !0,
            dateFormat: "H:i",
            defaultDate: "01:45"
        })
    }
}
document.addEventListener("DOMContentLoaded", function (e) {
    (new FlatpickrDemo).init()
});
