<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\PackageInclusions;
use App\Models\Admin\PackageExclusions;
use App\Models\Admin\PaymentPolicy;
use App\Models\Admin\RefoundPolicy;
use App\Models\Admin\Activity;
use App\Models\Admin\CanclePolicy;
use App\Models\Admin\City;
use App\Models\Admin\Configs;
use App\Models\Admin\DayActivity;
use App\Models\Admin\HotelData;
use App\Models\Admin\FlightData;
use App\Models\Admin\Place;
use App\Models\Admin\State;

class DataCenterController extends Controller
{
    public function index(Request $r , $type)
    {
        if($type == 'Itinerary') {
            $act        =  Activity::latest()->get();
            return view("admin.data-center.itinary",compact('act'));
        }
        else if($type == 'Hotels') {
            $hot        =  HotelData::latest()->get();
            return view("admin.data-center.hotel",compact('hot'));
        }
        else if($type == 'Flights') {
            $hot        =  FlightData::latest()->get();
            return view("admin.data-center.flight",compact('hot'));
        }

        else if($type == 'Package_Inclusions') {
            $hot        =  PackageInclusions::latest()->get();
            return view("admin.data-center.PackageInclusions",compact('hot'));
        }
        else if($type == 'Package_Exclusions') {
            $hot        =  PackageExclusions::latest()->get();
            return view("admin.data-center.PackageExclusions",compact('hot'));
        }
        else if($type == 'Payment_Policy') {
            $hot        =  PaymentPolicy::latest()->get();
            return view("admin.data-center.PaymentPolicy",compact('hot'));
        }
        else if($type == 'Refound_Policy') {
            $hot        =  RefoundPolicy::latest()->get();
            return view("admin.data-center.RefoundPolicy",compact('hot'));
        }
        else if($type == 'Cancel_Policy') {
            $hot        =  CanclePolicy::latest()->get();
            return view("admin.data-center.CanclePolicy",compact('hot'));
        }
        else if($type == 'State') {
            $hot        =  State::latest()->get();
            return view("admin.data-center.State",compact('hot'));
        }
        else if($type == 'City') {
            $hot        =  City::with('state')->latest()->get();
            $states     = State::get();
            return view("admin.data-center.City",compact('hot','states'));
        }
        else if($type == 'Place') {
            $hot        =  Place::with('city')->latest()->get();
            $cities       =  City::get();
            return view("admin.data-center.Place",compact('hot','cities'));
        }

        else if($type == 'Activities') {
            $hot          =  Activity::with('place')->latest()->get();
            $places       =  Place::get();
            return view("admin.data-center.Activities",compact('hot','places'));
        }

        else if($type == 'DayActivities') {
            $hot          =  DayActivity::with('place')->latest()->get();
            $places       =  Place::get();
            return view("admin.data-center.DayActivities",compact('hot','places'));
        }
        else if($type == 'Configs') {
            $hot          =  Configs::get();
            return view("admin.data-center.Configs",compact('hot'));
        }

    }
    public function store(Request $r, $type)
    {
        if($type == 'Activities_store') {
            $data   =    new Activity;
            $data -> place_id   = $r->  place_id;
            $data -> title      = $r->  title;
            $data -> sub_title  = $r->  sub_title;
            $data -> image      = $r->  image;
            $data -> content    = $r->  content;
            $data->save();
            return back()->with('success','Create Success!');
        }

        else if($type == 'DayActivites_store') {
            $data   =    new DayActivity;
            $data -> place_id   = $r->  place_id;
            $data -> title      = $r->  title;
            $data -> sub_title  = $r->  sub_title;
            $data -> image      = $r->  image;
            $data -> content    = $r->  content;
            $data->save();
            return back()->with('success','Create Success!');
        }

        else if($type == 'Hotel_store') {
            $data   =    new HotelData;
            $data -> name      = $r->  name;
            $data -> location  = $r->  location;
            $data -> image      = $r->  image;
            $data->save();
            return back()->with('success','Create Success!');
        }

        else if($type == 'Flight_store') {
            $data   =    new FlightData;
            $data -> name      = $r->  name;
            $data -> image      = $r->  image;
            $data->save();
            return back()->with('success','Create Success!');
        }
        else if($type == 'Pack_inclu_store') {
            $act    = new PackageInclusions;
            $act->point = $r->point;
            $act->save();
            return back()->with('success','Create Success!');
        }
        else if($type == 'Pack_exclu_store') {
            $act    = new PackageExclusions;
            $act->point = $r->point;
            $act->save();
            return back()->with('success','Create Success!');
        }
        else if($type == 'pay_pol_store') {
            $act    = new PaymentPolicy;
            $act->point = $r->point;
            $act->save();
            return back()->with('success','Create Success!');
        }
        else if($type == 'Refound_Policy_store') {
            $act    = new RefoundPolicy;
            $act->point = $r->point;
            $act->save();
            return back()->with('success','Create Success!');
        }
        else if($type == 'Cancel_Policy_store') {
            $act    = new CanclePolicy;
            $act->point = $r->point;
            $act->save();
            return back()->with('success','Create Success!');
        }
        else if($type == 'state_store') {
            $state        =  new State();
            $state->state_name = $r->state_name;
            $state->save();
            return back()->with('success','Create Success!');
        }
        else if($type == 'city_store') {
            $city            =  new City();
            $city->state_id  = $r->state_id;
            $city->city_name = $r->city_name;
            $city->save();
            return back()->with('success','Create Success!');
        }

        else if($type == 'place_store') {
            $place             =  new Place();
            $place->city_id    = $r->city_id;
            $place->place_name = $r->place_name;
            $place->save();
            return back()->with('success','Create Success!');
        }
        
    }
    public function destroy(Request $r, $id, $type)
    {
        if($type == 'Activities_delete') {
            $act    =  Activity::find($id);
            $act->delete();
            return back()->with('success','Delete Success!');
        }

        else if($type == 'DayActivities_delete') {
            $act    =  DayActivity::find($id);
            $act->delete();
            return back()->with('success','Delete Success!');
        }

        else if($type == 'Hotel_delete') {
            $act    =  HotelData::find($id);
            $act->delete();
            return back()->with('success','Delete Success!');
        }
        else if($type == 'Flight_delete') {
            $act    =  FlightData::find($id);
            $act->delete();
            return back()->with('success','Delete Success!');
        }
        else if($type == 'Pack_inclu_delete') {
            $act    =  PackageInclusions::find($id);
            $act->delete();
            return back()->with('success','Delete Success!');
        }
        else if($type == 'Pack_exclu_delete') {
            $act    =  PackageExclusions::find($id);
            $act->delete();
            return back()->with('success','Delete Success!');
        }

        else if($type == 'pay_pol_delete') {
            $act    =  PaymentPolicy::find($id);
            $act->delete();
            return back()->with('success','Delete Success!');
        }
        else if($type == 'Refound_Policy_delete') {
            $act    =  RefoundPolicy::find($id);
            $act->delete();
            return back()->with('success','Delete Success!');
        }
        else if($type == 'Cancel_Policy_delete') {
            $act    =  CanclePolicy::find($id);
            $act->delete();
            return back()->with('success','Delete Success!');
        }
        else if($type == 'state_delete') {
            $act    =  State::find($id);
            $act->delete();
            return back()->with('success','Delete Success!');
        }
        else if($type == 'city_delete') {
            $act    =  City::find($id);
            $act->delete();
            return back()->with('success','Delete Success!');
        }
        else if($type == 'place_delete') {
            $act    =  Place::find($id);
            $act->delete();
            return back()->with('success','Delete Success!');
        }
    }
    public function update(Request $r, $id, $type)
    {
        if($type == 'Activities_update') {
            $act    =  Activity::find($id);
            $act -> place_id   = $r->  place_id;
            $act    -> title      = $r->  title;
            $act    -> sub_title  = $r->  sub_title;
            $act    -> image      = $r->  image;
            $act    -> content    = $r->  content;
            $act    ->save();
            return back()->with('success','Update Success!');
        }

        if($type == 'DayActivities_update') {
            $data   =    new DayActivity;
            $data -> place_id   = $r->  place_id;
            $data -> title      = $r->  title;
            $data -> sub_title  = $r->  sub_title;
            $data -> image      = $r->  image;
            $data -> content    = $r->  content;
            $data->save();
            return back()->with('success','Create Success!');
        }

        if($type == 'Hotel_update') {
            $data   =    HotelData::find($id);
            $data -> name      = $r->  name;
            $data -> location  = $r->  location;
            $data -> image      = $r->  image;
            $data->save();
            return back()->with('success','Update Success!');
        }
        if($type == 'Flight_update') {
            $data   =    FlightData::find($id);
            $data -> name      = $r->  name;
            $data -> image      = $r->  image;
            $data->save();
            return back()->with('success','Update Success!');
        }
        if($type == 'Pack_inclu_update') {
            $act    = PackageInclusions::find($id);
            $act->point = $r->point;
            $act->save();
            return back()->with('success','Update Success!');
        }
        if($type == 'Pack_exclu_update') {
            $act    = PackageExclusions::find($id);
            $act->point = $r->point;
            $act->save();
            return back()->with('success','Update Success!');
        }
        if($type == 'pay_pol_update') {
            $act    =  PaymentPolicy::find($id);
            $act->point = $r->point;
            $act->save();
            return back()->with('success','Update Success!');
        }
        if($type == 'Refound_Policy_update') {
            $act    =  RefoundPolicy::find($id);
            $act->point = $r->point;
            $act->save();
            return back()->with('success','Update Success!');
        }
        if($type == 'Cancel_Policy_update') {
            $act    =  CanclePolicy::find($id);
            $act->point = $r->point;
            $act->save();
            return back()->with('success','Update Success!');
        }
        if($type == 'state_update') {
            $state        = State::find($id);
            $state->state_name = $r->state_name;
            $state->save();
            return back()->with('success','Update Success!');
        }
        if($type == 'city_update') {
            $act    =  City::find($id);
            $act->state_id = $r->state_id;
            $act->city_name = $r->city_name;
            $act->save();
            return back()->with('success','Update Success!');
        }
        if($type == 'place_update') {
            $act    =  Place::find($id);
            $act->city_id = $r->city_id;
            $act->place_name = $r->place_name;
            $act->save();
            return back()->with('success','Update Success!');
        }
        if($type == 'Configs_update') {

            $act    =  Configs::find($id);
            $act->bank_name = $r->bank_name;
            $act->account_holder_name = $r->account_holder_name;
            $act->account_number = $r->account_number;
            $act->branch_name = $r->branch_name;
            $act->ifsc_code = $r->ifsc_code;
            $act->save();
            return back()->with('success','Update Success!');
        }
    }
}
