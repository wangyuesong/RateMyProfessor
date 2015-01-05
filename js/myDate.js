
//input date
$(function() {
        $( "#inputDate1" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy-mm-dd"
        });
    });
    
$(function() {
        $( "#inputDate2" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy-mm-dd"
        });
    });
    
$(function() {
        $( "#today" ).datepicker({
            minDate: "-0d",
            maxDate: "+0d"
        });
    });