<!-- resources/views/kodam/show.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Kodam Detail</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Pengertian {{ $name }}</h1>
        <div id="chat-response" class="mt-3">
            <h3>Lagi nanya ChatGPT:</h3>
            <p id="response">Sabar ya brow...</p>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            const message = "What is the meaning of {{ $name }}?";
            $.ajax({
                url: '/chat',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    message: message
                },
                success: function(response) {
                    $('#response').text(response.response);
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    console.error('Status:', status);
                    console.dir(xhr);
                    $('#response').text('Failed to load response.');
                }
            });
        });
    </script>
</body>
</html>
