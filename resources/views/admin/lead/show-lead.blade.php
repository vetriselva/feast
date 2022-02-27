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
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="colx">
                                <img src="{{ asset("images/logo/logo-sm.png") }}" width="230px" alt="">
                            </div>
                            <div class="colx">
                                <img src="{{ asset("images/logo/text-logo.png") }}" width="300px"alt="">
                            </div>
                        </div> 
                        <div class="w-100">
                            <h1 class="text-center border-head heading-1 m-0" >
                                {{ $data->packageName }}
                            </h1>
                            <div class="d-flex justify-content-between align-items-center">
                                <div> <strong class="text-uppercase heading-3">{!! date('d M y', strtotime($data->itDate)) !!} </strong></div>
                                <div class="heading-3">Validity : <strong class="heading-3">{!! date('d M y', strtotime($data->itValidDate)) !!}</strong></div>
                            </div>
                            <div class="col">
                                <table class="table table-borderless m-0">
                                    <tr>
                                        <td width="130px" style="color:black !important;padding: 0 !important; font-weight:normal !important"  class="text-uppercase heading-3">Tour Name</td>
                                        <td style="padding: 0 !important">:</td>
                                        <td style="padding: 0 !important"><strong class="heading-3"> {{ $data->placeToVisit }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td width="130px" style="color:black !important;padding: 0 !important; font-weight:normal !important"  class="text-uppercase heading-3">Departure Name</td>
                                        <td style="padding: 0 !important">:</td>
                                        <td style="padding: 0 !important"><strong class="heading-3">{!! date('d M y', strtotime($data->departureDate)) !!}  </strong></td>
                                    </tr>
                                    <tr>
                                        <td width="130px" style="color:black !important;padding: 0 !important; font-weight:normal !important"  class="text-uppercase heading-3">No.of Nights</td>
                                        <td style="padding: 0 !important">:</td>
                                        <td style="padding: 0 !important"><strong class="heading-3">{{ $data->numOfNights - 1 }} Night  | {{ $data->numOfNights }} Days</strong></td>
                                    </tr>
                                    <tr >
                                        <td width="130px" style="color:black !important;padding: 0 !important; font-weight:normal !important" class="text-uppercase heading-3">Room Type</td>
                                        <td style="padding: 0 !important">:</td>
                                        <td style="padding: 0 !important"><strong class="heading-3">{{ $data->roomType }}</strong></td>
                                    </tr>
                                </table>
                            </div>
                            <h2 class="text-center border-head-two  heading-3 m-0">
                                {{ $data->subTitle }}
                            </h2>
                        </div>
                        <div class="text-center w-100 p-0  "> 
                            <h1 class="text-center mb-3 mt-5 h1 mb-42f-16 heading-1"><u>ROUTE MAP</u></h1>
                            <img src="{{ $data->routeMap }}"  alt="routemap" class="w-100 rounded" style="max-height:450px!important;object-fit: cover">
                        </div> 
                    </div>
                </div> 
                <div class="perpage  justify-content-start">
                    <div class="w-100 logo-header">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="colx">
                                <img src="{{ asset("images/logo/logo-sm.png") }}" width="230px" alt="">
                            </div>
                            <div class="colx">
                                <img src="{{ asset("images/logo/text-logo.png") }}" width="300px"alt="">
                            </div>
                        </div>
                    </div>
                    <div class="w-100 my-3">
                        <h1 class="text-center m-0 heading-2">
                            FLIGHT DETAILS IN {{ $data->placeToVisit }} | {{ $data->FlightData->name }}
                        </h1>
                    </div>
                    <div class="w-100 p-2 mb-3">
                        <img src="{{ $data->FlightData->image }}" alt="routemap"class="w-100 p-2 py-3" style="height:400px!important;object-fit: cover">
                    </div>
                    <div class="text-centerx w-100 p-2">
                        <table class="table m-0 table-bordered">
                            <thead class="bg-green">
                                <tr class="text-center">
                                    <th class="heading-3 p-2 text-center">FROM</th>
                                    <th class="heading-3 p-2 text-center">TO</th>
                                    <th class="heading-3 p-2 text-center">FLIGHT</th>
                                    <th class="heading-3 p-2 text-center">DATE</th>
                                    <th class="heading-3 p-2 text-center">DEP</th>
                                    <th class="heading-3 p-2 text-center">ARR</th>
                                    <th class="heading-3 p-2 text-center"><small>BAGGAGE</small></th>
                                    <th class="heading-3 p-2 text-center"><small>REFUNDABLE</small></th>
                                    <th class="heading-3 p-2 text-center"><small>MEALS</small></th>
                                </tr>
                            </thead>
                            <tbody> 
                                @foreach ($data->FlightsDeatils as $key => $it)
                                    <tr >
                                        <td class="text-center p-2 content-1">{{ $it->from }}</td>
                                        <td class="text-center p-2 content-1">{{ $it->to }}</td>
                                        <td class="text-center p-2 content-1">{{ $it->flight }}</td>
                                        <td class="text-center p-2 content-1"> {!! date('d M y', strtotime($it->date)) !!} </td>
                                        <td class="text-center p-2 content-1">{{ $it->dep }}</td>
                                        <td class="text-center p-2 content-1">{{ $it->arr }}</td>
                                        <td class="text-center p-2 content-1">{{ $it->bag }}</td>
                                        <td class="text-center p-2 content-1">{{ $it->refound ==  '1' ? "YES" : "NO"}}</td>
                                        <td class="text-center p-2 content-1">{{ $it->meals ==  '1' ? "YES" : "NO"}}</td>
                                    </tr> 
                                @endforeach
                            </tbody>
                        </table> 
                    </div>                   
                </div> 
                <div class="perpage justify-content-start">
                    @foreach ($data->Leaditinary as  $it)
                
                        <div class="perpage justify-content-start">
                            <div class="w-100 ">
                                <div class="d-flex justify-content-between align-items-center logo-header mb-3">
                                    <div class="colx">
                                        <img src="{{ asset("images/logo/logo-sm.png") }}" width="230px" alt="">
                                    </div>
                                    <div class="colx">
                                        <img src="{{ asset("images/logo/text-logo.png") }}" width="300px"alt="">
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
                                </div>  
                            </div> 
                        </div>

                    @endforeach 
                    <h1 class="heading-3">END OF SERVICE</h1>
                </div>
                
                <div class="w-100"> 
                    @foreach ($hotelDetails  as $key => $hotels)
                        <div class="perpage justify-content-start">
                            <div class="w-100">
                                <div class="d-flex justify-content-between align-items-center mb-3 logo-header">
                                    <div class="colx">
                                        <img src="{{ asset("images/logo/logo-sm.png") }}" width="230px" alt="">
                                    </div>
                                    <div class="colx">
                                        <img src="{{ asset("images/logo/text-logo.png") }}" width="300px"alt="">
                                    </div>
                                </div>
                                <h1 class="text-center heading-3 ">
                                    Hotel Details 
                                </h1>
                            <h1 class="text-center mb-3 h1 f-16 heading-2">Option {{$key ?? ''}}</h1> 

                            </div>
                        
                            <div class="row mb-3 justify-content-center">
                                @foreach ($hotels as  $hot)
                                    <div class="col-6">
                                        <div class="heading-3 text-center">{{$hot->HotelData->name}}</div>
                                        <img src="{{ $hot->HotelData->image }}" class="w-100  rounded shadow my-2" style="height: 230px;object-fit:cover">
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
                                <img src="{{ asset("images/logo/logo-sm.png") }}" width="230px" alt="">
                            </div>
                            <div class="colx">
                                <img src="{{ asset("images/logo/text-logo.png") }}" width="300px"alt="">
                            </div>
                        </div>
                        <h1 class="text-center heading-3">
                            Cost Details
                        </h1>
                    </div>
                    @foreach ($costDeatils as $key => $costDeatil)
                        <div class="w-100">
                            <h5> <u>Option {{$key ?? ''}}</u> </h5>
                            <div class="col-md-8 mx-auto">
                                <table class="table table-borderless b">
                                    {{-- <tr>
                                        <th class="text-center heading-3">Cost Type</th>
                                        <th class="text-center heading-3">Members</th>
                                        <th class="text-center heading-3">Total</th>
                                    </tr> --}}
                                    {{-- @php
                                        $count = 0;
                                    @endphp --}}
                                    @foreach ($costDeatil as $key => $cost)
                                        <tr>
                                            <td class="text-center content-1"><b>{{ $cost->costingFor }}</b></td>
                                            <td class="text-center content-1"><b>{{ $cost->members }}</b></td>
                                            <td class="text-center content-1"><span class="text-danger"> <b class="text-danger">₹{{ $cost->costTotals ?? 0 }}</b></span></td>
                                        </tr>
                                    @endforeach
                                    @php
                                        $totalCost = 0;
                                            foreach ($costDeatil as $key => $cost) {
                                                if($cost->costTotals != '' && !is_null($cost->costTotals)) {
                                                    $totalCost += $cost->costTotals ;
                                                }
                                            }
                                    @endphp
                                    
                                </table> 
                            </div>
                            <h1 class="heading-3 text-end">PACKAGE COST PER COUPLE  - <span class="text-danger"> ₹ {{ $totalCost }}.</span></h1>
                        </div>
                    @endforeach
                </div>
                <div class="perpage justify-content-arounded ">
                    <div class="w-100">
                        <h3 class="text-center heading-2"> Package Inclusions </h3>
                        <ul>
                            @if (!empty($packInclusions))
                                @foreach ($packInclusions as $packInclusion)
                                <li class="content-1">{{ $packInclusion->point }}</li>
                                @endforeach 
                            @endif 
                        </ul>
                        <h3 class="text-center heading-2 "> Package Exclusions </h3>
                        <ul>
                            @if (!empty($packInclusions))
                                @foreach ($packExclusions as $packExclusion)
                                <li  class="content-1">{{ $packExclusion->point }}</li>
                                @endforeach 
                        @endif
                        </ul>
                        <h3 class="text-center  heading-2"> PAYMENT POLICY </h3>
                        <ul>
                            @if (!empty($paymentPolicies))
                                @foreach ($paymentPolicies as $paymentPolicy)
                                <li class="content-1">{{ $paymentPolicy->point }}</li>
                                @endforeach 
                            @endif 
                        </ul>
                        <h3 class="text-center heading-2 "> REFUND POLICY </h3>
                        <ul>
                            @if (!empty($refundPolicies))
                                @foreach ($refundPolicies as $refundPolicy)
                                <li  class="content-1">{{ $refundPolicy->point }}</li>
                                @endforeach 
                        @endif
                        </ul>
                        <h3 class="text-center heading-2 "> CANCELLATION POLICY </h3>
                        <ul>
                            @if (!empty($cancelPolicies))
                                @foreach ($cancelPolicies as $cancelPolicy)
                                <li  class="content-1">{{ $cancelPolicy->point }}</li>
                                @endforeach 
                        @endif
                        </ul>
                        <div class="w-100">
                            <h3 class="text-center  heading-2"> Bank Details </h3>
                            @if ($configs)
                                
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
                                </li>
                                <li>
                                    IFSC Code - {{$configs->ifsc_code}}
                                </li>
                                    <br>
                                    <img style="width:30%; height:30%" alt="qrcode" src="{{asset("images")}}/{{$configs->qrcode}}">
            
                            </ul>
                            @endif
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    @else
        No Records found 
    @endif

@endsection