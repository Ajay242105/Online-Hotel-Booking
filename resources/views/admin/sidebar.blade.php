<!-- sidebar.blade.php -->
<nav id="sidebar" class="bg-light">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="images/img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle"></div>
        <div class="title">
            <h1 class="h5">
                 {{-- <x-app-layout>
                </x-app-layout> --}}
                Nitish
            </h1>
        </div>
    </div>
    <!-- Sidebar Navigation Menus-->
    <span class="heading">Main</span>
    <ul class="list-unstyled ">
        <li class="active"><a href="{{ url('home') }}"> <i class="icon-home"></i>Home </a></li>
        <li>
            <a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse">
                <i class="icon-windows"></i>Hotel Rooms
            </a>
            <ul id="exampledropdownDropdown" class="collapse list-unstyled">
                <li><a href="{{ url('create_room') }}">Add Rooms</a></li>
                <li><a href="{{ url('view_room') }}">Veiw Room</a></li>
            </ul>
        </li>
        <li>
            <a href="{{ url('view_bookings') }}"> <i class="fa fa-book"></i></i>Bookings </a>
        </li>
        <li>
            <a href="{{ url('view_gallery') }}"> <i class="fa fa-image"></i>Gallery </a>
        </li>
        <li>
            <a href="{{ route('view.messages') }}"> <i class="fa fa-image"></i> Messages </a>
        </li>
    </ul>
</nav>
