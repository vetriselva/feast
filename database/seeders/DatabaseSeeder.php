<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
                'name' => "prabhu kannan",
                'is_admin' => 1,
                'email' => 'prabhukannan1210@gmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => "Bharathi kannan",
                'is_admin' => 0,
                'email' => 'user@gmail.com',
                'password' => Hash::make('password'),
            ]
        );
        DB::table('users')->insert( [
            'name' => "Bharathi kannan",
            'is_admin' => 0,
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
        ]
    );
        DB::table('flight_data')->insert(
            [
                'name' => "Air India 004",
                'image' => 'https://static.toiimg.com/thumb/75735879/flight.jpg?width=1200&height=900',
            ],   
        );
        DB::table('flight_data')->insert(
            [
                'name' => "Air India 004",
                'image' => 'https://smartcdn.prod.postmedia.digital/nationalpost/wp-content/uploads/2021/04/DEL6118813_54026599-scaled-e1618854875725.jpg?quality=90&strip=all&w=400',
            ],   
        );
        DB::table('hotel_data')->insert(
            [
                'name' => "ITC HOUSEBOAT",
                'location' => "India",
                'image' => 'https://r2imghtlak.mmtcdn.com/r2-mmt-htl-image/htl-imgs/200701241116266642-9a4dda4ad80011eb874b0242ac110009.jpg?&output-quality=75&downsize=910:612&crop=910:612;0,3&output-format=jpg',
            ],   
        );
        DB::table('hotel_data')->insert(
            [
                'name' => "PINE-N-PEAK",
                'location' => "India",
                'image' => 'https://www.kayak.com/rimg/himg/2c/29/43/hotelsdotcom-671230400-cd1dbd4d_w-991751.jpg?width=1366&height=768&crop=true',
            ],   
        );
        DB::table('hotel_data')->insert(
            [
                'name' => "THE KHYBER HIMALAYAN RESORT",
                'location' => "India",
                'image' => 'https://images.thrillophilia.com/image/upload/s--d20U-Zfb--/c_fill,h_600,q_auto,w_975/f_auto,fl_strip_profile/v1/images/photos/000/279/705/original/1590168853_summer.jpg.jpg?1590168853',
            ],   
        );
        DB::table('package_inclusions')->insert(
            [
                'point' => "Flight Tickets",
            ],   
        );
        DB::table('package_inclusions')->insert(
            [
                'point' => "5 Nights accommodation in well-appointed rooms as mentioned above hotels or equivalent",
            ],   
        );
        DB::table('package_inclusions')->insert(
            [
                'point' => "1 Night accommodation in well-appointed rooms as mentioned above houseboat",
            ],   
        );
        DB::table('package_inclusions')->insert(
            [
                'point' => "Assistance at the airport",
            ],   
        );
        DB::table('package_inclusions')->insert(
            [
                'point' => "Breakfast & Dinner at all places",
            ],   
        );
        DB::table('package_inclusions')->insert(
            [
                'point' => "1 session of Shikara-ride",
            ],   
        );
        DB::table('package_inclusions')->insert(
            [
                'point' => "Gandola ride (up to Phase 2) in Gulmarg",
            ],   
        );
        DB::table('package_inclusions')->insert(
            [
                'point' => "01 AC Innova Crysta for transfers and sightseeing as per the entire itinerary. (AC will not operate in hilly areas)",
            ],   
        );
        DB::table('package_inclusions')->insert(
            [
                'point' => "1 Local Union Car (Innova) included for Pahalgam sightseeing",
            ],   
        );
        DB::table('package_inclusions')->insert(
            [
                'point' => "Entry ticket at Mughal garden Srinagar for one time visit",
            ],   
        );
        DB::table('package_inclusions')->insert(
            [
                'point' => "Entry ticket at Mughal garden Srinagar for one time visit",
            ],   
        ); 
        
        DB::table('package_exclusions')->insert(
            [
                'point' => "Medical and Travel Insurance",
            ],   
        ); 
        DB::table('package_exclusions')->insert(
            [
                'point' => "Monument / Entry ( except mentioned in inclusions ) & Guide Charges",
            ],   
        ); 
        DB::table('package_exclusions')->insert(
            [
                'point' => "Pony Ride Charges",
            ],   
        ); 
        DB::table('package_exclusions')->insert(
            [
                'point' => "Guide service",
            ],   
        ); 
        DB::table('package_exclusions')->insert(
            [
                'point' => "Items of personal nature like laundry, phone calls, tips to guides / drivers etc.",
            ],   
        ); 
        DB::table('package_exclusions')->insert(
            [
                'point' => "Camera / Video camera fees applicable at monuments ",
            ],   
        ); 
        DB::table('package_exclusions')->insert(
            [
                'point' => "Camera / Video camera fees applicable at monuments ",
            ],   
        ); 

        DB::table('payment_policies')->insert(
            [
                'point' => "To process the reservation we require 60% advance deposit on package cost.",
            ],   
        ); 
        DB::table('payment_policies')->insert(
            [
                'point' => "Final payment 30 days before the departure",
            ],   
        ); 
        DB::table('refound_policies')->insert(
            [
                'point' => "Refunds to be made in respective accounts & No refund in cash",
            ],   
        );


        DB::table('cancle_policies')->insert(
            [
                'point' => "No full refunds on Cancellation of Air / Bus / Train tickets once issued.",
            ],   
        ); 
        DB::table('cancle_policies')->insert(
            [
                'point' => "If Package cancellation is made 15 to 30 days prior to departure date, 50% of the package cost shall be deducted",
            ],   
        ); 
        DB::table('cancle_policies')->insert(
            [
                'point' => "If package cancellation is made 15 to 07 days prior to departure, 75% of the package cost shall be deducted.",
            ],   
        ); 
        DB::table('cancle_policies')->insert(
            [
                'point' => "In case passenger is no show or 6 days prior to departure, 100% of the tour cost shall be deducted",
            ],   
        ); 
        DB::table('cancle_policies')->insert(
            [
                'point' => "5.	If cancellation made 30 days prior to departure 10,000.00 per person on the package cost.",
            ],   
        ); 
        DB::table('states')->insert( [
            'state_name' => "Tamil Nadu",
            'is_active' => 1,
        ]);
        DB::table('states')->insert( [
            'state_name' => "Kerala",
            'is_active' => 1,
        ]);
        DB::table('cities')->insert( [
            'state_id' => 1,
            'city_name' => "Chennai",
            'is_active' => 1,
        ]);
        DB::table('cities')->insert( [
            'state_id' => 2,
            'city_name' => "palakadu",
            'is_active' => 1,
        ]);
        DB::table('places')->insert( [
            'city_id' => 1,
            'place_name' => "Marina",
            'is_active' => 1,
        ]);
        DB::table('places')->insert( [
            'city_id' => 2,
            'place_name' => "Palakadu",
            'is_active' => 1,
        ]);

        DB::table('activities')->insert([
                'place_id' => 1,
                'title' => "Moon light walk",
                'sub_title' => "200 meeters walk",
                'image' => 'https://images.unsplash.com/photo-1562832135-14a35d25edef?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1245&q=80',
                'content' => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magnam vero, quidem dolor maxime non quaerat maiores obcaecati repellendus dignissimos et, ex consequatur autem, quod at doloribus? Veniam quos cupiditate tempora.",
            ] 
        );
        DB::table('activities')->insert(
            [
                'place_id' => 1,
                'title' => "Sun light walk",
                'sub_title' => "200 meeters walk",
                'image' => 'https://images.unsplash.com/photo-1504386106331-3e4e71712b38?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTR8fHN1bnxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60',
                'content' => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magnam vero, quidem dolor maxime non quaerat maiores obcaecati repellendus dignissimos et, ex consequatur autem, quod at doloribus? Veniam quos cupiditate tempora.",
            ],   
        );
        DB::table('activities')->insert([
            'place_id' => 1,
            'title' => "Moon light walk",
            'sub_title' => "200 meeters walk",
            'image' => 'https://images.unsplash.com/photo-1562832135-14a35d25edef?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1245&q=80',
            'content' => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magnam vero, quidem dolor maxime non quaerat maiores obcaecati repellendus dignissimos et, ex consequatur autem, quod at doloribus? Veniam quos cupiditate tempora.",
        ] 
        );
        DB::table('activities')->insert(
            [
                'place_id' => 1,
                'title' => "Sun light walk",
                'sub_title' => "200 meeters walk",
                'image' => 'https://images.unsplash.com/photo-1504386106331-3e4e71712b38?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTR8fHN1bnxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60',
                'content' => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magnam vero, quidem dolor maxime non quaerat maiores obcaecati repellendus dignissimos et, ex consequatur autem, quod at doloribus? Veniam quos cupiditate tempora.",
            ],   
        );

        DB::table('day_activities')->insert([
            'place_id' => 1,
            'title' => "Sun light walk",
            'sub_title' => "200 meeters walk",
            'image' => 'https://images.unsplash.com/photo-1504386106331-3e4e71712b38?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTR8fHN1bnxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60',
            'content' => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magnam vero, quidem dolor maxime non quaerat maiores obcaecati repellendus dignissimos et, ex consequatur autem, quod at doloribus? Veniam quos cupiditate tempora.",
        ] );
        DB::table('day_activities')->insert(
            [
                'place_id' => 1,
                'title' => "Sun light walk",
                'sub_title' => "200 meeters walk",
                'image' => 'https://images.unsplash.com/photo-1504386106331-3e4e71712b38?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTR8fHN1bnxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60',
                'content' => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magnam vero, quidem dolor maxime non quaerat maiores obcaecati repellendus dignissimos et, ex consequatur autem, quod at doloribus? Veniam quos cupiditate tempora.",
            ],   
        );
        DB::table('day_activities')->insert([
            'place_id' => 2,
            'title' => "Moon light walk",
            'sub_title' => "200 meeters walk",
            'image' => 'https://images.unsplash.com/photo-1562832135-14a35d25edef?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1245&q=80',
            'content' => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magnam vero, quidem dolor maxime non quaerat maiores obcaecati repellendus dignissimos et, ex consequatur autem, quod at doloribus? Veniam quos cupiditate tempora.",
        ] 
        );
        DB::table('day_activities')->insert(
            [
                'place_id' => 2,
                'title' => "Sun light walk",
                'sub_title' => "200 meeters walk",
                'image' => 'https://images.unsplash.com/photo-1504386106331-3e4e71712b38?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTR8fHN1bnxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60',
                'content' => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magnam vero, quidem dolor maxime non quaerat maiores obcaecati repellendus dignissimos et, ex consequatur autem, quod at doloribus? Veniam quos cupiditate tempora.",
            ],   
        );
    }
}
