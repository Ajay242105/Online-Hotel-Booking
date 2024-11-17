<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    @include('home.css')
    <style>
        .room_img {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
            padding-top: 10px;
        }

        .room_img img {
            height: 300px;
            width: 320px;
            object-fit: cover;
        }

        .bed_room {
            background-color: rgb(255, 180, 41);
            padding: 30px;
            color: white;
        }

        .booking-form {
            background-color: rgb(248, 246, 246);
            /* White background for the form */
            padding: 20px;
        }

        .alert {
            margin-bottom: 20px;
        }
    </style>
</head>
<title>Chandrakala Ashram and Guest House</title>

<body class="main-layout">
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#" /></div>
    </div>
    <header>
        @include('home.header')
    </header>
    <div class="our_room">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Our Room</h2>
                        <p>Every Room Tells a Story: Experience Comfort Like Never Before.</p>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-6">
                    <div id="serv_hover" class="room">
                        <div class="room_img">
                            <figure>
                                <img src="{{ asset('images/' . $room->image) }}" alt="#" />
                            </figure>
                        </div>
                        <div class="bed_room">
                            <h2>{{ $room->room_title }}</h2>
                            <p style="padding: 12px">{{ Str::limit($room->description, 100, '...') }}</p>
                            <h3 style="padding: 12px">Free Wifi: {{ $room->wifi }}</h3>
                            <h3 style="padding: 12px">Room Type: {{ $room->room_type }}</h3>
                            <h3 style="padding: 12px">Room Price: {{ $room->price }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="booking-form">
                        @if (session('success'))
                            <div class="alert alert-success" id="success-message">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger" id="error-message">
                                {{ session('error') }}
                            </div>
                        @endif
                        <h1 style="text-align: center; font-weight:bold;">Book This Room</h1>

                        <form method="POST" action="{{ url('add_booking', $room->id) }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ Auth::check() ? Auth::user()->name : '' }}" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ Auth::check() ? Auth::user()->email : '' }}" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="tel" class="form-control" id="phone" name="phone"
                                    value="{{ Auth::check() ? Auth::user()->phone : '' }}">
                            </div>
                            <div class="form-group">
                                <label for="checkin_date">Check-in Date</label>
                                <input type="date" class="form-control" id="checkin_date" name="checkin_date"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="checkout_date">Check-out Date</label>
                                <input type="date" class="form-control" id="checkout_date" name="checkout_date"
                                    required>
                            </div>
                            <button type="submit" class="btn btn-primary">Book Now</button>
                        </form>

                    </div>
                </div>
            </div>

            @include('home.footer')

            <script>
                setTimeout(function() {
                    var successMessage = document.getElementById('success-message');
                    if (successMessage) {
                        successMessage.style.display = 'none';
                    }
                }, 5000);

                setTimeout(function() {
                    var errorMessage = document.getElementById('error-message');
                    if (errorMessage) {
                        errorMessage.style.display = 'none';
                    }
                }, 5000);
            </script>
</body>

</html>
