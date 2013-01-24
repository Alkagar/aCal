$(document).ready(function() {
    $.fn.hasOverflow = function() {
        $(this).css({ overflow: "auto", display: "table" });
        var h1 = $(this).outerHeight();

        $(this).css({ overflow: "hidden", display: "block" });
        var h2 = $(this).outerHeight();

        return (h1 > h2) ? true : false;
    };
    function taskFitToColumn(column, task) {
        var factor = 0.0694444;
        var start = task.attr('data-start') * factor;
        var end = task.attr('data-end') * factor;
        var returnValue = true;
        column.forEach(function(value, index, array) {
            var eTask = value;
            var eStart = eTask.attr('data-start') * factor;
            var eEnd = eTask.attr('data-end') * factor;
            if(start >= eStart && end <= eEnd) {
                returnValue = returnValue && false;
            }
            if(start <= eStart && end >= eEnd) {
                returnValue = returnValue && false;
            }
            if(start <= eStart && end >= eStart && end <= eEnd) {
                returnValue = returnValue && false;
            }
            if(start >= eStart && start <= eEnd && end >= eEnd) {
                returnValue = returnValue && false;
            }
        });
        return returnValue;
    }
    var color = 100;
    var columns = [];
    var tasks = [];
    console.log($('.task-box').length);
    var counter = 1;
    $('.task-box').each(function() {
        console.log('## counter: ', counter++);
        console.log(columns);
        var task = $(this);
        var start = task.attr('data-start');
        var end = task.attr('data-end');
        if(columns.length == 0) {
            var column = [];
            column.push(task);
            columns.push(column);
        } else {
            var used = false;
            columns.forEach(function(value, index, array) {
                if(taskFitToColumn(value, task)) {
                    console.log('d');
                    value.push(task);
                    used = true;
                }
            });
            if(!used) {
                var column = [];
                column.push(task);
                columns.push(column);
            }
        }
    });

    for(i in columns) {
        for(x in columns[i]) {
            var margin = 1;
            var padding = 2;

            var task = columns[i][x];
            var height = task.attr('data-duration') * 0.0694444;
            var topPosition = task.attr('data-start') * 0.0694444;
            var width = (100 / columns.length) - (2 * margin);
            var left = i * width + margin + (i * margin * 2);
            task.css({
                'position' : 'absolute',
                'top' : topPosition + '%',
                'height' : height + '%',
                'min-height': '2em',
                'width' : width + '%',
                'left' : left + '%',
            });   
            if(task.hasOverflow()) {
                task.find('.task-description').remove();
            }
            task.children().css({
                'margin-left' : padding + 'px',
                'margin-right' : padding + 'px'
            });
        }
    }
});
