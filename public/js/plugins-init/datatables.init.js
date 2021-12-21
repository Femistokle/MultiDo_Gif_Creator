let dataSet = [
    [ "Tiger Nixon", "System Architect", "Edinburgh", "5421", "2011/04/25", "$320,800" ],
    [ "Garrett Winters", "Accountant", "Tokyo", "8422", "2011/07/25", "$170,750" ],
    [ "Ashton Cox", "Junior Technical Author", "San Francisco", "1562", "2009/01/12", "$86,000" ],
    [ "Cedric Kelly", "Senior Javascript Developer", "Edinburgh", "6224", "2012/03/29", "$433,060" ],
    [ "Airi Satou", "Accountant", "Tokyo", "5407", "2008/11/28", "$162,700" ],
    [ "Brielle Williamson", "Integration Specialist", "New York", "4804", "2012/12/02", "$372,000" ],
    [ "Herrod Chandler", "Sales Assistant", "San Francisco", "9608", "2012/08/06", "$137,500" ],
    [ "Rhona Davidson", "Integration Specialist", "Tokyo", "6200", "2010/10/14", "$327,900" ],
    [ "Colleen Hurst", "Javascript Developer", "San Francisco", "2360", "2009/09/15", "$205,500" ],
    [ "Sonya Frost", "Software Engineer", "Edinburgh", "1667", "2008/12/13", "$103,600" ],
    [ "Jena Gaines", "Office Manager", "London", "3814", "2008/12/19", "$90,560" ],
    [ "Quinn Flynn", "Support Lead", "Edinburgh", "9497", "2013/03/03", "$342,000" ],
    [ "Charde Marshall", "Regional Director", "San Francisco", "6741", "2008/10/16", "$470,600" ],
    [ "Haley Kennedy", "Senior Marketing Designer", "London", "3597", "2012/12/18", "$313,500" ],
    [ "Tatyana Fitzpatrick", "Regional Director", "London", "1965", "2010/03/17", "$385,750" ],
    [ "Michael Silva", "Marketing Designer", "London", "1581", "2012/11/27", "$198,500" ],
    [ "Paul Byrd", "Chief Financial Officer (CFO)", "New York", "3059", "2010/06/09", "$725,000" ],
    [ "Gloria Little", "Systems Administrator", "New York", "1721", "2009/04/10", "$237,500" ],
    [ "Bradley Greer", "Software Engineer", "London", "2558", "2012/10/13", "$132,000" ],
    [ "Dai Rios", "Personnel Lead", "Edinburgh", "2290", "2012/09/26", "$217,500" ],
    [ "Jenette Caldwell", "Development Lead", "New York", "1937", "2011/09/03", "$345,000" ],
    [ "Yuri Berry", "Chief Marketing Officer (CMO)", "New York", "6154", "2009/06/25", "$675,000" ],
    [ "Caesar Vance", "Pre-Sales Support", "New York", "8330", "2011/12/12", "$106,450" ],
    [ "Doris Wilder", "Sales Assistant", "Sidney", "3023", "2010/09/20", "$85,600" ],
    [ "Angelica Ramos", "Chief Executive Officer (CEO)", "London", "5797", "2009/10/09", "$1,200,000" ],
    [ "Gavin Joyce", "Developer", "Edinburgh", "8822", "2010/12/22", "$92,575" ],
    [ "Jennifer Chang", "Regional Director", "Singapore", "9239", "2010/11/14", "$357,650" ],
    [ "Brenden Wagner", "Software Engineer", "San Francisco", "1314", "2011/06/07", "$206,850" ],
    [ "Fiona Green", "Chief Operating Officer (COO)", "San Francisco", "2947", "2010/03/11", "$850,000" ],
    [ "Shou Itou", "Regional Marketing", "Tokyo", "8899", "2011/08/14", "$163,000" ],
    [ "Michelle House", "Integration Specialist", "Sidney", "2769", "2011/06/02", "$95,400" ],
    [ "Suki Burks", "Developer", "London", "6832", "2009/10/22", "$114,500" ],
    [ "Prescott Bartlett", "Technical Author", "London", "3606", "2011/05/07", "$145,000" ],
    [ "Gavin Cortez", "Team Leader", "San Francisco", "2860", "2008/10/26", "$235,500" ],
    [ "Martena Mccray", "Post-Sales support", "Edinburgh", "8240", "2011/03/09", "$324,050" ],
    [ "Unity Butler", "Marketing Designer", "San Francisco", "5384", "2009/12/09", "$85,675" ]
];




