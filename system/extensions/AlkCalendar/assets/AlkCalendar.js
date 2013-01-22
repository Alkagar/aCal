$(document).ready(function() {
    function taskFitToColumn(column, task) {
        var start = task.attr('data-start');
        var end = task.attr('data-end');
        for(i in column) {
            var eTask = column[i];
            var eStart = eTask.attr('data-start');
            var eEnd = eTask.attr('data-end');
            if(start >= eStart && end <= eEnd) {
                return false;
            }
            if(start <= eStart && end >= eEnd) {
                return false;
            }
            if(start <= eStart && end >= eStart && end <= eEnd) {
                return false;
            }
            if(start >= eStart && start <= eEnd && end >= eEnd) {
                return false;
            }
        }
        return true;
    }
    var color = 100;
    var columns = new Array();
    var tasks = [];
    $('.task-box').each(function() {
        var task = $(this);
        var start = task.attr('data-start');
        var end = task.attr('data-end');
        if(columns.length == 0) {
            columns.push([task]);
        } else {
            var putIntoExistingColumns = false;
            for(i in columns) {
                if(taskFitToColumn(columns[i], task)) {
                    columns[i].push(task);
                    putIntoExistingColumns = true;
                    break;
                }
            }
            if(!putIntoExistingColumns) {
                columns.push([task]);
            }
        }
    });

    for(i in columns) {
        for(x in columns[i]) {
            var padding = 0;
            var margin = 0;

            var task = columns[i][x];
            var height = task.attr('data-duration') * 0.0694444;
            var topPosition = task.attr('data-start') * 0.0694444;
            var width = (100 / columns.length) - (margin) - (2 * padding);
            var left = i * width + (margin * i + margin);
            //var c = color % 250;
            task.css({
                //'background-color' : 'rgb(' + c + ', ' + c + ', ' + c + ')',
                'position' : 'absolute',
                'padding' : padding + '%',
                'top' : topPosition + '%',
                'height' : height + '%',
                'width' : width + '%',
                'left' : left + '%',
            });   
            //color += 100;
        }
    }
    $('.task-box').each(function() {
    });
});
