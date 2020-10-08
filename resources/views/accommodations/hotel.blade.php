@extends('layouts.layout')

@section('content')


@if($hotel)
<div class="col mt-3">
    @foreach($hotel as $data)
    <div class="card">
        <div class="card-body">
            {{$data->name}} - {{$data->city}}, {{$data->area}} | Reviews: | 
            <div class="float-right">
                Per night: {{$data->price}} €
            </div>
            
        </div>
    </div>
    <div class="col-3 mt-3 mb-3">
        <img src="/img/{{$data->photo}}" class="img-fluid" alt="Responsive image">
    </div>
        
    <div class="card">
        <div class="text-center">
            <div class="row">
                <div class="col">
                Count of Guests: {{$data->count_of_guests}}
                </div>
                <div class="col">
                Type of room: {{$data->room_type}}
                </div>
                <div class="col">
                Type of room: {{$data->parking}}
                </div>
                <div class="col">
                Type of room: {{$data->wifi}}
                </div>
                <div class="col">
                Type of room: {{$data->pet_friendly}}
                </div>
            </div>
        </div>
    </div>
    <div class="mt-4">
        <h4>Room Description</h4>
        <p>{{$data->long_description}}</p>
    </div>
   

        <div class="mt-4 mb-4">
            <h4 class="mb-3">Reviews</h4>
            @foreach($reviews as $review)
                @if($loop->iteration)
                    <p> {{$review->user_id}}. </p>
                    <h5> {{$review->text}} </h5>
                    <p> {{$review->rate}} </p>
                    <p>Add time: {{$review->date_created}} </p>
                @endif
            @endforeach
        </div>
        
    <form action="/hotel/{{$data->room_id}}" method="POST">
    @csrf
        <div class="form-group mb-5">
            <label for="exampleInputEmail1">Add Rate</label>
            <select class="custom-select" name="rate">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>  
            </select>
            <label for="exampleInputEmail1">Add Review</label>
            <textarea name="review" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-danger mb-5">Submit</button>
    </form>
   
    @endforeach
</div>

@else
    no data
@endif
 



@endsection