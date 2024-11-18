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
                    <form action="{{ url('upload_image') }}" method="POST" enctype="multipart/form-data">
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
                @if (session('success')) 
                    <div class="alert alert-success">{{ session('success') }}</div> 
                @endif
                @if (session('error')) 
                    <div class="alert alert-danger">{{ session('error') }}</div> 
                @endif

                <h2 class="bordered-header mt-4">Uploaded Images</h2>
                <div class="row">
                    @foreach ($gallery as $image)
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <img style="height: 200px; width: 100%;" src="{{ asset('images/' . $image->image_path) }}" class="card-img-top" alt="Image">
                                <div class="card-body">
                                    <form action="{{ url('delete_image/' . $image->id) }}" method="POST">
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
</body>
</html>