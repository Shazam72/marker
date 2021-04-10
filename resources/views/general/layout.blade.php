<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/fonts/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('css/layout.css')}}">
    <title>@yield('title_page','Layout')</title>
</head>

<body>
    <div class="inner-page position-relative">
        <input type="checkbox" class="d-none" id="checkbox" hidden>
        <div class="voile rounded-circle bg-dark"></div>
        <header class="d-flex align-items-center justify-content-beetween text-white fw-bold fs-2">
            </header>
        <label for="checkbox"><i class="fas fa-bars"></i></label>
        <nav class="inner-sidebar d-flex justify-content-start flex-column align-items-center position-absolute">
        <h3 class="text-center mt-5">Tableau de bord</h3>
            <div class="img_ rounded-circle bg-white my-5">

            </div>
            <label for="checkbox"><i class="fas fa-times"></i></label>
            <div class="sidebar-options">
                <ul class="list-group secondary-list">
                    <li class="list-group-item bg-transparent fw-bold border-0">Gestion des professeurs</li>
                    <li class="list-group-item bg-transparent fw-bold border-0">Gestion des élèves</li>
                    <li class="list-group-item bg-transparent fw-bold border-0">Gestion des classes</li>
                    <li class="list-group-item bg-transparent fw-bold border-0">Gestion des modules d'enseignement</li>
                    <li class="list-group-item bg-transparent fw-bold border-0"></li>
                </ul>
            </div>
        </nav>






    </div>




    <script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{ asset('js/popper.min.js')}}"></script>
    <script src="{{ asset('js/sweetalert.min.js')}}"></script>
    <script src="{{ asset('js/layout.js')}}"></script>
</body>

</html>