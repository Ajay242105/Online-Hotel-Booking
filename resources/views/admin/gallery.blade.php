<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
    <style>
        .form-container {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .card-body {
            display: flex;
            justify-content: center;
        }
        .bordered-header {
            border: 2px solid #007bff;
            padding: 10px;
            border-radius: 5px;
            background-color: #f8f9fa;
            color: #007bff;
            margin-bottom: 20px;
            text-align: center;
        }
        @media (max-width: 768px) {
            .card img {
                width: 100%;
                height: auto;
            }
        }
        .alert {
            display: none; /* Initially hide the alert */
        }
    </style>
</head>
<body>
    @include('admin.header')
    <div class="container-fluid d-flex">
        @include('admin.sidebar')
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <h2 style="text-align:center; font-size: 40px; font-weight:bolder; color:white;" class="h1 no-margin-bottom">Gallery</h2>
                </div>
                <div class="form-container">
                    <form action="{{ url('upload_image') }}" method="POST" enctype="multipart/form-data" id="uploadForm">
                        @csrf
                        <div class="form-group">
                            <label for="image">Upload Image</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </div>
            </div>

            <div class="container mt-4">
                <div id="successMessage" class="alert alert-success">{{ session('success') }}</div>
                <div id="errorMessage" class="alert alert-danger">{{ session('error') }}</div>

                <h2 class="bordered-header mt-4">Uploaded Images</h2>
                <div class="row">
                    @foreach ($gallery as $image)
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <img style="height: 200px; width: 100%;" src="{{ asset('images/' . $image->image_path) }}" class="card-img-top" alt="Image">
                                <div class="card-body">
                                    <form action="{{ url('delete_image/' . $image->id) }}" method="POST" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @include('admin.footer')

    <script>
        // Show success or error messages if they exist
        window.onload = function() {
            const successMessage = document.getElementById('successMessage');
            const errorMessage = document.getElementById('errorMessage');

            if (successMessage.innerText.trim() !== "") {
                successMessage.style.display = 'block';
                setTimeout(() => {
                    successMessage.style.display = 'none';
                }, 5000);
            }

            if (errorMessage.innerText.trim() !== "") {
                errorMessage.style.display = 'block';
                setTimeout(() => {
                    errorMessage.style.display = 'none';
                }, 5000);
            }
        };

        // Optional: Handle form submissions to show messages
        document.getElementById('uploadForm').addEventListener('submit', function() {
            const successMessage = document.getElementById('successMessage');
            successMessage.innerText = "Image uploaded successfully!";
            successMessage.style.display = 'block';
            setTimeout(() => {
                successMessage.style.display = 'none';
            }, 5000);
        });

        const deleteForms = document.querySelectorAll('.delete-form');
        deleteForms.forEach(form => {
            form.addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent the default form submission
                const successMessage = document.getElementById('successMessage');
                successMessage.innerText = "Image deleted successfully!";
                successMessage.style.display = 'block';
                setTimeout(() => {
                    successMessage.style.display = 'none';
                },  5000);
                this.submit(); // Submit the form after showing the message
            });
        });
    </script>
</body>
</html>