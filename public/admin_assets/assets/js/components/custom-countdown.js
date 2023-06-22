currentYear = new Date().getFullYear()
increaseTwoYears = currentYear + 2;
getFullFormat = `${increaseTwoYears}/10/10`;

$('#cd-simple').countdown(getFullFormat, function(event) {
  var $this = $(this).html(event.strftime(''
    +'<div class="countdown">'+
        '<div class="clock-count-container">'+
            '<h1 class="clock-val">%d</h1>'+
        '</div>'+
        '<h4 class="clock-text"> Days </h4>'+
    '</div>'+
    '<div class="countdown">'+
        '<div class="clock-count-container">'+
            '<h1 class="clock-val">%H</h1>'+
        '</div>'+
        '<h4 class="clock-text"> Hours </h4>'+
    '</div>'+
    '<div class="countdown">'+
        '<div class="clock-count-container">'+
            '<h1 class="clock-val">%M</h1>'+
        '</div>'+
        '<h4 class="clock-text"> Mins </h4>'+
    '</div>'+
    '<div class="countdown">'+
        '<div class="clock-count-container">'+
            '<h1 class="clock-val">%S</h1>'+
        '</div>'+
        '<h4 class="clock-text"> Sec </h4>'+
    '</div>'));
});

$('#cd-circle').countdown(getFullFormat, function(event) {
  var $this = $(this).html(event.strftime(''
    +'<div class="countdown">'+
        '<div class="clock-count-container">'+
            '<h1 class="clock-val">365</h1>'+
        '</div>'+
        '<h4 class="clock-text"> Days </h4>'+
    '</div>'+
    '<div class="countdown">'+
        '<div class="clock-count-container">'+
            '<h1 class="clock-val">%H</h1>'+
        '</div>'+
        '<h4 class="clock-text"> Hours </h4>'+
    '</div>'+
    '<div class="countdown">'+
        '<div class="clock-count-container">'+
            '<h1 class="clock-val">%M</h1>'+
        '</div>'+
        '<h4 class="clock-text"> Mins </h4>'+
    '</div>'+
    '<div class="countdown">'+
        '<div class="clock-count-container">'+
            '<h1 class="clock-val">%S</h1>'+
        '</div>'+
        '<h4 class="clock-text"> Sec </h4>'+
    '</div>'));
});