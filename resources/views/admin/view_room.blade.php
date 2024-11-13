<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
</head>

<body>
    @include('admin.header')
    <div class="d-flex">
        @include('admin.sidebar')
        <div class="page-content">
            <h1 style="text-align: center; color:RED">Room List</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Room Title</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Wifi</th>
                        <th>Room Type</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rooms as $room)
                    <tr>
                        <td>{{ $room->room_title }}</td>
                        <td>
                            <img src="{{ asset('images/' . $room->image) }}" alt="{{ $room->title }}" style="width: 100px; height: auto;">
                        </td>
                        <td>{!! Str::limit($room->description, 50, '...')!!}</td>
                        <td>${{ $room->price }}</td>
                        <td>{{ $room->wifi }}</td>
                        <td>{{ $room->room_type }}</td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('admin.footer')
</body>

</html>