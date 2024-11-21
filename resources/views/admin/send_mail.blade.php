<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    @include('admin.css')
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #070707; /* Keep the same background color */
            color: #333;
        }
        .form-container {
            display: flex;
            justify-content: center;
            margin: 20px auto; /* Center the container */
            padding: 20px;
            background-color: rgb(7, 7, 7); /* Keep the same background color */
            border-radius: 5px; /* Slightly less rounded */
            box-shadow: none; /* Remove shadow for simplicity */
            max-width: 500px; /* Set a maximum width for the form */
            width: 100%; /* Allow it to be responsive */
        }
        .form-container form {
            width: 100%; /* Make form take full width of container */
        }
        .form-container label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }
        .form-container input[type="text"],
        .form-container input[type="number"],
        .form-container textarea {
            width: 100%; /* Make inputs take full width */
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc; /* Simpler border */
            border-radius: 3px; /* Slightly less rounded */
            transition: border-color 0.2s; /* Shorter transition */
        }
        
        .form-container button {
            padding: 10px 15px;
            background-color: #007bff; /* Keep the same button color */
            color: white;
            border: none;
            border-radius: 3px; /* Slightly less rounded */
            cursor: pointer;
            font-size: 16px;
            width: 100%; /* Make button take full width */
        }
        .form-container button:hover {
            background-color: #0056b3; /* Keep the same hover effect */
        }
        .alert {
            display: none; /* Initially hide the alert */
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #28a745;
            background-color: #d4edda;
            color: #155724;
            border-radius: 5px;
        }
        .page-header {
            display: flex;
            justify-content: center; /* Center the heading */
            margin-bottom: 20px; /* Add margin below the heading */
        }
        @media (max-width: 768px) {
            .card img {
                width: fit-content%;
                height: auto;
            }
        }
    </style>
</head>
<body>
    @include('admin.header')
    <div class="container-fluid d-flex">
        @include('admin.sidebar')
        <div class="page-content">
            <div class="page-header">
                <h1 style="font-size: 30px; font-weight:bold;">
                    Send Mail to {{ $mail ? $mail->name : 'Unknown' }}
                </h1>
            </div>
            <div class="form-container">
                <form action="{{ url('mail',$mail->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(session('success'))
                        <div class="alert alert-success" id="success-message">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div>
                        <label>Greeting</label>
                        <input type="text" name="greeting" required />
                    </div>
                    <div>
                        <label>Mail Body</label>
                        <textarea name="body" required></textarea>
                    </div>
                    <div>
                        <label>Action Text</label>
                        <input type="text" name="action_text" required />
                    </div>
                    <div>
                        <label>Action Url</label>
                        <input type="text" name="action_url" required />
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Send Mail</button>
                    </div>
                </form>
            </div>
            @include('admin.footer')
        
            <script>
                const successMessage = document.getElementById('success-message');
                if (successMessage) {
                    successMessage.style.display = 'block'; // Show the alert
                    setTimeout(() => {
                        successMessage.style.display = 'none';
                    }, 4000);
                }
            </script>
        </body>
</html>