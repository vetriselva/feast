 
@extends('layouts.admin-app')

@section('content')
@if ($data)
<button class="d-nones btn btn-primary mb-3 float-end print-btn rounded-pill shadow shadow-lg-hover" onclick="window.print()">
    <i class="fa fa-print text-white"></i>  Print
</button>
<div class="size-print">
    <div class="print-sheet" > 
        <div class="perpage">
            <div class="w-100">
                <div class="d-flex justify-content-between align-items-center mb-3 logo-header">
                    <div class="colx">
                        <img src="{{ asset("images/logo/text-logo.png") }}" width="220px"alt="">
                    </div>
                    <div class="colx">
                        <img src="{{ asset("images/logo/logo-sm.png") }}" width="200px" alt="">
                    </div>
                </div>
                <h1 class="text-center border-head heading-1">
                    {{ $data->packageName }}
                </h1>
                <div class="w-100">
                    <div class="d-flex justify-content-between align-items-center" style="padding:0.2rem 0.2rem;">
                        <div> <strong class="text-uppercase heading-3">{!! date('d M y', strtotime($data->itDate)) !!} </strong></div>
                        <div class="heading-3">Validity : <strong class="heading-3">{!! date('d M y', strtotime($data->itValidDate)) !!}</strong></div>
                    </div>
                    <div class="col-6 col-md-8">
                        <table class="table table-borderless">
                            <tr>
                                <td class="heading-3">Tour Name</td>
                                <td>:</td>
                                <td><strong class="heading-3"> {{ $data->placeToVisit }}</strong></td>
                            </tr>
                            <tr>
                                <td class="heading-3">Departure Name</td>
                                <td>:</td>
                                <td><strong class="heading-3">{!! date('d M y', strtotime($data->departureDate)) !!}  </strong></td>
                            </tr>
                            <tr>
                                <td class="heading-3">No.of Nights</td>
                                <td>:</td>
                                <td><strong class="heading-3">{{ $data->numOfNights - 1 }} Night  | {{ $data->numOfNights }} Days</strong></td>
                            </tr>
                            <tr class="heading-3">
                                <td>Room Type</td>
                                <td>:</td>
                                <td><strong class="heading-3">{{ $data->roomType }}</strong></td>
                            </tr>
                        </table>
                    </div>
                    <h1 class="text-center border-head heading-1">
                        {{ $data->subTitle }}
                    </h1>
                </div>
                <div class="text-center w-100 p-2">
                    <h1 class="text-center mb-3 h1 f-16 heading-2">ROUTE MAP</h1> 
                    <img src="{{ $data->routeMap }}"  alt="routemap" class="w-100 it-img" style="height:300px!important;object-fit: cover">
                </div>
            </div>
            
            
        </div> 
        <div class="perpage">
            <div class="w-100 logo-header">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="colx">
                        <img src="{{ asset("images/logo/text-logo.png") }}" width="220px"alt="">
                    </div>
                    <div class="colx">
                        <img src="{{ asset("images/logo/logo-sm.png") }}" width="200px" alt="">
                    </div>
                </div>
            </div>
            <div class="w-100">
                <h1 class="text-center  border-head heading-2">
                    FLIGHT DETAILS IN {{ $data->placeToVisit }} | {{ $data->FlightData->name }}
                </h1>
            </div>
            <div class="w-100 p-2">
                <img src="{{ $data->FlightData->image }}" alt="routemap" class="w-100 mb-3 it-img" style="height:300px!important;object-fit: cover">
            </div>
            <div class="text-centerx w-100">
                <table class="table m-0 table-bordered">
                    <thead class="bg-light">
                        <tr class="text-center">
                            <th class="heading-3 text-center">FROM</th>
                            <th class="heading-3 text-center">TO</th>
                            <th class="heading-3 text-center">FLIGHT</th>
                            <th class="heading-3 text-center">DATE</th>
                            <th class="heading-3 text-center">DEP</th>
                            <th class="heading-3 text-center">ARR</th>
                            <th class="heading-3 text-center">BAGGAGE</th>
                            <th class="heading-3 text-center">REFUNDABLE</th>
                            <th class="heading-3 text-center">MEALS</th>
                        </tr>
                    </thead>
                    <tbody> 
                        @foreach ($data->FlightsDeatils as $key => $it)
                            <tr>
                                <td class="text-center content-2">{{ $it->from }}</td>
                                <td class="text-center content-2">{{ $it->to }}</td>
                                <td class="text-center content-2">{{ $it->flight }}</td>
                                <td class="text-center content-2">{{ $it->date }}</td>
                                <td class="text-center content-2">{{ $it->dep }}</td>
                                <td class="text-center content-2">{{ $it->arr }}</td>
                                <td class="text-center content-2">{{ $it->bag }}</td>
                                <td class="text-center content-2">{{ $it->refound ==  '1' ? "YES" : "NO"}}</td>
                                <td class="text-center content-2">{{ $it->meals ==  '1' ? "YES" : "NO"}}</td>
                            </tr> 
                        @endforeach
                    </tbody>
                </table> 
            </div>                   
        </div> 
        <div class="perpage">
            {{-- <div class="w-100">
                <h1 class="text-center border-head  heading-2  ">
                    TOUR ITINERARY DAYS
                </h1> --}}
            @foreach ($data->Leaditinary as  $it)
           
            <div class="perpage">
                <div class="w-100 ">
                    <div class="d-flex justify-content-between align-items-center logo-header mb-3">
                        <div class="colx">
                            <img src="{{ asset("images/logo/text-logo.png") }}" width="220px"alt="">
                        </div>
                        <div class="colx">
                            <img src="{{ asset("images/logo/logo-sm.png") }}" width="200px" alt="">
                        </div>
                    </div> 
                </div>
                <div class="w-100"> 
                    <div class="row">
                        <div class="col-8 p-0">
                            <div><b class="heading-3">Day {{ $it->days }} : {{ $it->Activity->title }}</b></div>
                            <b class="heading-3">DAY ACTIVITY : {{ $it->Activity->sub_title }}</b>
                            <br>
                            <b class="heading-3">SightSeeing : </b>
                            @foreach ( $it->itineraryDayActivities as $itineraryDay)
                            <b class="heading-3">{{$itineraryDay->dayActivity->name}}</b>
                                @if(!$loop->last)
                                  ,  
                                @endif
                            @endforeach
                           
                        </div>
                        <div class="col-4 text-center">
                            <div class="btn-group">
                                <div class="btn  btn-light border position-relative btn-sm heading-3"><i class="fa fa-coffee me-1" aria-hidden="true"></i>Breakfast
                                    <span style="z-index: 1" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-{{ $it->breack ? "success" : "danger"}}">
                                        <i class="las la-{{ $it->breack ? "check" : "times"}} text-white"></i>
                                    </span>
                                </div>
                                <div class="btn btn-light border position-relative btn-sm heading-3"><i class="fa fa-shopping-basket me-1"></i></i>Lanch
                                    <span style="z-index: 1" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-{{ $it->lunch ? "success" : "danger"}} ">
                                        <i class="las la-{{ $it->lunch  ? "check" : "times"}} text-white"></i>
                                    </span>
                                </div>
                                <div class="btn btn-light border position-relative btn-sm heading-3"><i class="fa fa-cutlery me-1" aria-hidden="true"></i>Dinner
                                    <span style="z-index: 1" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-{{ $it->dinner ? "success" : "danger"}}">
                                        <i class="las la-{{ $it->dinner ? "check" : "times"}} text-white"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center w-100 my-3 p-2">
                    <img src="{{ $it->Activity->image }}" alt="routemap" class="w-100 it-img" style="height:300px!important;object-fit: cover">
                </div>
                <div class="w-100">
                    <p class="content-1">{{ $it->Activity->content }}</p>
                </div>
                <div class="w-100">
                    <div class="row">
                        <div class="col-8 p-0">
                            @if (!empty($it->others))
                                <div class="heading-4"><b>Notes</b> : {{ $it->others }}</div>
                            @endif
                        </div>
            
                        <div class="col-4">
                            <div class="btn-group">
                                <div class="btn btn-light  border position-relative btn-sm heading-3"><i class="fa fa-car me-1" aria-hidden="true"></i>Transfers
                                    <span style="z-index: 1" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-{{ $it->Transfers == 'Included' ? "success" : "danger"}}">
                                        <i class="las la-{{ $it->Transfers == 'Included' ? "check" : "times"}} text-white"></i>
                                    </span>
                                </div>
                                <div class="btn btn-light border position-relative btn-sm heading-3"><i class="fa fa-ticket me-1"></i></i>Tickets
                                    <span style="z-index: 1" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-{{ $it->Tickets == 'Included' ? "success" : "danger"}} ">
                                        <i class="las la-{{ $it->Tickets == 'Included' ? "check" : "times"}} text-white"></i>
                                    </span>
                                </div> 
                            </div> 
                        </div>
                        <div class="col-12 p-0">
                            <h1 class="heading-3">END OF SERVICE</h1>
                        </div>
                    </div>  
                </div> 
        </div>

            @endforeach 
        </div>
         
        <div class="perpage">
            <div class="w-100">
                <div class="d-flex justify-content-between align-items-center mb-3 logo-header">
                    <div class="colx">
                        <img src="{{ asset("images/logo/text-logo.png") }}" width="220px"alt="">
                    </div>
                    <div class="colx">
                        <img src="{{ asset("images/logo/logo-sm.png") }}" width="200px" alt="">
                    </div>
                </div>
                <h1 class="text-center  border-head heading-3 ">
                    Hotel Details
                </h1>
            </div>
            <div class="w-100 my-3">
                <div class="row m-0 justify-content-center">
                    @foreach ($data->HotalsDeatils as $hot)
                        <div class="col-4 p-2">
                            <img src="{{ $hot->HotelData->image }}" class="w-100 it-img" style="height: 200px;object-fit:cover">
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="w-100">
                <table class="table table-bordered">
                    <tr>
                        <th class="heading-3 text-center">OPTION</th>
                        <th class="heading-3 text-center">CITY</th>
                        <th class="heading-3 text-center">HOTEL</th>
                        <th class="heading-3 text-center">ROOM TYPE</th>
                        <th class="heading-3 text-center">NIGHTS</th>
                        <th class="heading-3 text-center">REATINGS</th>
                    </tr>
                    @foreach ($data->HotalsDeatils as $hot)
                        <tr>
                            <td class="text-center content-2">Option {{ $hot->HotelOptionNumber }}</td>
                            <td class="text-center content-2">{{ $hot->HotelData->name }}</td>
                            <td class="text-center content-2">{{ $hot->city }}</td>
                            <td class="text-center content-2">{{ $hot->hotal_room_type }}</td>
                            <td class="text-center content-2">{{ $hot->hotal_night }}</td>
                            <td class="text-center content-2">{{ $hot->hotal_night }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="perpage">
            <div class="w-100">
                <div class="d-flex justify-content-between align-items-center mb-3 logo-header">
                    <div class="colx">
                        <img src="{{ asset("images/logo/text-logo.png") }}" width="220px"alt="">
                    </div>
                    <div class="colx">
                        <img src="{{ asset("images/logo/logo-sm.png") }}" width="200px" alt="">
                    </div>
                </div>
                <h1 class="text-center  heading-3  border-head">
                    Cost Details
                </h1>
            </div>
            <div class="w-100">
                <table class="table table-bordered">
                    <tr>
                        <th class="text-center heading-3">OPTION</th>
                        <th class="text-center heading-3">Cost Type</th>
                        <th class="text-center heading-3">Members</th>
                        <th class="text-center heading-3">Total</th>
                    </tr>
                    @php
                        $count = 0;
                    @endphp
                    @foreach ($data->CostDeatils as $key => $cost)
                        <tr>
                            <td class="text-center content-1">Option {{ $cost->optionNumber }}</td>
                            <td class="text-center content-1">{{ $cost->costingFor }}</td>
                            <td class="text-center content-1">{{ $cost->members }}</td>
                            <td class="text-center content-1"><span class="text-danger"> ₹{{ $cost->costTotals ?? 0 }}</span></td>
                        </tr>
                    @endforeach
                    @php
                        $totalCost = 0;
                        if(isset($data->CostDeatils) ) {
                            foreach ($data->CostDeatils as $key => $cost) {
                                if($cost->costTotals != '' && !is_null($cost->costTotals)) {
                                    $totalCost += $cost->costTotals;
                                }
                            }
                        }      
                    @endphp
                  <b class="d-none">{{ $totalCost }}</b>
                </table> 
                <h1 class="heading-3">PACKAGE COST PER COUPLE  - <span class="text-danger"> ₹ {{ $totalCost }}.</span></h1>
            </div>
        </div>
        <div class="perpage justify-content-arounded ">
            <div class="w-100">
                <h3 class="text-center border-head heading-2"> Package Inclusions </h3>
                <ul>
                    @if (!empty($packInclusions))
                        @foreach ($packInclusions as $packInclusion)
                        <li class="content-1">{{ $packInclusion->point }}</li>
                        @endforeach 
                    @endif 
                </ul>
                <h3 class="text-center heading-2 border-head"> Package Exclusions </h3>
                <ul>
                    @if (!empty($packInclusions))
                        @foreach ($packExclusions as $packExclusion)
                        <li  class="content-1">{{ $packExclusion->point }}</li>
                        @endforeach 
                   @endif
                </ul>
            </div>
        </div>
        <div class="perpage justify-content-arounded ">
            <div class="w-100">
                <h3 class="text-center border-head heading-2"> Package Inclusions </h3>
                <ul>
                    @if (!empty($packInclusions))
                        @foreach ($packInclusions as $packInclusion)
                        <li class="content-1">{{ $packInclusion->point }}</li>
                        @endforeach 
                    @endif 
                </ul>
                <h3 class="text-center heading-2 border-head"> Package Exclusions </h3>
                <ul>
                    @if (!empty($packInclusions))
                        @foreach ($packExclusions as $packExclusion)
                        <li  class="content-1">{{ $packExclusion->point }}</li>
                        @endforeach 
                   @endif
                </ul>
            </div>
        </div>

    </div>
</div>
@else
    No Records found 
@endif
@endsection
 