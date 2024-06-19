<!DOCTYPE html>
<html>
<head>
    <title>Profil Orang</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .profile-container {
            margin-top: 50px;
        }
        .profile-card {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .profile-header {
            font-size: 24px;
            font-weight: bold;
        }
        .profile-description {
            font-size: 18px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container profile-container">
        <div class="profile-card text-center">
            <div class="profile-header">{{ $name }}</div>
            <div class="profile-description">{{ $ciri }}</div>
        </div>
    </div>
</body>
</html>
