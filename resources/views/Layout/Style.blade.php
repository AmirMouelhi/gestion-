<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }
        .content {
            flex: 1;
        }
        .custom-lightblue {
            background-color: lightblue;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg custom-lightblue">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('Etudiants.index')}}">Etudiant</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('inscriptions.index')}}">Inscription</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('matieres.index')}}">Matieres</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('notes.index')}}">Notes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('specialites.index')}}">Specialite</a>
                </li>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{route('villes.index')}}">Villes</a>
              </li>
            </ul>
        </div>
    </div>
</nav>

<div class="content container mt-4">
    @yield('content')
</div>

<footer class="custom-lightblue text-center py-3">
    <p class="mb-0">Amir Mouelhi All Rights Reserved.</p>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
