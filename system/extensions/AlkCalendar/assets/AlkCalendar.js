$(document).ready(function() {
    function taskFitToColumn(column, task) {
        var start = task.attr('data-start') * 1;
        var end = task.attr('data-end') * 1;
        var returnValue = true;
        column.forEach(function(value, index, array) {
            var eTask = value;
            var eStart = eTask.attr('data-start') * 1;
            var eEnd = eTask.attr('data-end') * 1;
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
                'width' : width + '%',
                'left' : left + '%',
            });   
            task.children().css({
            'margin' : padding + 'px'
            });
        }
    }
});
