
!function($) {
    "use strict";

    var CalendarApp = function() {
        this.$body = $("body")
        this.$modal = $('#event-modal'),
        this.$event = ('#external-events div.external-event'),
        this.$calendar = $('#calendar'),
        this.$saveCategoryBtn = $('.save-category'),
        this.$categoryForm = $('#add-category form'),
        this.$extEvents = $('#external-events'),
        this.$calendarObj = null
    };


    /* on drop */

    /* on click on event */



    /* Initializing */
    CalendarApp.prototype.init = function() {


        var $this = this;
        $this.$calendarObj = $this.$calendar.fullCalendar({
   
            handleWindowResize: false,   
            height: $(window).height() -250,   

            // drop: function(date) { $this.onDrop($(this), date); },
            // select: function (start, end, allDay) { $this.onSelect(start, end, allDay); },
            // eventClick: function(calEvent, jsEvent, view) { $this.onEventClick(calEvent, jsEvent, view); }

        });

        //on new event

    },

   //init CalendarApp
    $.CalendarApp = new CalendarApp, $.CalendarApp.Constructor = CalendarApp
    
}(window.jQuery),

//initializing CalendarApp
function($) {
    "use strict";
    $.CalendarApp.init()
}(window.jQuery);
