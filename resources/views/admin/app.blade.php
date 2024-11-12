<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome (for icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        #sidebar {
            width: 250px; /* Set a fixed width for the sidebar */
        }
        .page-content {
            flex: 1; /* Allow the main content to take the remaining space */
            padding: 20px; /* Add some padding */
        }
        .d-flex {
            display: flex;
        }
    </style>
</head>
<body>
    <div class="d-flex align-items-stretch">
        @include('admin.sidebar') <!-- Include the sidebar -->
        
        @include('admin.body') <!-- Include the body content -->
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>