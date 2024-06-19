<!DOCTYPE html>
<html>
<head>
    <title>Kodam Checker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
</head>
<body style="background-color: #ffffff; color: #272727">
    <div class="container">
        <p class="text-center mb-3">Just for Fun. Follow IG <a href="https://www.instagram.com/padligr/">@padligr</a> / Tiktok <a href="https://www.tiktok.com/@fadligr">@fadligr</a> </p>
        <h1 class="text-center">Cek Khodam Online</h1>
        @if (session('status'))
            <div class="alert alert-success text-center">
                {{ session('status') }}
            </div>
        @endif
        <audio id="successAudio" src="{{ asset('storage/audio/success-sound.mp3') }}"></audio>
        <div class="row d-flex justify-content-center">
            <div class="col-sm-12">
                <form action="/check-kodam" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                        <div id="passwordHelpBlock" class="form-text">
                            Ayo cek kodam dan tunjukan keganasanmu!!!
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn d-flex px-4 bg-danger rounded-3 text-white">Kodam Saya</button>
                    </div>
                </form>
            </div>
        </div>
    
        <h2 class="mt-3 text-center">Para Pendekar Kodam!!!</h2>
        <ul class="list-group list-group-flush text-center">
            @foreach ($kodams as $kodam)
            <li class="list-group-item">
                <strong>{{ $kodam->name }}</strong> mendapatkan 
                <a href="/profile/{{ $kodam->name }}" target="_blank">
                    <strong>{{ $kodam->kodam }}</strong>
                </a>
            </li>
        @endforeach
        </ul>
    </div>

    <script>
        $(document).ready(function() {
            // Cek apakah ada elemen alert sukses
            if ($('.alert-success').length > 0) {
                // Jika ada, mainkan audio
                document.getElementById('successAudio').play();
            }
        });
    </script>
</body>
</html>
