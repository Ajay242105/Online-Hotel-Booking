<!DOCTYPE html>
<html>

<head>
    <base href="/public">
    @include('admin.css')
    <style type="text/css">
        body {
            background-color: #f8f9fa; /* Light background color for contrast */
        }

        .page-content {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }

        form {
            background-color: #312f2f;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 400px;
            color: rgb(10, 10, 10); /* Text color for better visibility on dark background */
        }

        label {
            display: inline-block;
            width: 150px;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        select,
        input[type="file"] {
            width: calc(100% - 160px); /* Adjust width to fit the form */
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 16px;
            color: #0a0a0a;
        }

        textarea {
            resize: none;
            height: 100px;
        }

        .btn {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    @include('admin.header')
    <div class="d-flex">
        @include('admin.sidebar')
        <div class="page-content">
            <form action="{{ url('edit_room', $room->id) }}" method="POST" enctype="multipart/form-data"> <!-- Corrected action URL -->
                <h1 style="font-size: 30px; font-weight:bold; text-align:center; color:#007bff">Update Room</h1>

                @csrf
                <div>
                    <label>Room Title</label>
                    <input type="text" name="room_title" value="{{ $room->room_title }}" required />
                </div>
                <div>
                    <label>Description</label>
                    <textarea name="description" required>{{ $room->description }}</textarea>
                </div>
                <div>
                    <label>Price</label>
                    <input type="number" name="price" value="{{ $room->price }}" required />
                </div>
                <div>
                    <label>Room Type</label>
                    <select name="room_type" required>
                        <option selected value="{{ $room->room_type }}">{{ $room->room_type }}</option>
                        <option value="regular">Regular</option>
                        <option value="premium">Premium</option>
                        <option value="deluxe">Deluxe</option>
                    </select>
                </div>
                <div>
                    <label>Free Wifi</label>
                    <select name="wifi" required>
                        <option selected value="{{ $room->wifi }}">{{ $room->wifi }}</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div>
                    <label>Current Image</label>
                    <img width="100" src="/images/{{ $room->image }}" alt="">
                </div>
                <div>
                    <label>Upload Image</label>
                    <input type="file" name="image" /> <!-- Make this optional if you want to keep the current image -->
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Edit Room</button>
                </div>
            </form>
        </div>
    </div>
    @include('admin.footer')
</body>

</html>