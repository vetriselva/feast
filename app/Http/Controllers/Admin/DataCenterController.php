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
use App\Models\Admin\HotelData;
use App\Models\Admin\FlightData;
use App\Models\Admin\State;

class DataCenterController extends Controller
{
    public function index(Request $r , $type)
    {
        // $pack_in    =  PackageInclusions::latest()->get();
        // $pack_ex    =  PackageExclusions::latest()->get();
        // $pay_poly   =  PaymentPolicy::latest()->get();
        // $refo_poly  =  RefoundPolicy::latest()->get();
        // $can_poly   =  CanclePolicy::latest()->get();
        // $hot        =  HotelData::latest()->get();

        if($type == 'Itinerary') {
            $act        =  Activity::latest()->get();
            return view("admin.data-center.itinary",compact('act'));
        }
        if($type == 'Hotels') {
            $hot        =  HotelData::latest()->get();
            return view("admin.data-center.hotel",compact('hot'));
        }
        if($type == 'Flights') {
            $hot        =  FlightData::latest()->get();
            return view("admin.data-center.flight",compact('hot'));
        }

        if($type == 'Package_Inclusions') {
            $hot        =  PackageInclusions::latest()->get();
            return view("admin.data-center.PackageInclusions",compact('hot'));
        }
        if($type == 'Package_Exclusions') {
            $hot        =  PackageExclusions::latest()->get();
            return view("admin.data-center.PackageExclusions",compact('hot'));
        }
        if($type == 'Payment_Policy') {
            $hot        =  PaymentPolicy::latest()->get();
            return view("admin.data-center.PaymentPolicy",compact('hot'));
        }
        if($type == 'Refound_Policy') {
            $hot        =  RefoundPolicy::latest()->get();
            return view("admin.data-center.RefoundPolicy",compact('hot'));
        }
        if($type == 'Cancel_Policy') {
            $hot        =  CanclePolicy::latest()->get();
            return view("admin.data-center.CanclePolicy",compact('hot'));
        }
        if($type == 'State') {
            $hot        =  State::latest()->get();
            return view("admin.data-center.state",compact('hot'));
        }
    }
    public function store(Request $r, $type)
    {
        if($type == 'Act_store') {
            $data   =    new Activity;
            $data -> title      = $r->  title;
            $data -> sub_title  = $r->  sub_title;
            $data -> image      = $r->  image;
            $data -> content    = $r->  content;
            $data->save();
            return back()->with('success','Create Success!');
        }

        if($type == 'Hotel_store') {
            $data   =    new HotelData;
            $data -> name      = $r->  name;
            $data -> location  = $r->  location;
            $data -> image      = $r->  image;
            $data->save();
            return back()->with('success','Create Success!');
        }

        if($type == 'Flight_store') {
            $data   =    new FlightData;
            $data -> name      = $r->  name;
            $data -> image      = $r->  image;
            $data->save();
            return back()->with('success','Create Success!');
        }
        if($type == 'Pack_inclu_store') {
            $act    = new PackageInclusions;
            $act->point = $r->point;
            $act->save();
            return back()->with('success','Create Success!');
        }
        if($type == 'Pack_exclu_store') {
            $act    = new PackageExclusions;
            $act->point = $r->point;
            $act->save();
            return back()->with('success','Create Success!');
        }
        if($type == 'pay_pol_store') {
            $act    = new PaymentPolicy;
            $act->point = $r->point;
            $act->save();
            return back()->with('success','Create Success!');
        }
        if($type == 'Refound_Policy_store') {
            $act    = new RefoundPolicy;
            $act->point = $r->point;
            $act->save();
            return back()->with('success','Create Success!');
        }
        if($type == 'Cancel_Policy_store') {
            $act    = new CanclePolicy;
            $act->point = $r->point;
            $act->save();
            return back()->with('success','Create Success!');
        }
        if($type == 'state_store') {
            $state        =  new State();
            $state->state_name = $r->state_name;
            $state->save();
            return back()->with('success','Create Success!');
        }
    }
    public function destroy(Request $r, $id, $type)
    {
        if($type == 'Act_delete') {
            $act    =  Activity::find($id);
            $act->delete();
            return back()->with('success','Delete Success!');
        }
        if($type == 'Hotel_delete') {
            $act    =  HotelData::find($id);
            $act->delete();
            return back()->with('success','Delete Success!');
        }
        if($type == 'Flight_delete') {
            $act    =  FlightData::find($id);
            $act->delete();
            return back()->with('success','Delete Success!');
        }
        if($type == 'Pack_inclu_delete') {
            $act    =  PackageInclusions::find($id);
            $act->delete();
            return back()->with('success','Delete Success!');
        }
        if($type == 'Pack_exclu_delete') {
            $act    =  PackageExclusions::find($id);
            $act->delete();
            return back()->with('success','Delete Success!');
        }

        if($type == 'pay_pol_delete') {
            $act    =  PaymentPolicy::find($id);
            $act->delete();
            return back()->with('success','Delete Success!');
        }
        if($type == 'Refound_Policy_delete') {
            $act    =  RefoundPolicy::find($id);
            $act->delete();
            return back()->with('success','Delete Success!');
        }
        if($type == 'Cancel_Policy_delete') {
            $act    =  CanclePolicy::find($id);
            $act->delete();
            return back()->with('success','Delete Success!');
        }
        if($type == 'state_delete') {
            $act    =  State::find($id);
            $act->delete();
            return back()->with('success','Delete Success!');
        }
        
    }
    public function update(Request $r, $id, $type)
    {
        if($type == 'Act_update') {
            $act    =  Activity::find($id);
            $act    -> title      = $r->  title;
            $act    -> sub_title  = $r->  sub_title;
            $act    -> image      = $r->  image;
            $act    -> content    = $r->  content;
            $act    ->save();
            return back()->with('success','Update Success!');
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
    }
}
