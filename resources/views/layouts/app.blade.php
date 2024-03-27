@if(Auth::user()->profile_image)
     <img class="image rounded-circle" src="{{asset('/storage/images/'.Auth::user()->profile_image)}}" alt="profile_image" style="width: 80px;height: 80px; padding: 10px; margin: 0px; ">
@endif