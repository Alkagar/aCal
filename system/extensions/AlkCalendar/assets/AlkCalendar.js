$(document).ready(function() {
    var color = 100;
    $('.task-box').each(function() {
        var height = $(this).attr('data-duration') * 0.0694444;
        var topPosition = $(this).attr('data-start') * 0.0694444;
        var width = 100 / $(this).attr('data-columns');
        var margin = $(this).attr('data-tab') * width;
        var c = color % 250;
        $(this).css({
            'background-color' : 'rgb(' + c + ', ' + c + ', ' + c + ')',
            'position' : 'absolute',
            'top' : topPosition + '%',
            'height' : height + '%',
            'width' : width + '%',
            'left' : margin + '%'
        });   
        color += 100;
    });
});
