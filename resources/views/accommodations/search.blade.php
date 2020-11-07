@extends('layouts.layout')

@section('content')


<div class="col-3 mt-3 mb-3">
  <h3 class="mb-3">Find the Perfect Hotel</h3>
    <form action="/search" method='GET'>

        <div class="">
            <select class="custom-select" name="search_guests" id="guests">
                <option value="" disabled selected>Count of Guests</option>
                @foreach($count_of_guests as $data)
                  <option value="{{ $data }}">{{ $data }}</option>
                @endforeach             
            </select>
        </div>

        <br>

        <div class="">
            <select class="custom-select" name="search_city" id="city">
                <option value="" disabled selected>City</option>
                @foreach($city as $data)
                  <option value="{{ $data }}">{{ $data }}</option>
                @endforeach
            </select>
        </div>

        <br>

        <div class="">
            <select class="custom-select" name="search_room_type" id="room_type">
            <option value="" disabled selected>Room type</option>
              @foreach($room_type as $data)
                  <option value="{{ $data }}">{{ $data }}</option>
              @endforeach
            </select>
        </div>
        <br>

        <div class="input-group mb-3">
            <input type="number" name="min" class="form-control" placeholder="0 €"  value="0" aria-label="Username" aria-describedby="basic-addon1" required>
            <input type="number" name="max" class="form-control" placeholder="5000 €"  value="5000" aria-label="Recipient's username" aria-describedby="basic-addon2" required>  
            <!-- <input type="range" class="custom-range" id="customRange2"> -->
        </div>

        <div class="inner-addon right-addon mt-3">
            <i class="fa fa-calendar" aria-hidden="true" id="checkInIcon"></i>
            <input type="text" name="check_in" class="form-control checkIn" 
            placeholder="Check-In" required>
        </div>

        <div class="inner-addon right-addon mt-3">
            <i class="fa fa-calendar" aria-hidden="true" id="checkOutIcon"></i>
            <input type="text" name="check_out" class="form-control checkOut" placeholder="Check-Out" required>
        </div>
        <!-- <input type="search" id="search" name="search"> -->
        <input class="btn btn-secondary btn-block mt-3" type="submit" value="Search">

    </form>
</div>

<div class="col-9 mt-3 mb-3">
  <div class="card">
    <div class="card-body">
      Searched Results
    </div>
  </div>
  @if(!empty(json_decode($price)))
  <div class="row">
    @foreach($accommodations as $data)
    <div class="col-3 mt-3 mb-3">
      <img src="/img/{{$data->photo}}" class="img-fluid float-left" alt="Responsive image">
    </div>
    <div class="col-9 mt-3  mb-3">
      <h3>{{$data->name}}</h3>
      <h5>{{$data->city}}, {{$data->area}}</h5>
      <p>{{$data->short_description}}</p>
      <a href="/hotel/{{$data->room_id}}" class="btn btn-danger mb-3 float-right">Go to room page</a>
    </div>
    <div class="col-3">
      <div class="text-center">
        <div class="card">
          Per night: {{$data->price}} €
        </div>
      </div>
    </div>
    <div class="col-9">
      <div class="card">
          <div class="text-center">
            <div class="row">
              <div class="col">
                Count of Guests: {{$data->count_of_guests}}
              </div>
              <div class="col">
                Type of room: {{$data->room_type}}
              </div>
            </div>
          </div>
      </div>
    </div>
    @endforeach
    @else
      no rooms available with selected criteria
    @endif
  </div>
</div>


@endsection