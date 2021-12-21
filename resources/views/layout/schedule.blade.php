<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>MetroAdmin - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>
        .autocomplete-items {
            position: absolute;
            border: 1px solid #d4d4d4;
            border-bottom: none;
            border-top: none;
            z-index: 99;
            /*position the autocomplete items to be the same width as the container:*/
            top: 100%;
            left: 0;
            right: 0;
            max-height: 400px;
            overflow-y: scroll;
            overflow-y: scroll;
        }

        .autocomplete-items div {
            padding: 10px;
            cursor: pointer;
            background-color: #fff;
            border-bottom: 1px solid #d4d4d4;
        }

        .autocomplete-items div:hover {
            background-color: #e9e9e9;
        }

        .autocomplete-active {
            background-color: DodgerBlue !important;
            color: #ffffff;
        }

        .autocomplete-active small {
            color: #f1f1f1 !important;
        }

        .timetable-card {
            min-height: 110px;
            padding: 15px;
            position: relative;
            text-align: left;
            color: white;
            background-color: #5314a1;
        }

        .timetable-card, .timetable-day-title {
            border: 1px solid #EAEAEA;
            margin-bottom: 4px;
        }
    </style>

</head>

<body class="h-100">

<div class="authincation h-100">
    <div class="col-12">
        <div class="nav-header">
            <a href="{!! url('/index'); !!}" class="brand-logo">
                <img class="logo-abbr" src="{{ asset('images/logo.png') }}" alt="">
                <img class="logo-compact" src="{{ asset('images/logo-text.png') }}" alt="">
                <img class="brand-title" src="{{ asset('images/logo-text.png') }}" alt="">
            </a>
        </div>

        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <input id="search_input" type="text" class="form-control ">
                                <div class="input-group-append">
                                    <button id="search" class="btn btn-primary"
                                            {{--                                            style="border-top-right-radius: 50px; border-bottom-right-radius: 50px;"--}}
                                            type="button">Поиск
                                    </button>
                                </div>
                            </div>
                            {{--                            <div class="form-group">--}}
                            {{--                                <input name="schedule" type="text" class="form-control input-rounded" placeholder="input-rounded">--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                </nav>
            </div>
        </div>

    </div>
    <div class="row" id="colqq">

    </div>

</div>
<script src="{{ asset('vendor/global/global.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/deznav-init.js') }}" type="text/javascript"></script>
<script>
    autocomplete(document.getElementById("search_input"), '/api/variants', 'search_input', '');


    function schedule(type, search_obj) {
        $.ajax({
            url: "/api/schedule",
            type: "GET",
            data: {
                schedule: search_obj,
                type: type
            },
            success: function (response) {
                if (response) {
                    $('#colqq').html(response.html);
                    console.log('schedule:', response);
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
    }

    function autocomplete(inp, getLink, newOrderLink = '') {
        let currentFocus;
        inp.addEventListener("input", function (e) {
            let a, b, i, val = this.value, arr = [], parentNode = this.parentNode, thisId = this.id;
            if (!val) {
                return false;
            }
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: getLink,
                type: "GET",
                data: {search_input: val},
                success: function (response) {
                    closeAllLists();
                    arr = response;
                    currentFocus = -1;
                    a = document.createElement("DIV");
                    a.setAttribute("id", thisId + "autocomplete-list");
                    a.setAttribute("class", "autocomplete-items");
                    parentNode.appendChild(a);
                    if (arr.length < 1) {
                        a.innerHTML = '<div><i class="fal fa-comment-slash"></i> не найдено</div>';
                    }
                    for (i = 0; i < arr.length; i++) {
                        let b = document.createElement("DIV");

                        let name = arr[i]['name'] !== undefined ? arr[i]['name'] : arr[i]['number'];
                        let type = arr[i]['number'] !== undefined ? 'КАБИНЕТ: ' : (arr[i]['department_id'] !== undefined ? "ПРЕПОДАВАТЕЛЬ: " : "ГРУППА: ");
                        let search_obj = arr[i];
                        b = document.createElement("DIV");
                        b.innerHTML = type + name;
                        b.addEventListener("click", function (e) {
                            inp.value = name;
                            schedule(type, search_obj);
                            closeAllLists();
                        });
                        a.appendChild(b);

                    }
                },
            });
        });

        inp.addEventListener("keydown", function (e) {
            var x = document.getElementById(this.id + "autocomplete-list");
            if (x) x = x.getElementsByTagName("div");
            if (e.keyCode === 40) {
                currentFocus++;
                addActive(x);
            } else if (e.keyCode === 38) {
                currentFocus--;
                addActive(x);
            } else if (e.keyCode === 13) {
                e.preventDefault();
                if (currentFocus > -1) {
                    if (x) x[currentFocus].click();
                }
            }
        });

        function addActive(x) {
            if (!x) return false;
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);
            x[currentFocus].classList.add("autocomplete-active");
        }

        function removeActive(x) {
            for (var i = 0; i < x.length; i++) {
                x[i].classList.remove("autocomplete-active");
            }
        }

        function closeAllLists(elmnt) {
            var x = document.getElementsByClassName("autocomplete-items");
            for (var i = 0; i < x.length; i++) {
                if (elmnt !== x[i] && elmnt !== inp) {
                    x[i].parentNode.removeChild(x[i]);
                }
            }
        }

        document.addEventListener("click", function (e) {
            closeAllLists(e.target);
        });
    }

</script>
</body>

</html>
