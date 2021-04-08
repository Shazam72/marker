<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/form.css')}}">
    <title>Login - marker</title>
</head>

<body>
    <div class="inner-page">
        @if(isset($login) && $login==true)
        <section class="login_form d-flex align-items-center justfy-content-center">
            <form class="px-3 pt-2 pb-4 bg-white m-auto d-flex justify-content-center align-items-center flex-column">
                @csrf
                <h2 class="text-center mb-5">Connexion</h2>

                <div class="form-group my-4 position-relative w-100">
                    <input type="text" name="email" id="email" class="h-100 w-100 form-control shadow-none border-0" required autocomplete="off">
                    <div class="underliner"></div>
                    <label for="email" class="fw-bold position-absolute">E-mail</label>
                    <p class="error-msg email fw-bolder text-danger position-absolute" style="font-size: smaller ;bottom:-2rem;"></p>
                </div>
                <div class="form-group my-4 position-relative w-100">
                    <input type="password" name="password" id="password" class="h-100 w-100 form-control shadow-none border-0" required>
                    <i class="fas fa-eye color-dark"></i>
                    <div class="underliner"></div>
                    <p class="error-msg password fw-bolder text-danger position-absolute" style="font-size: smaller ;bottom:-2rem;"></p>
                    <label for="password" class="fw-bold position-absolute">Mot de passe</label>
                </div>
                <div class="form-group my-4 position-relative w-100">
                    <input type="password" name="password_confirmation" id="password_confirmation" class="h-100 w-100 form-control shadow-none border-0" required>
                    <i class="fas fa-eye"></i>
                    <div class="underliner"></div>
                    <p class="error-msg password_confirmation fw-bolder text-danger position-absolute" style="font-size: smaller ;bottom:-2rem;"></p>
                    <label for="password_confirmation" class="fw-bold position-absolute">Confirmation mot de passe</label>
                </div>

                <button type="submit" data-target="{{ route('login_treat') }}" class="my-4 btn btn-primary fw-bolder">Se connecter</button>
            </form>
        </section>
        @endif
    </div>



    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('js/sweetalert.min.js')}}"></script>
    <script src="{{asset('js/form.js')}}"></script>
</body>

</html>