<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <title>Accueil - Marker</title>
</head>

<body>
    <div class="inner-page">
        <header class="d-flex justify-content-between align-items-center p-3 text-white">
            <h3 class="fw-bolder">Marker</h3>
            <a href="{{ route('login')}}" class="btn btn-primary bg-white text-dark fw-bolder border-0">Se connecter</a>
        </header>
        <section class="d-flex justify-content-center align-items-center">
            <p class="text-white fw-bolder text-center">
                <span>Marker</span>, <br> un outil puissant pour une gestion efficace des notes
            </p>
        </section>
    </div>
</body>

</html>