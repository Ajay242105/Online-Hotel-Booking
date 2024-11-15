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
       <div class="row">
           @foreach ($rooms as $room) <!-- Loop through the rooms -->
               <div class="col-md-4 col-sm-6">
                   <div id="serv_hover" class="room">
                       <div class="room_img">
                           <figure><img style="height: 200px;width:350px;" src="{{ asset('images/' . $room->image) }}" alt="#" /></figure>
                       </div>
                       <div class="bed_room">
                           <h3>{{ $room->room_title }}</h3>
                           <p>{{ Str::limit($room->description, 100, '...') }}</p>
                       </div>
                   </div>
               </div>
           @endforeach
       </div>
   </div>
</div>