<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <style>
        /* Custom styles for better responsiveness */
        @media (max-width: 768px) {
            .table-responsive {
                overflow-x: auto;
            }
            .btn {
                width: 100%; /* Make buttons full-width on small screens */
                margin-bottom: 10px; /* Add space between buttons */
            }
        }

        .alert {
            display: none; /* Initially hide the alert */
        }
    </style>
</head>

<body>
    @include('admin.header')
    <div class="d-flex">
        @include('admin.sidebar')
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <h2 class="h5 align-middle no-margin-bottom">All Bookings</h2>
                </div>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="table-responsive"> <!-- Added responsive wrapper -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Room ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Room Title</th>
                                <th>Price</th>
                                <th>Check-in Date</th>
                                <th>Check-out Date</th>
                                <th>Image</th>
                                <th>Delete Row</th>
                                <th>Status Update</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $booking)
                                <tr>
                                    <td>{{ $booking->id }}</td>
                                    <td>{{ $booking->room_id }}</td>
                                    <td>{{ $booking->name }}</td>
                                    <td>{{ $booking->email }}</td>
                                    <td>{{ $booking->phone }}</td>
                                    <td>{{ ucfirst($booking->status) }}</td>
                                    <td>{{ $booking->room->room_title }}</td>
                                    <td>{{ $booking->room->price }}</td>
                                    <td>{{ $booking->checkin_date }}</td>
                                    <td>{{ $booking->checkout_date }}</td>
                                    <td>
                                        <img src="{{ asset('images/' . $booking->room->image) }}" alt="#" style="max-width: 100px; height: auto;" />
                                    </td>
                                    <td>
                                        <form action="{{ url('delete_booking', $booking->id) }}" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this booking?');">Delete</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ url('accept_booking', $booking->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure you want to accept this booking?');">Accept</button>
                                        </form>
                                        <form action="{{ url('reject_booking', $booking->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-warning" style="margin-top: 15px" onclick="return confirm('Are you sure you want to reject this booking?');">Reject</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('admin.footer')
</body>

</html>