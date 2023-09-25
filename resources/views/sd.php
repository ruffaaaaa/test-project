<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link href="/css/app.css" rel="stylesheet">
        @vite('resources/js/app.js')
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="border-bottom: 2px solid #087830;">
            <a class="navbar-brand" href="#">
                <img src="/images/lsu-logo 2.png" alt="Logo" height="50" style="margin-left: 20px;">
                <span style="color: #087830; font-weight: bold;">LA SALLE UNIVERSITY</span>
            </a>

            <button class="navbar-toggler" style="margin-right: 10px" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-right: 20px;">
                            <span style="color: #087830; font-weight: bold;">ABOUT</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Company</a>
                            <a class="dropdown-item" href="#">Team</a>
                            <a class="dropdown-item" href="#">Mission</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="background-desktop">
            <div class="background-desktop-content" style="margin-top: 250px;">
                <a class="btn btn-primary btn-lg" href="#" role="button" id="reservation-btn" style="width: 196px; height: 45px; background-color: #087830; color: white; font-weight: bold; outline: none;">RESERVATION</a>
                <br>
                <a class="btn btn-secondary btn-lg" href="#" role="button" id="check-status-btn" style="width: 196px; height: 45px; margin-top: 10px; background-color: white; color: #087830;  font-weight: bold;">CHECK STATUS</a>
            </div>
        </div>

        <footer style="border-top: 40px solid #087830; display: flex; justify-content: center; align-items: center;">
            <img src="/images/polygon.png" style="margin-top: -20px;" >
        </footer>



        
        

        <script src="{{ mix('js/index.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    </body>
</html>