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
            <h1 style="text-align: center; color:RED">Messages List</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Message</th>
                        <th>Sent At</th>
                        <th>Send Email</th>

                    </tr>S
                </thead>
                <tbody>
                    @foreach ($messages as $message)
                        <tr>
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->phone_number }}</td>
                            <td>{{ $message->message }}</td>
                            <td>{{ $message->created_at->format('Y-m-d H:i') }}</td>
                            <td>
                                <a class="btn btn-success" href="{{url('send_mail',$message->id)}}">send Email</a>

                            </td>


                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('admin.footer')
</body>

</html>

       