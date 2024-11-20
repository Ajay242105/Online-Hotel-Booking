<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chandrakala Ashram</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Arial', sans-serif;
            color: white;
        }

        .page-content {
            background-image: url('https://example.com/your-background-image.jpg'); /* Replace with your image URL */
            background-size: cover;
            background-position: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }

        .welcome-message {
            background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent background */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
        }

        h1, h2 {
            margin: 0;
        }

        .lead {
            font-size: 1.2rem;
        }

        @media (max-width: 576px) {
            .welcome-message {
                padding: 20px;
            }

            .lead {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>

    <!-- Main Content Area -->
    <div class="page-content">
        <div class="welcome-message">
            <h1 class="display-4">Welcome to Chandrakala Ashram</h1>
            <h2 class="h4">And Guest House</h2>
            <p class="lead mt-3">Experience tranquility and comfort in a serene environment.</p>
            <p>We are delighted to host you and ensure your stay is memorable.</p>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>