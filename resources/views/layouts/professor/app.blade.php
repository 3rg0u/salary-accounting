@extends('layouts.master')

@section('body')

    <div id="logo">
        <span class="big-logo">PROFESSOR</span>
    </div>
    <div id="left-menu">
        <ul>
            <li>
                <a href="">
                    <ion-icon name="albums-outline"></ion-icon>
                    <span>Quản lý khoa</span>
                </a>
            </li>
            <li>
                <a href="">
                    <ion-icon name="book-outline"></ion-icon>
                    <span>Quản lý danh mục bằng cấp</span>
                </a>
            </li>
            <li>
                <a href="">
                    <ion-icon name="people-outline"></ion-icon>
                    <span>Quản lý giáo viên</span>
                </a>
            </li>
            <li>
                <a href="">
                    <ion-icon name="stats-chart-outline"></ion-icon>
                    <span>Thống kê giáo viên</span>
                </a>
            </li>
        </ul>
    </div>


    <div class="main-content">
        @yield('content')
    </div>


    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background-color: #f6f7fb;
            color: #888da8;
            letter-spacing: 0.2px;
            font-family: 'Roboto', sans-serif;
            padding: 0;
            margin: 0;
        }

        a,
        p,
        span,
        div,
        li,
        td {
            font-weight: 300 !important;
        }

        a {
            text-decoration: none;
            text-transform: capitalize;
        }

        ::placeholder {
            color: #ccc !important;
            font-weight: 300;
        }

        :-ms-input-placeholder {
            /* Internet Explorer 10-11 */
            color: #ccc !important;
            font-weight: 300;
        }

        ::-ms-input-placeholder {
            /* Microsoft Edge */
            color: #ccc !important;
            font-weight: 300;
        }

        input {
            border-color: #d8e0e5;
            border-radius: 2px !important;
            box-shadow: none !important;
            font-weight: 300 !important;
        }

        .form-control:disabled,
        .form-control[readonly] {
            background-color: #f6f7fb;
        }

        button.btn {
            border-radius: 2px !important;
            box-shadow: none !important;
        }

        button.btn.btn-primary {
            background-color: #0e9aee !important;
        }

        button.btn.btn-primary:hover {
            background-color: #0879c8 !important;
        }

        #left-menu {
            position: fixed;
            top: 0;
            left: 0;
            width: 280px;
            background-color: #313644;
            overflow-y: auto;
            height: 100vh;
            border-right: 1px solid #e6ecf5;
            margin-top: 60px;
            -webkit-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
            overflow-x: hidden;
            z-index: 2;
        }

        #left-menu.small-left-menu,
        #logo.small-left-menu {
            width: 60px;
        }

        #left-menu ul {
            padding: 0;
            margin: 0;
        }

        #left-menu ul li {
            padding: 0 10px;
            display: block;
            position: relative;
        }

        #left-menu>ul>li {
            margin: 15px 0;
        }

        #left-menu ul li a {
            color: #99abb4;
            width: 100%;
            display: inline-block;
            width: 260px;
            height: 37px;
            position: relative;
        }


        #left-menu ul li a i {
            font-size: 22px;
            text-align: center;
            width: 35px;
            height: 35px;
            display: inline-block;
            -webkit-transition: all 0.3s ease;
            -o-transition: all 0.3s ease;
            transition: all 0.3s ease;
        }

        #left-menu ul li:hover a span {
            color: #0e9aee;
        }

        #left-menu ul li:hover a i {
            color: #0e9aee;
        }

        #left-menu ul li a span {
            width: 100%;
            height: 35px;
            padding-left: 10px;
            color: #99abb4;
            font-weight: 300;
            -webkit-transition: all 0.3s ease;
            -o-transition: all 0.3s ease;
            transition: all 0.3s ease;
        }

        #left-menu ul li.active a {
            border-bottom: 2px solid #0e9aee;
        }

        #left-menu ul li.active a span {
            color: #fff;
        }

        #left-menu ul li.active a i {
            background-color: #0e9aee;
            color: #fff;
        }


        #left-menu li.has-sub ul {
            background-color: #454e62;
            margin: 0 -10px;
            padding-left: 45px;
            height: 0;
            overflow: hidden;
            -webkit-transition: all 0.3s ease;
            -o-transition: all 0.3s ease;
            transition: all 0.3s ease;
        }

        #left-menu li ul.open {
            /*    height: 140px;*/
        }

        #left-menu li.has-sub ul>li {
            padding-top: 10px;
        }

        a:hover {
            text-decoration: none;
        }

        #logo {
            position: fixed;
            top: 0;
            z-index: 2;
            left: 0;
            background-color: #464e62;
            border-color: #464e62;
            height: 60px;
            width: 280px;
            font-size: 30px;
            line-height: 2em;
            border-right: 1px solid #e6ecf5;
            z-index: 4;
            color: #fff;
            padding-left: 15px;
            -webkit-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
            overflow: hidden;
        }


        #header {
            background-color: #fff;
            height: 60px;
            border-bottom: 1px solid #e6ecf5;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 3;
        }

        #header .header-left {
            padding-left: 300px;
            -webkit-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }

        #header .header-right {
            padding-right: 40px;
        }

        #header .header-right i,
        #header .header-left i {
            font-size: 30px;
            line-height: 2em;
            padding: 0 5px;
            cursor: pointer;
        }

        #main-content {
            min-height: calc(100vh - 60px);
            clear: both;
        }

        #page-container {
            padding-left: 300px;
            padding-top: 80px;
            padding-right: 25px;
            -webkit-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }

        #page-container.small-left-menu,
        #header .header-left.small-left-menu {
            padding-left: 80px;
        }

        .card {
            border: 1px solid #e6ecf5;
            margin-bottom: 1em;
            font-weight: 300;
        }

        .card .title {
            padding: 15px 20px;
            border-bottom: 1px solid #e6ecf5;
            margin-bottom: 10px;
            color: #000;
            font-size: 18px;
        }

        #show-lable {
            opacity: 0;
            visibility: hidden;
            left: 80px;
            font-weight: 300;
            padding: 6px 15px;
            background-color: #0e9aee;
            position: fixed;
            color: #fff;
            -webkit-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }

        #left-menu.small-left-menu li.has-sub::after {
            content: '';
        }

        #left-menu.small-left-menu li.has-sub ul {
            position: fixed;
            width: 280px;
            z-index: 123;
            height: 0;
            left: 69px;
            padding-left: 15px;
        }

        @media only screen and (max-width: 992px) {

            #left-menu,
            #logo {
                width: 60px;
            }

            #page-container,
            #header .header-left {
                padding-left: 80px;
            }

            #toggle-left-menu,
            .big-logo {
                display: none;
            }

            /*
                                                                                                #logo{
                                                                                                    padding: 0;
                                                                                                    padding-left: 3px;
                                                                                                }
                                                                                                .small-logo{
                                                                                                    display: block;
                                                                                                }
                                                                                            */

        }

        @media only screen and (min-width: 992px) {
            #left-menu li.has-sub::after {
                font-family: "Ionicons";
                content: "\f3d3";
                position: absolute;
                top: 10px;
                right: 10px;
                cursor: pointer;
                transform: rotate(0deg);
                -webkit-transition: all 0.3s ease;
                -o-transition: all 0.3s ease;
                transition: all 0.3s ease;
            }

            #left-menu li.has-sub.rotate:after {
                -webkit-transform: rotate(90deg);
                -ms-transform: rotate(90deg);
                -o-transform: rotate(90deg);
                transform: rotate(90deg);
            }

            .small-logo {
                display: none;
            }

        }
    </style>

    <script>
        $('#toggle-left-menu').click(function () {
            if ($('#left-menu').hasClass('small-left-menu')) {
                $('#left-menu').removeClass('small-left-menu');
            } else {
                $('#left-menu').addClass('small-left-menu');
            }
            $('#logo').toggleClass('small-left-menu');
            $('#page-container').toggleClass('small-left-menu');
            $('#header .header-left').toggleClass('small-left-menu');

            $('#logo .big-logo').toggle('300');
            $('#logo .small-logo').toggle('300');
            $('#logo').toggleClass('p-0 pl-1');
        });

        $(document).on('mouseover', '#left-menu.small-left-menu > ul > li', function () {
            if (!$(this).hasClass('has-sub')) {
                var label = $(this).find('span').text();
                var position = $(this).position();
                $('#show-lable').css({
                    'top': position.top + 79,
                    'left': position.left + 59,
                    'opacity': 1,
                    'visibility': 'visible'
                });

                $('#show-lable').text(label);
            } else {
                var position = $(this).position();
                $(this).find('ul').addClass('open');

                if ($(this).find('ul').hasClass('open')) {
                    const height = 47;
                    var count_submenu_li = $(this).find('ul > li').length;
                    if (position.top >= 580) {
                        var style = {
                            'top': (position.top + 100) - (height * count_submenu_li),
                            'height': height * count_submenu_li + 'px'
                        }
                        $(this).find('ul.open').css(style);
                    } else {
                        var style = {
                            'top': position.top + 79,
                            'height': height * count_submenu_li + 'px'
                        }

                        $(this).find('ul.open').css(style);
                    }

                }
            }

        });

        $(document).on('mouseout', '#left-menu.small-left-menu li a', function (e) {
            $('#show-lable').css({
                'opacity': 0,
                'visibility': 'hidden'
            });
        });

        $(document).on('mouseout', '#left-menu.small-left-menu li.has-sub', function (e) {
            $(this).find('ul').css({
                'height': 0,
            });
        });

        $(window).resize(function () {
            windowResize();
        });

        $(window).on('load', function () {
            windowResize();
        });

        $('#left-menu li.has-sub > a').click(function () {
            var _this = $(this).parent();

            _this.find('ul').toggleClass('open');
            $(this).closest('li').toggleClass('rotate');

            _this.closest('#left-menu').find('.open').not(_this.find('ul')).removeClass('open');
            _this.closest('#left-menu').find('.rotate').not($(this).closest('li')).removeClass('rotate');
            _this.closest('#left-menu').find('ul').css('height', 0);

            if (_this.find('ul').hasClass('open')) {
                const height = 47;
                var count_submenu_li = _this.find('ul > li').length;
                _this.find('ul').css('height', height * count_submenu_li + 'px');
            }
        });


        function windowResize() {
            var width = $(window).width();
            if (width <= 992) {
                $('#left-menu').addClass('small-left-menu');
                $('#logo').addClass('small-left-menu p-0 pl-1');
            } else {
                $('#left-menu').removeClass('small-left-menu');
                $('#logo').removeClass('small-left-menu p-0 pl-1');
            }
        }
    </script>
@endsection