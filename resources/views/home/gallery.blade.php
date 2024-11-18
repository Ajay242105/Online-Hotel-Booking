<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gallery</title>
    <style>
        img {
            width: 250px;
            height: 250px;
        }
    </style>
</head>

<body>
    <div class="gallery">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Gallery</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($gallery as $item)
                <div class="col-md-3 col-sm-6">
                    <div class="gallery_img">
                        <figure>
                            <img src="{{ asset('images/' . $item->image_path) }}" alt="#" />
                        </figure>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</body>

</html>