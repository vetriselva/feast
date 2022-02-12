 
@extends('layouts.admin-app')

@section('content')
@if ($data)
<button class="d-nones btn btn-primary mb-3 float-end print-btn rounded-pill shadow shadow-lg-hover" onclick="window.print()">
    <i class="fa fa-print text-white"></i>  Print
</button>
<div class="size-print">
    <div class="print-sheet" > 
        <div class="perpage justify-content-start">
            <div class="w-100">
                <div class="d-flex justify-content-between align-items-center mb-3 logo-header">
                    <div class="colx">
                        <img src="{{ asset("images/logo/text-logo.png") }}" width="220px"alt="">
                    </div>
                    <div class="colx">
                        <img src="{{ asset("images/logo/logo-sm.png") }}" width="200px" alt="">
                    </div>
                </div>
                <h1 class="text-center border-head heading-1" >
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
                                <td style="padding: 0 !important"  class="heading-s3">Tour Name</td>
                                <td style="padding: 0 !important" >:</td>
                                <td style="padding: 0 !important" ><strong class="heading-3"> {{ $data->placeToVisit }}</strong></td>
                            </tr>
                            <tr>
                                <td style="padding: 0 !important"  class="heading-3s">Departure Name</td>
                                <td style="padding: 0 !important" >:</td>
                                <td style="padding: 0 !important" ><strong class="heading-3">{!! date('d M y', strtotime($data->departureDate)) !!}  </strong></td>
                            </tr>
                            <tr>
                                <td style="padding: 0 !important"  class="heading-3s">No.of Nights</td>
                                <td style="padding: 0 !important" >:</td>
                                <td style="padding: 0 !important" ><strong class="heading-3">{{ $data->numOfNights - 1 }} Night  | {{ $data->numOfNights }} Days</strong></td>
                            </tr>
                            <tr >
                                <td style="padding: 0 !important" >Room Type</td>
                                <td style="padding: 0 !important" >:</td>
                                <td style="padding: 0 !important" ><strong class="heading-3">{{ $data->roomType }}</strong></td>
                            </tr>
                        </table>
                    </div>
                    <h1 class="text-center border-head heading-1">
                        {{ $data->subTitle }}
                    </h1>
                </div>
                <div class="text-center w-100 p-2">
                    <h1 class="text-center mb-3 h1 f-16 heading-2">ROUTE MAP</h1> 
                    <img src="{{ $data->routeMap }}"  alt="routemap" class="w-100 rounded shadow" style="height:350px!important;object-fit: cover">
                </div>
            </div>
            
            
        </div> 
        <div class="perpage  justify-content-start">
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
            <div class="w-100 my-3">
                <h1 class="text-center border-head m-0 heading-2">
                    FLIGHT DETAILS IN {{ $data->placeToVisit }} | {{ $data->FlightData->name }}
                </h1>
            </div>
            <div class="w-100 p-2 mb-3">
                <img src="{{ $data->FlightData->image }}" alt="routemap"class="w-100 rounded shadow" style="height:250px!important;object-fit: cover">
            </div>
            <div class="text-centerx w-100">
                <table class="table m-0 table-bordered">
                    <thead class="bg-green">
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
                            <tr >
                                <td class="text-center content-2">{{ $it->from }}</td>
                                <td class="text-center content-2">{{ $it->to }}</td>
                                <td class="text-center content-2">{{ $it->flight }}</td>
                                <td class="text-center content-2"> {!! date('d M y', strtotime($it->date)) !!} </td>
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
        <div class="perpage justify-content-start">
            {{-- <div class="w-100">
                <h1 class="text-center border-head  heading-2  ">
                    TOUR ITINERARY DAYS
                </h1> --}}
            @foreach ($data->Leaditinary as  $it)
           
            <div class="perpage justify-content-start">
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
                        <div class="col-12  ">
                            <div><b class="heading-3">Day {{ $it->days }} : {{ $it->Activity->title }}</b></div>
                            <b class="heading-3">DAY ACTIVITY : {{ $it->Activity->sub_title }}</b>
                        </div> 
                    </div>
                </div>
                <div class="row m-0">
                    @foreach ($it->itineraryDayActivities as $itineraryDay)
                    <div class="col">
                        <div class="text-center w-100 my-3 p-0">
                            <img src="{{ $itineraryDay->dayActivity->image }}" alt="routemap" class="w-100 rounded shadow" style="height:300px!important;object-fit: cover">
                        </div>
                        <div class="w-100">
                            <p class="content-1" style="text-align: justify">{{ $itineraryDay->dayActivity->content }}</p>
                        </div>
                    </div>
                @endforeach
                </div>
                <div class="w-100">
                    <div class="row "> 
                        <div class="col-12 text-center mt-3 mb-3">
                            <div class="btn-group">
                                <div class="btn me-3 btn-light border position-relative btn-sm heading-3"><i class="fa fa-coffee me-1" aria-hidden="true"></i>Breakfast
                                    <span style="z-index: 1" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-{{ $it->breack ? "success" : "danger"}}">
                                        <i class="las la-{{ $it->breack ? "check" : "times"}} text-white"></i>
                                    </span>
                                </div>
                                <div class="btn me-3 btn-light border position-relative btn-sm heading-3"><i class="fa fa-shopping-basket me-1"></i></i>Lanch
                                    <span style="z-index: 1" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-{{ $it->lunch ? "success" : "danger"}} ">
                                        <i class="las la-{{ $it->lunch  ? "check" : "times"}} text-white"></i>
                                    </span>
                                </div>
                                <div class="btn me-3 btn-light border position-relative btn-sm heading-3"><i class="fa fa-cutlery me-1" aria-hidden="true"></i>Dinner
                                    <span style="z-index: 1" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-{{ $it->dinner ? "success" : "danger"}}">
                                        <i class="las la-{{ $it->dinner ? "check" : "times"}} text-white"></i>
                                    </span>
                                </div> 
                                <div class="btn me-3 btn-light  border position-relative btn-sm heading-3"><i class="fa fa-car me-1" aria-hidden="true"></i>Transfers
                                    <span style="z-index: 1" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-{{ $it->Transfers == 'Included' ? "danger" : "success"}}">
                                        <i class="las la-{{ $it->Transfers ? "check" : "times"}} text-white"></i>
                                    </span>
                                </div>
                                <div class="btn me3 btn-light border position-relative btn-sm heading-3"><i class="fa fa-ticket me-1"></i></i>Tickets
                                    <span style="z-index: 1" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-{{ $it->Tickets == 'Included' ? "success" : "danger"}} ">
                                        <i class="las la-{{ $it->Tickets  ? "check" : "times"}} text-white"></i>
                                    </span>
                                </div> 
                            </div> 
                        </div>
                        <div class="col-12 mb-3 p-0">
                            @if (!empty($it->others))
                                <div class="heading-4"><b>Notes</b> : {{ $it->others }}</div>
                            @endif
                        </div>
                        <div class="col-12 p-0">
                            <h1 class="heading-3">END OF SERVICE</h1>
                        </div>
                    </div>  
                </div> 
            </div>

            @endforeach 
        </div>
         
        <div class="w-100"> 
            @foreach ($hotelDetails  as $key => $hotels)
                <div class="perpage justify-content-start">
                    <div class="w-100">
                        <div class="d-flex justify-content-between align-items-center mb-3 logo-header">
                            <div class="colx">
                                <img src="{{ asset("images/logo/text-logo.png") }}" width="220px"alt="">
                            </div>
                            <div class="colx">
                                <img src="{{ asset("images/logo/logo-sm.png") }}" width="200px" alt="">
                            </div>
                        </div>
                        <h1 class="text-center border-head heading-3 ">
                            Hotel Details 
                        </h1>
                    <h1 class="text-center mb-3 h1 f-16 heading-2">Option {{$key ?? ''}}</h1> 

                    </div>
                   
                    <div class="row mb-3 justify-content-center">
                        @foreach ($hotels as  $hot)
                            <div class="col-6">
                                <div class="heading-3 text-center">{{$hot->HotelData->name}}</div>
                                <img src="{{ $hot->HotelData->image }}" class="w-100  rounded shadow my-2" style="height: 200px;object-fit:cover">
                            </div>
                        @endforeach
                    </div>
                    <div class="w-100">
                        <table class="table table-bordered">
                            <tr class="bg-green">
                                <th class="heading-3 text-center">CITY</th>
                                <th class="heading-3 text-center">HOTEL</th>
                                <th class="heading-3 text-center">ROOM TYPE</th>
                                <th class="heading-3 text-center">NIGHTS</th>
                                <th class="heading-3 text-center">REATINGS</th>
                            </tr>
                            @foreach ($hotels as $hot)
                                <tr>
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
            @endforeach
        </div>
        <div class="perpage  justify-content-start">
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
            @foreach ($costDeatils as $key => $costDeatil)
                <div class="w-100">
                    <h5> Option {{$key ?? ''}} </h5>
                    <table class="table table-borderless b">
                        <tr>
                            <th class="text-center heading-3">Cost Type</th>
                            <th class="text-center heading-3">Members</th>
                            <th class="text-center heading-3">Total</th>
                        </tr>
                        @php
                            $count = 0;
                        @endphp
                        @foreach ($costDeatil as $key => $cost)
                            <tr>
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
                    <h1 class="heading-3 text-end">PACKAGE COST PER COUPLE  - <span class="text-danger"> ₹ {{ $totalCost }}.</span></h1>
                </div>
            @endforeach
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
                <h3 class="text-center border-head heading-2"> PAYMENT POLICY </h3>
                <ul>
                    @if (!empty($paymentPolicies))
                        @foreach ($paymentPolicies as $paymentPolicy)
                        <li class="content-1">{{ $paymentPolicy->point }}</li>
                        @endforeach 
                    @endif 
                </ul>
                <h3 class="text-center heading-2 border-head"> REFUND POLICY </h3>
                <ul>
                    @if (!empty($refundPolicies))
                        @foreach ($refundPolicies as $refundPolicy)
                        <li  class="content-1">{{ $refundPolicy->point }}</li>
                        @endforeach 
                   @endif
                </ul>
                <h3 class="text-center heading-2 border-head"> CANCELLATION POLICY </h3>
                <ul>
                    @if (!empty($cancelPolicies))
                        @foreach ($cancelPolicies as $cancelPolicy)
                        <li  class="content-1">{{ $cancelPolicy->point }}</li>
                        @endforeach 
                   @endif
                </ul>
                <div class="w-100">
                    <h3 class="text-center border-head heading-2"> Bank Details </h3>
                    <ul class="list-style-none">
                        <li>
                            Bank Name - {{$configs->bank_name}} 
                        </li>
                        <li>
                            Account Holder Name - {{$configs->account_holder_name}}
                        </li>
                        <li>
                            Account Number - {{$configs->account_number}}
                        </li>
                        <li>
                            Branch Name - {{$configs->branch_name}}
                        </li><li>
                            IFSC Code - {{$configs->ifsc_code}}
                        </li>
            
                    </ul>
                </div>
            </div>
        </div> 
    </div>
</div>
@else
    No Records found 
@endif

@endsection
 