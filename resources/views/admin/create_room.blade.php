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
        <div class="page-header">
            <div class="container-fluid">
            </div>
            <form>
                <div>
                    <label>Room Title</label>
                    <input type="text" name="title">
                </div>
                <div>
                    <label>Room Title</label>
                    <input type="text" name="title">
                </div>
                <div>
                    <label>Room Title</label>
                    <input type="text" name="title">
                </div>
                <div>
                    <label>Description</label>
                    <textarea name="description"></textarea>
                </div>
                <div>
                    <label>Price</label>
                    <input type="number" name="price">
                </div>
                <div>
                    <label>Room Type</label>
                    <select name="type">
                        <option value="regular">Regular</option>

                        <option value="premium">Premium</option>

                        <option value="deluxe">Deluxe</option>


                    </select>
                </div>
                <div>
                    <label>Free Wifi</label>
                    <select name="type">
                        <option value="yes">Yes</option>
        
                        <option value="no">No</option>
        
        
        
                    </select>
                </div>
                <div>
                    <label>Upload Image</label>
                    <input type="file" name="image">
                </div>
                <div>
                    <label>Submit</label>
                    <input type="submit" name="Add Room">
                </div>
                
            </div>
        
        
            </form>


        </div>
        
    </div>
    </div>
    </div>


    @include('admin.footer')
</body>
