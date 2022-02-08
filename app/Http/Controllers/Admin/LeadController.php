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
use App\Models\Admin\DayActivity;
use App\Models\Admin\HotelData;
use App\Models\Admin\ItineraryDayactivity;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        $hotels = HotelData::all();
        $act =  Activity::all();
        return view("admin.lead.create-lead",compact('act','hotels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $r = Json_decode(Json_encode($request->input('data')));
        $data   =   Leads::create([
            'leadNumber'        => $r->leadNumber,
            'subTitle'          => $r->subTitle,
            'packageName'       => $r->packageName,
            'placeToVisit'      => $r->placeToVisit,
            'itDate'            => $r->itineraryDate,
            'itValidDate'       => $r->validDate,
            'departureDate'     => $r->departureDate,
            'numOfNights'       => $r->numofNights,
            'flight_id'         => 1,
            'roomType'          => $r->roomType,
            'costingNotes'      => $r->costingNote,
            // 'routeMap'          => $RouteMap ?? "https://res.cloudinary.com/dkgkk5wua/image/upload/v1643536228/fgoxaxhtl9i4hqck6mjb.png",
            'pack_includs'      => json_encode($r->inclusionPolicy),
            'pack_excluds'      => json_encode($r->exclusionpolicy),
            'payment_poly'      => json_encode($r->paymentPolicy),
            'refound_poly'      => json_encode($r->refundPolicy),
            'cancle_poly'       => json_encode($r->cancelPolicy),
        ]);
      
        foreach($r->itineraryDetail as $key => $itinerary){
            // Log::info(json_encode( $itinerary));
            $itineraryObj = $data->LeadItinary()->create([
                'activity_id'   => $itinerary->Activity  ?? "", 
                // 'DayActivity'   => $itinerary->DayActivity  ?? "", 
                'PlacesName'    => $itinerary->PlaceName ?? "",
                'Transfers'     => $itinerary->Transfers ?? "",
                'breack'        => $itinerary->Meals->breack ?? "",
                'lunch'         => $itinerary->Meals->lunch ?? "",
                'dinner'        => $itinerary->Meals->dinner ?? "",
                'others'        => $itinerary->others ?? "",
                'Tickets'       => $itinerary->Tickets ?? "",
                'days'          => $itinerary->DayCount ?? "",
            ]);
            if(!empty($itinerary->DayActivity)) {
                foreach($itinerary->DayActivity as $dayActivity){
                    $itineraryObj->itineraryDayActivities()->create(['dayactivity_id' => $dayActivity]);
                }
            }
        }

        foreach($r->flightDetail as $key => $flight){
            // Log::info(json_encode( $flight));
            $data->FlightsDeatils()->create([
                'from'      => $flight->from ?? "" ,
                'to'        => $flight->to  ?? "",
                'flight'    => $flight->flight  ?? "",
                'date'      => $flight->date  ?? "",
                'dep'       => $flight->dep  ?? "",
                'arr'       => $flight->arr  ?? "",
                'bag'       => $flight->bag  ?? "",
                'refound'   => $flight->refound  ?? "",
                'meals'    => $flight->meals ?? "",
            ]);
        }
        foreach($r->hotelDetail as $key => $hotels){
            // Log::info(json_encode( $flight));
            foreach($hotels->Details as $opton => $hotel){
                $data->HotalsDeatils()->create([
                    'city'              => $hotel->city ?? "", 
                    'hotel_id'          => $hotel->hotel ?? "",
                    'hotal_room_type'   => $hotel->hotalRoomType  ?? "",
                    'star_ratings'      => $hotel->starRating ?? "" ,
                    'hotal_night'       => $hotel->hotalNight  ?? "",
                    'HotelOptionNumber' => $key + 1?? "",
                ]);
            }
        }

        foreach($r->costDetails as $key => $costcostDetail){
            foreach($costcostDetail->Details as $option => $cost){
                $data->CostDeatils()->create([
                    'optionNumber'  => $option + 1 ?? "", 
                    'costingFor'    => $cost->costTitle  ?? "",
                    'members'       => $cost->member ?? "",
                    'costTotals'    => $cost->costTotal ?? "",
                ]);
            }
        }
        return response(['status' => true, 'id' => $data->id]);
    }


    public function storeRouteMap(Request $request)
    {
        return $RouteMap = cloudinary()->upload($request->file('RouteMap',["folder" => "VecationFeast","public_id" => "v1642953803"])->getRealPath())->getSecurePath(); 
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
        $hotelDetails = Collect($data->HotalsDeatils)->groupBy('HotelOptionNumber');
        $costDeatils = Collect($data->CostDeatils)->groupBy('optionNumber');
        $paymentPolicies = PaymentPolicy::find( json_decode($data->payment_poly));
        $refundPolicies = RefoundPolicy::find( json_decode($data->refound_poly));
        $cancelPolicies = CanclePolicy::find( json_decode($data->cancle_poly));
        $packInclusions = PackageInclusions::find( json_decode($data->pack_includs));
        $packExclusions = PackageExclusions::find( json_decode($data->pack_excluds));
        return view("admin.lead.show-lead",compact('data','hotelDetails', 'costDeatils','paymentPolicies', 'refundPolicies','cancelPolicies','packInclusions','packExclusions'));
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
