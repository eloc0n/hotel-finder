@extends('layouts.layout')

@section('content')
  <form action="/search" method='GET'>
  <div class="card mt-3">
    <div class="card-body">
      <div class="form-row">

        

          <div class="col">
            <select class="custom-select" name="search_city" id="city">
            <option value="" disabled selected>City</option>
              @foreach($city as $data)
                  <option value="{{ $data }}">{{ $data }}</option>
              @endforeach
            </select>
          </div>
      
          <br><br>

          <div class="col">
            <select class="custom-select" name="search_room_type" id="room_type">
            <option value="" disabled selected>Room type</option>
              @foreach($room_type as $data)
                  <option value="{{ $data }}">{{ $data }}</option>
              @endforeach
            </select>
            <br><br>
          </div>
        </div>

        <div class="">
            <select class="custom-select mb-4" name="search_guests" id="guests">
                <option value="" disabled selected>Count of Guests</option>
                @foreach($count_of_guests as $data)
                  <option value="{{ $data }}">{{ $data }}</option>
                @endforeach             
            </select>
          </div>
      
          <div class="inner-addon right-addon mb-2">
              <i class="fa fa-calendar" aria-hidden="true" id="checkInIcon"></i>
              <input type="text" name="check-in" class="form-control checkIn" 
              placeholder="Check-In">
          </div>

          <div class="inner-addon right-addon">
              <i class="fa fa-calendar" aria-hidden="true" id="checkOutIcon"></i>
              <input type="text" name="check-out" class="form-control checkOut" placeholder="Check-Out">
          </div>

          <div class="input-group mb-3">
            <input type="hidden" name="min" class="form-control" placeholder="0 €"  value="0" aria-label="Min price" aria-describedby="basic-addon1" required>
            <input type="hidden" name="max" class="form-control" placeholder="5000 €"  value="5000" aria-label="Max price" aria-describedby="basic-addon2" required>  
            <!-- <input type="range" class="custom-range" id="customRange2"> -->
          </div>
       
        <!-- <input type="search" id="search" name="search"> -->
        <input class="btn btn-secondary btn-block mt-3" type="submit" value="Search">
      </div>
    </div>
  </form>


@endsection




