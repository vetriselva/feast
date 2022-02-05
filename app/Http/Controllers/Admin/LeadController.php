<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Leads;
use App\Models\Admin\PackageInclusions;
use App\Models\Admin\PackageExclusions;
use App\Models\Admin\PaymentPolicy;
use App\Models\Admin\RefoundPolicy;
use App\Models\Admin\CanclePolicy;
use App\Models\Admin\Activity;

use Illuminate\Support\Facades\DB;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
    $data =  Leads::with("LeadItinary")->latest()->get();
            return view("admin.lead.lead", compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pack_in =  PackageInclusions::all();
        $pack_ex =  PackageExclusions::all();
        $pay_poly =  PaymentPolicy::all();
        $refo_poly =  RefoundPolicy::all();
        $can_poly =  CanclePolicy::all();
        $act =  Activity::all();
        return view("admin.lead.create-lead",compact('pack_in','pack_ex','pay_poly','refo_poly','can_poly','act'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        // dd($r->all());   
        if($r->RouteMap) {
            $RouteMap = cloudinary()->upload($r->file('RouteMap',["folder" => "VecationFeast","public_id" => "v1642953803"])->getRealPath())->getSecurePath(); 
        }
        
        $data   =   Leads::create([
            'leadNumber'        => $r->leadNumber,
            'subTitle'          => $r->subTitle,
            'packageName'       => $r->packageName,
            'placeToVisit'      => $r->placeToVisit,
            'itDate'            => $r->itDate,
            'itValidDate'       => $r->itValidDate,
            'departureDate'     => $r->departureDate,
            'numOfNights'       => $r->numOfNights,
            'flight_id'         => $r->flight_id,
            'roomType'          => $r->roomType,
            'costingNotes'      => $r->costingNotes,
            'routeMap'          => $RouteMap ?? "https://res.cloudinary.com/dkgkk5wua/image/upload/v1643536228/fgoxaxhtl9i4hqck6mjb.png",
            'pack_includs'      => json_encode($r->pack_includs),
            'pack_excluds'      => json_encode($r->pack_excluds)
        ]);

        foreach($r->Activity as $key => $request_a){
            $data->LeadItinary()->create([
                'activity_id'   => $r->Activity[$key]  ?? "", 
                'DayActivity'   => $r->DayActivity[$key]  ?? "", 
                'PlacesName'    => $r->PlacesName[$key]  ?? "",
                'Transfers'     => $r->Transfers[$key] ?? "",
                'breack'        => $r->breack[$key] ?? "",
                'lunch'         => $r->lunch[$key] ?? "",
                'dinner'        => $r->dinner[$key] ?? "",
                'others'        => $r->others[$key] ?? "",
                'Tickets'       => $r->Tickets[$key] ?? "",
                'days'          => $key+1
            ]);
        }

        foreach($r->from as $key => $request_b){
            $data->FlightsDeatils()->create([
                'from'      => $r->from[$key] ?? "" ,
                'to'        => $r->to[$key]  ?? "",
                'flight'    => $r->flight[$key]  ?? "",
                'date'      => $r->date[$key]  ?? "",
                'dep'       => $r->dep[$key]  ?? "",
                'arr'       => $r->arr[$key]  ?? "",
                'bag'       => $r->bag[$key]  ?? "",
                'refound'   => $r->refound[$key]  ?? "",
                'meals'     => $r->meals[$key] ?? "",
            ]);
        }
        foreach($r->city as $key => $request_c){
            $data->HotalsDeatils()->create([
                'city'              => $r->city[$key] ?? "", 
                'hotel_id'          => $r->hotel_id[$key]  ?? "",
                'hotal_room_type'   => $r->hotal_room_type[$key]  ?? "",
                'star_ratings'      => $r->star_ratings[$key] ?? "" ,
                'hotal_night'       => $r->hotal_night[$key]  ?? "",
                'HotelOptionNumber' => $r->HotelOptionNumber[$key]  ?? "",
            ]);
        }

        foreach($r->optionNumber as $key => $request_d){
            $data->CostDeatils()->create([
                'optionNumber'  => $r->optionNumber[$key] ?? "", 
                'costingFor'    => $r->costingFor[$key]  ?? "",
                'members'       => $r->members[$key]  ?? "",
                'costTotals'    => $r->costTotals[$key]  ?? "",
            ]);
        }

        // echo("ok");
        return back()->with('success','Item created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data =  Leads::with("LeadItinary", "LeadItinary.Activity")
                        ->with("FlightData")
                        ->with("FlightsDeatils")
                        ->with("HotalsDeatils", "HotalsDeatils.HotelData")
                        ->with("CostDeatils")
                        ->find($id);
        return view("admin.lead.show-lead",compact('data', $data));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pack_in    =  PackageInclusions::all();
        $pack_ex    =  PackageExclusions::all();
        $pay_poly   =  PaymentPolicy::all();
        $refo_poly  =  RefoundPolicy::all();
        $can_poly   =  CanclePolicy::all();
        $act        =  Activity::all();
        $data =  Leads::with("LeadItinary", "LeadItinary.Activity")
                        ->with("FlightData")
                        ->with("FlightsDeatils")
                        ->with("HotalsDeatils", "HotalsDeatils.HotelData")
                        ->with("CostDeatils")
                        ->find($id);
        return view("admin.lead.edit",compact('data','pack_in','pack_ex','pay_poly','refo_poly','can_poly','act'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data =  Leads::with("LeadItinary", "LeadItinary.Activity")
                    ->with("FlightData")
                    ->with("FlightsDeatils")
                    ->with("HotalsDeatils", "HotalsDeatils.HotelData")
                    ->with("CostDeatils")
                    ->find($id);
        $data ->delete();
        return back()->with('success','Item deleted successfully!');
    }
}
