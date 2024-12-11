@extends('header')

<head>
    <script src="{{ asset('js/all_actions.js') }}"></script>
</head>

<body id="body-pd">
    <header class="header" id="header">

        <div style="row">
            <img style="float:left;" src="{{ URL('images/NHSO-Logo.jpg') }}" width="100px" height="80px" alt="">
            <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        </div>


        <div>
            <select class="title-select" name="title_option" id="title_option" onchange="location = this.value;">
                <option selected >Profile</option>
                {{-- <option value="{{ route('login') }}">Log out</option> --}}
            </select>
        </div>

    </header>


    <div class="l-navbar" id="nav-bar">

        <nav class="nav">
            <div class="nav_list" id="main_menu_id">

                <a id="Report1" title="Report1" href="{{ route('EvaluationSummaryReport') }}"
                    class="nav_link 
                        {{ Request::is('EvaluationSummaryReport') ? 'active' : '' }}">
                    <iconify-icon icon="pajamas:monitor" width="18" height="18"></iconify-icon>
                    <span class="nav_name">Evaluation Summary</span>
                </a>

                <a id="Report3" title="Report2" href="{{ route('DailyEndCallRecommendToService') }}"
                    class="nav_link {{ Request::is('DailyEndCallRecommendToService') ? 'active' : '' }}">
                    <iconify-icon icon="mingcute:user-setting-line" width="20" height="20"></iconify-icon>
                    <span class="nav_name">Report2</span>
                </a>

                <a id="Report3" title="Report3" href="{{ route('DailyEndCallRecommendToService') }}"
                    class="nav_link {{ Request::is('DailyEndCallRecommendToService') ? 'active' : '' }}">
                    <iconify-icon icon="iconoir:stats-report" width="20" height="20"></iconify-icon>
                    <span class="nav_name">Report3</span>
                </a>

                <a id="Report4" title="Report4" href="{{ route('DailyEndCallRecommendToService') }}"
                    class="nav_link {{ Request::is('DailyEndCallRecommendToService') ? 'active' : '' }}">
                    <iconify-icon icon="carbon:id-management" width="20" height="20"></iconify-icon>
                    <span class="nav_name">Report4</span>
                </a>

            </div>

        </nav>

    </div>

    <div class="container-fluid">
        @yield('endbody')
    </div>

    @if (session('employeeName') && session('employeeSurname'))
        <script>
            document.getElementById("title_option")[0].innerHTML = @json(session('employeeName')) + " " +
                @json(session('employeeSurname'));
        </script>
    @endif

    <script>
        document.addEventListener("DOMContentLoaded", function(event) {

            const showNavbar = (toggleId, navId, bodyId, headerId) => {
                const toggle = document.getElementById(toggleId),
                    nav = document.getElementById(navId),
                    bodypd = document.getElementById(bodyId),
                    headerpd = document.getElementById(headerId);

                if (toggle && nav && bodypd && headerpd) {
                    toggle.addEventListener('click', () => {
                        nav.classList.toggle('show');
                        toggle.classList.toggle('bx-x');
                        bodypd.classList.toggle('body-pd');
                        headerpd.classList.toggle('body-pd');
                        let showingNav = nav.classList.contains("show");
                        sessionStorage.setItem('showingNav', showingNav);

                        showOrHideNav(showingNav);
                    })

                }
            }

            showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

            let currentWhowNav = sessionStorage.getItem("showingNav");
            if (currentWhowNav == 'true') {
                const toggle = document.getElementById('header-toggle'),
                    nav = document.getElementById('nav-bar'),
                    bodypd = document.getElementById('body-pd'),
                    headerpd = document.getElementById('header');

                if (toggle && nav && bodypd && headerpd) {
                    nav.classList.toggle('show');
                    toggle.classList.toggle('bx-x');
                    bodypd.classList.toggle('body-pd');
                    headerpd.classList.toggle('body-pd');
                }
            }
            showOrHideNav(currentWhowNav);

        });

        function showOrHideNav(currentWhowNav) {
            var bodyInside = document.getElementById('body-inside');

            if (currentWhowNav == 'true' || currentWhowNav == true) {
                bodyInside.classList.add('body-inside-add');
            } else {
                bodyInside.classList.remove('body-inside-add');

            }

        }
    </script>

</body>
