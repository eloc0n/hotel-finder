<?php

namespace App\Http\Controllers;

use app\Models\Accommodation;
use app\Models\Flight;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;



class AccommodationsController extends Controller
{
    public function index() {

        # Get city
        $city = DB::table('room')->select('city')->distinct()->get()->pluck('city');
        # Get room type
        $room_type = DB::table('room')->select('room_type')->distinct()->get()->pluck('room_type');
        # Get room type
        $count_of_guests = DB::table('room')->select('count_of_guests')->distinct()->get()->pluck('count_of_guests');

        $results = [
            'city' => $city, 
            'room_type' => $room_type,
            'count_of_guests' => $count_of_guests,
        ];

        return view('accommodations.index', $results);

    }

    public function search(Request $request) {
        
        # Get user inputs
        $search_city = $request->get('search_city');
        $search_room_type = $request->get('search_room_type');
        $search_guests = $request->get('search_guests');

        $search_check_in = $request->get('check_in');
        $search_check_out = $request->get('check_out');

        $search_min = $request->get('min');
        $search_max = $request->get('max');

        # Fetch count of guests from db with no duplicates
        $count_of_guests = DB::table('room')->select('count_of_guests')->distinct()->get()->pluck('count_of_guests');

        # Fetch price from db with no duplicates within specified range
        $price_range = DB::table('room')
            ->where('city', $search_city)
            ->where('count_of_guests', $search_guests)
            ->where('room_type', $search_room_type)
            ->whereBetween('price', [$search_min, $search_max])
            ->distinct()
            ->get()
            ->pluck('price');
    
            
        // echo $price_range;

        # Check if user filled in check in/out
        if ($search_check_in and $search_check_out) {
             
            // # Get user_id
            // $user_id = DB::table('user')->select('user_id')->distinct()->get()->pluck('user_id')->first();

            // # Get room_id of the searched room
            // $room_id = DB::table('room')->where('city', $search_city)->distinct()->get()->pluck('room_id')->first();
            
            // # Save into bookings table
            // DB::table('bookings')->insert([
            //     'check_in_date'=>$search_check_in,
            //     'check_out_date'=>$search_check_out,
            //     'user_id'=>$user_id,
            //     'room_id'=>$room_id
            // ]);

            # Check if variables are empty
            if ($count_of_guests and json_decode($price_range)) {
                // echo 'im here1';

                # From room table get city, room_type, count_of_guests, price and filter accordingly
                $accommodations = DB::table('room')->where([
                    ['city', $search_city],
                    ['room_type', $search_room_type],
                    ['count_of_guests', $search_guests],
                    
                ])->whereBetween('price', [$search_min, $search_max])->get(); 

            }else{
                // echo ' im here2';

                # From room table get city, room_type and filter accordingly
                $accommodations = DB::table('room')->where([
                    ['city', $search_city],
                    ['room_type', $search_room_type],
                ])->get();
            }
           
            if ($accommodations) {
                // echo ' i m here3';

                # Get city
                $city = DB::table('room')->select('city')->distinct()->get()->pluck('city');
                # Get room type
                $room_type = DB::table('room')->select('room_type')->distinct()->get()->pluck('room_type');

              
                # Saving variables into an array and pass it to the view
                $results = [
                    'accommodations'=> $accommodations, 
                    'price'=> $price_range, 
                    'city' => $city, 
                    'room_type' => $room_type,
                    'count_of_guests' => $count_of_guests,
                ];

                return view('accommodations.search', $results);

                

            }else{
                // return redirect('room');
                echo 'No available accommodations found with your preferences!';
            }
        }else{
            // return redirect('room');
            echo 'search for different days!';
        }

    }

    public function hotel($id) {

        # Get reviews
        $review = DB::table('reviews')->where('room_id',$id)->get();

        # Get room
        $hotel = DB::table('room')->where('room_id',$id)->get(); 

        $results = [
            'hotel' => $hotel, 
            'reviews' => $review,
        ];

        return view('accommodations.hotel', $results);

    }

    
    public function location($id) {

        # Get location
        $lat_location = DB::table('room')->select('lat_location')->where('room_id',$id)->get();
        $lng_location = DB::table('room')->select('lng_location')->where('room_id',$id)->get();


        $results = [
            'lat_location' => $lat_location, 
            'lng_location' => $lng_location, 
        ];

        return  $results;

    }

    public function store(Request $request, $id) {
        
        if ($request->has('book_now')) {
            $booking = new Flight;
        
            $booking->check_in_date = $request->check_in;
            $booking->check_out_date = $request->check_out;
            
            $booking->user_id = DB::table('user')->select('user_id')->distinct()->get()->pluck('user_id')->first();
            $booking->room_id = DB::table('room')->where('room_id',$id)->distinct()->get()->pluck('room_id')->first();

            $booking->save();
        }

        if ($request->has('add_review')) {
            $review = new Accommodation;
            
            $review->text = $request->review;
            $review->rate = $request->rate;

            $review->user_id = DB::table('user')->select('user_id')->distinct()->get()->pluck('user_id')->first();
            $review->room_id = DB::table('room')->where('room_id',$id)->distinct()->get()->pluck('room_id')->first();

            $review->save();
        }
        // error_log(request('review'));
        
        return redirect('/hotel/'.$id);
        // return redirect()->route('hotel', ['id' => $id]);
    }
}
