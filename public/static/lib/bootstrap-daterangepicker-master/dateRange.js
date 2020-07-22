function dateRange(obj, isSingle, isAutoUpdate, startDate, opens, callback,minDate,maxDate) {
    $("#" + obj).daterangepicker({
        "singleDatePicker": isSingle,
        "showDropdowns": true,
        "startDate": startDate || moment(),
        "endDate": moment(),
        "minDate": minDate || "2019-01-01",
        "maxDate": maxDate || "2040-01-01",
        "opens": opens || "left",
        "autoUpdateInput": isAutoUpdate,
        "locale": { //中文汉化
            format: "YYYY-MM-DD",
            separator: " - ",
            applyLabel: '确定',
            cancelLabel: '取消',
            fromLabel: '起始时间',
            toLabel: '结束时间',
            customRangeLabel: '自定义',
            daysOfWeek: ['日', '一', '二', '三', '四', '五', '六'],
            monthNames: ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月'],
            firstDay: 1,
        },
        "ranges": { //快捷选择时间
            // '最近1小时': [moment().subtract('hours', 1), moment()],
            '今日': [moment(), moment()],
            '昨日': [moment().subtract('days', 1).startOf('day'), moment().subtract('days', 1).endOf('day')],
            '最近7日': [moment().subtract('days', 6), moment()],
            '最近30日': [moment().subtract('days', 29), moment()]
        },
    }, function (start, end, label) {
        // console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') +
        //     ' (predefined range: ' + label + ')');
        //console.log(start.format('YYYY-MM-DD') + ' 到 ' + end.format('YYYY-MM-DD'));
        var starttime = start.format('YYYY-MM-DD');
        var endtime = end.format('YYYY-MM-DD');
        callback && callback(starttime, endtime);
    });
}