(function($) {
    "use strict"
    //example 1
    var table = $('#example').DataTable({
        createdRow: function ( row, data, index ) {
           $(row).addClass('selected')
        }
    });

    table.on('click', 'tbody tr', function() {
    var $row = table.row(this).nodes().to$();
    var hasClass = $row.hasClass('selected');
    if (hasClass) {
        $row.removeClass('selected')
    } else {
        $row.addClass('selected')
    }
    })

    table.rows().every(function() {
    this.nodes().to$().removeClass('selected')
    });



    //example 2
    var table2 = $('#example2').DataTable( {
        createdRow: function ( row, data, index ) {
            $(row).addClass('selected')
        },
        "scrollY":        "42vh",
        "scrollCollapse": true,
        "paging":         true,
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false,
        "language": {
            "processing": "Подождите...",
            "search": "Поиск:",
            "lengthMenu": "Показать _MENU_ записей",
            "info": "Записи с _START_ до _END_ из _TOTAL_ записей",
            "infoEmpty": "Записи с 0 до 0 из 0 записей",
            "infoFiltered": "(отфильтровано из _MAX_ записей)",
            "loadingRecords": "Загрузка записей...",
            "zeroRecords": "Записи отсутствуют.",
            "emptyTable": "В таблице отсутствуют данные",
            "paginate": {
                "first": "Первая",
                "previous": "Предыдущая",
                "next": "Следующая",
                "last": "Последняя"
            },
            "aria": {
                "sortAscending": ": активировать для сортировки столбца по возрастанию",
                "sortDescending": ": активировать для сортировки столбца по убыванию"
            },
            "select": {
                "rows": {
                    "_": "Выбрано записей: %d",
                    "1": "Выбрана одна запись"
                },
                "cells": {
                    "1": "1 ячейка выбрана",
                    "_": "Выбрано %d ячеек"
                },
                "columns": {
                    "1": "1 столбец выбран",
                    "_": "%d столбцов выбрано"
                }
            },
            "searchBuilder": {
                "conditions": {
                    "string": {
                        "startsWith": "Начинается с",
                        "contains": "Содержит",
                        "empty": "Пусто",
                        "endsWith": "Заканчивается на",
                        "equals": "Равно",
                        "not": "Не",
                        "notEmpty": "Не пусто"
                    },
                    "date": {
                        "after": "После",
                        "before": "До",
                        "between": "Между",
                        "empty": "Пусто",
                        "equals": "Равно",
                        "not": "Не",
                        "notBetween": "Не между",
                        "notEmpty": "Не пусто"
                    },
                    "number": {
                        "empty": "Пусто",
                        "equals": "Равно",
                        "gt": "Больше чем",
                        "gte": "Больше, чем равно",
                        "lt": "Меньше чем",
                        "lte": "Меньше, чем равно",
                        "not": "Не",
                        "notEmpty": "Не пусто",
                        "between": "Между",
                        "notBetween": "Не между ними"
                    },
                    "array": {
                        "equals": "Равно",
                        "empty": "Пусто",
                        "contains": "Содержит",
                        "not": "Не равно",
                        "notEmpty": "Не пусто",
                        "without": "Без"
                    }
                },
                "data": "Данные",
                "deleteTitle": "Удалить условие фильтрации",
                "logicAnd": "И",
                "logicOr": "Или",
                "title": {
                    "0": "Конструктор поиска",
                    "_": "Конструктор поиска (%d)"
                },
                "value": "Значение",
                "add": "Добавить условие",
                "button": {
                    "0": "Конструктор поиска",
                    "_": "Конструктор поиска (%d)"
                },
                "clearAll": "Очистить всё",
                "condition": "Условие",
                "leftTitle": "Превосходные критерии",
                "rightTitle": "Критерии отступа"
            },
            "searchPanes": {
                "clearMessage": "Очистить всё",
                "collapse": {
                    "0": "Панели поиска",
                    "_": "Панели поиска (%d)"
                },
                "count": "{total}",
                "countFiltered": "{shown} ({total})",
                "emptyPanes": "Нет панелей поиска",
                "loadMessage": "Загрузка панелей поиска",
                "title": "Фильтры активны - %d"
            },
            "thousands": ",",
            "buttons": {
                "pageLength": {
                    "_": "Показать 10 строк",
                    "-1": "Показать все ряды"
                },
                "pdf": "PDF",
                "print": "Печать",
                "collection": "Коллекция <span class=\"ui-button-icon-primary ui-icon ui-icon-triangle-1-s\"><\/span>",
                "colvis": "Видимость столбцов",
                "colvisRestore": "Восстановить видимость",
                "copy": "Копировать",
                "copyKeys": "Нажмите ctrl or u2318 + C, чтобы скопировать данные таблицы в буфер обмена.  Для отмены, щелкните по сообщению или нажмите escape.",
                "copySuccess": {
                    "1": "Скопирована 1 ряд в буфер обмена",
                    "_": "Скопировано %ds рядов в буфер обмена"
                },
                "copyTitle": "Скопировать в буфер обмена",
                "csv": "CSV",
                "excel": "Excel"
            },
            "decimal": ".",
            "infoThousands": ",",
            "autoFill": {
                "cancel": "Отменить",
                "fill": "Заполнить все ячейки <i>%d<i><\/i><\/i>",
                "fillHorizontal": "Заполнить ячейки по горизонтали",
                "fillVertical": "Заполнить ячейки по вертикали"
            },
            "datetime": {
                "previous": "Предыдущий",
                "next": "Следующий",
                "hours": "Часы",
                "minutes": "Минуты",
                "seconds": "Секунды",
                "unknown": "Неизвестный",
                "amPm": [
                    "AM",
                    "PM"
                ],
                "months": {
                    "0": "Январь",
                    "1": "Февраль",
                    "10": "Ноябрь",
                    "11": "Декабрь",
                    "2": "Март",
                    "3": "Апрель",
                    "4": "Май",
                    "5": "Июнь",
                    "6": "Июль",
                    "7": "Август",
                    "8": "Сентябрь",
                    "9": "Октябрь"
                },
                "weekdays": [
                    "Вс",
                    "Пн",
                    "Вт",
                    "Ср",
                    "Чт",
                    "Пт",
                    "Сб"
                ]
            },
            "editor": {
                "close": "Закрыть",
                "create": {
                    "button": "Новый",
                    "title": "Создать новую запись",
                    "submit": "Создать"
                },
                "edit": {
                    "button": "Изменить",
                    "title": "Изменить запись",
                    "submit": "Изменить"
                },
                "remove": {
                    "button": "Удалить",
                    "title": "Удалить",
                    "submit": "Удалить",
                    "confirm": {
                        "_": "Вы точно хотите удалить %d строк?",
                        "1": "Вы точно хотите удалить 1 строку?"
                    }
                },
                "multi": {
                    "restore": "Отменить изменения",
                    "title": "Несколько значений",
                    "noMulti": "Это поле должно редактироватся отдельно, а не как часть групы"
                },
                "error": {
                    "system": "Возникла системная ошибка (<a target=\"\\\" rel=\"nofollow\" href=\"\\\">Подробнее<\/a>)"
                }
            },
            "searchPlaceholder": "Поиск..."
        },
    });
    $('a[data-toggle="tab"]').on( 'shown.bs.tab', function (e) {
        $.fn.dataTable.tables( {visible: true, api: true} ).columns.adjust();
    } );
    var table3 = $('#example3').DataTable( {
        createdRow: function ( row, data, index ) {
            $(row).addClass('selected')
        },
        "scrollY":        "42vh",
        "scrollCollapse": true,
        "paging":         true,
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false,
        "language": {
            "processing": "Подождите...",
            "search": "Поиск:",
            "lengthMenu": "Показать _MENU_ записей",
            "info": "Записи с _START_ до _END_ из _TOTAL_ записей",
            "infoEmpty": "Записи с 0 до 0 из 0 записей",
            "infoFiltered": "(отфильтровано из _MAX_ записей)",
            "loadingRecords": "Загрузка записей...",
            "zeroRecords": "Записи отсутствуют.",
            "emptyTable": "В таблице отсутствуют данные",
            "paginate": {
                "first": "Первая",
                "previous": "Предыдущая",
                "next": "Следующая",
                "last": "Последняя"
            },
            "aria": {
                "sortAscending": ": активировать для сортировки столбца по возрастанию",
                "sortDescending": ": активировать для сортировки столбца по убыванию"
            },
            "select": {
                "rows": {
                    "_": "Выбрано записей: %d",
                    "1": "Выбрана одна запись"
                },
                "cells": {
                    "1": "1 ячейка выбрана",
                    "_": "Выбрано %d ячеек"
                },
                "columns": {
                    "1": "1 столбец выбран",
                    "_": "%d столбцов выбрано"
                }
            },
            "searchBuilder": {
                "conditions": {
                    "string": {
                        "startsWith": "Начинается с",
                        "contains": "Содержит",
                        "empty": "Пусто",
                        "endsWith": "Заканчивается на",
                        "equals": "Равно",
                        "not": "Не",
                        "notEmpty": "Не пусто"
                    },
                    "date": {
                        "after": "После",
                        "before": "До",
                        "between": "Между",
                        "empty": "Пусто",
                        "equals": "Равно",
                        "not": "Не",
                        "notBetween": "Не между",
                        "notEmpty": "Не пусто"
                    },
                    "number": {
                        "empty": "Пусто",
                        "equals": "Равно",
                        "gt": "Больше чем",
                        "gte": "Больше, чем равно",
                        "lt": "Меньше чем",
                        "lte": "Меньше, чем равно",
                        "not": "Не",
                        "notEmpty": "Не пусто",
                        "between": "Между",
                        "notBetween": "Не между ними"
                    },
                    "array": {
                        "equals": "Равно",
                        "empty": "Пусто",
                        "contains": "Содержит",
                        "not": "Не равно",
                        "notEmpty": "Не пусто",
                        "without": "Без"
                    }
                },
                "data": "Данные",
                "deleteTitle": "Удалить условие фильтрации",
                "logicAnd": "И",
                "logicOr": "Или",
                "title": {
                    "0": "Конструктор поиска",
                    "_": "Конструктор поиска (%d)"
                },
                "value": "Значение",
                "add": "Добавить условие",
                "button": {
                    "0": "Конструктор поиска",
                    "_": "Конструктор поиска (%d)"
                },
                "clearAll": "Очистить всё",
                "condition": "Условие",
                "leftTitle": "Превосходные критерии",
                "rightTitle": "Критерии отступа"
            },
            "searchPanes": {
                "clearMessage": "Очистить всё",
                "collapse": {
                    "0": "Панели поиска",
                    "_": "Панели поиска (%d)"
                },
                "count": "{total}",
                "countFiltered": "{shown} ({total})",
                "emptyPanes": "Нет панелей поиска",
                "loadMessage": "Загрузка панелей поиска",
                "title": "Фильтры активны - %d"
            },
            "thousands": ",",
            "buttons": {
                "pageLength": {
                    "_": "Показать 10 строк",
                    "-1": "Показать все ряды"
                },
                "pdf": "PDF",
                "print": "Печать",
                "collection": "Коллекция <span class=\"ui-button-icon-primary ui-icon ui-icon-triangle-1-s\"><\/span>",
                "colvis": "Видимость столбцов",
                "colvisRestore": "Восстановить видимость",
                "copy": "Копировать",
                "copyKeys": "Нажмите ctrl or u2318 + C, чтобы скопировать данные таблицы в буфер обмена.  Для отмены, щелкните по сообщению или нажмите escape.",
                "copySuccess": {
                    "1": "Скопирована 1 ряд в буфер обмена",
                    "_": "Скопировано %ds рядов в буфер обмена"
                },
                "copyTitle": "Скопировать в буфер обмена",
                "csv": "CSV",
                "excel": "Excel"
            },
            "decimal": ".",
            "infoThousands": ",",
            "autoFill": {
                "cancel": "Отменить",
                "fill": "Заполнить все ячейки <i>%d<i><\/i><\/i>",
                "fillHorizontal": "Заполнить ячейки по горизонтали",
                "fillVertical": "Заполнить ячейки по вертикали"
            },
            "datetime": {
                "previous": "Предыдущий",
                "next": "Следующий",
                "hours": "Часы",
                "minutes": "Минуты",
                "seconds": "Секунды",
                "unknown": "Неизвестный",
                "amPm": [
                    "AM",
                    "PM"
                ],
                "months": {
                    "0": "Январь",
                    "1": "Февраль",
                    "10": "Ноябрь",
                    "11": "Декабрь",
                    "2": "Март",
                    "3": "Апрель",
                    "4": "Май",
                    "5": "Июнь",
                    "6": "Июль",
                    "7": "Август",
                    "8": "Сентябрь",
                    "9": "Октябрь"
                },
                "weekdays": [
                    "Вс",
                    "Пн",
                    "Вт",
                    "Ср",
                    "Чт",
                    "Пт",
                    "Сб"
                ]
            },
            "editor": {
                "close": "Закрыть",
                "create": {
                    "button": "Новый",
                    "title": "Создать новую запись",
                    "submit": "Создать"
                },
                "edit": {
                    "button": "Изменить",
                    "title": "Изменить запись",
                    "submit": "Изменить"
                },
                "remove": {
                    "button": "Удалить",
                    "title": "Удалить",
                    "submit": "Удалить",
                    "confirm": {
                        "_": "Вы точно хотите удалить %d строк?",
                        "1": "Вы точно хотите удалить 1 строку?"
                    }
                },
                "multi": {
                    "restore": "Отменить изменения",
                    "title": "Несколько значений",
                    "noMulti": "Это поле должно редактироватся отдельно, а не как часть групы"
                },
                "error": {
                    "system": "Возникла системная ошибка (<a target=\"\\\" rel=\"nofollow\" href=\"\\\">Подробнее<\/a>)"
                }
            },
            "searchPlaceholder": "Поиск..."
        },
    });

    table2.on('click', 'tbody tr', function() {
        var $row = table2.row(this).nodes().to$();
        var hasClass = $row.hasClass('selected');
        if (hasClass) {
            $row.removeClass('selected')
        } else {
            $row.addClass('selected')
        }
    })

    table2.rows().every(function() {
        this.nodes().to$().removeClass('selected')
    });

	//
	var table = $('#example3, #example4, #example5').DataTable();
	$('#example tbody').on('click', 'tr', function () {
		var data = table.row( this ).data();
	});

})(jQuery);
