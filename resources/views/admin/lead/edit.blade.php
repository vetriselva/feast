
@extends('layouts.admin-app')
@section('title') Lead List @endsection
@section('content') 
<form ng-controller="LeadController" action="{{ route("lead") }}" method="POST" enctype="multipart/form-data"> @csrf
    <div class="card position-relative my-4 p-3 border-hover shadow-hover">
        <h4 class="card-title form-title">Basic Informations</h4>
        <div class="card-body mt-4">
            <div class="row mb-3"> 
                <div class="col-md-6 my-2">
                    <small class="text-secondary">Lead Number</small>
                    <input type="number" name="leadNumber" value="{{ $data->leadNumber }}" class="form-control border-0 border-bottom rounded-0" required  >
                </div>
                <div class="col-md-6 my-2">
                    <small class="text-secondary">Tour Package Name</small>
                    <input name="packageName" value="{{ $data->packageName }}" class="form-control border-0 border-bottom rounded-0" required  >
                </div>
                <div class="col-md-6 my-2">
                    <small class="text-secondary">Place To visit</small>
                    <input name="placeToVisit" value="{{ $data->placeToVisit }}" class="form-control border-0 border-bottom rounded-0"required>
                </div>
                <div class="col-md-6 my-2">
                    <small class="text-secondary">Sub Title</small>
                    <input name="subTitle" value="{{ $data->subTitle }}" class="form-control border-0 border-bottom rounded-0"required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md col-sm-6 my-2">
                    <div>
                        <small class="text-secondary">Itinerary Date</small>
                    </div>
                    <input type="date" name="itDate" value="{{ $data->itDate }}" required class="form-control border-0 border-bottom rounded-0">
                </div> 
                <div class="col-md col-sm-6 my-2">
                    <div>
                        <small class="text-secondary">Valid Date</small>
                    </div>
                    <input type="date" name="itValidDate"  value="{{ $data->itValidDate }}"  required class="form-control border-0 border-bottom rounded-0">
                </div> 
                <div class="col-md col-sm-6 my-2">
                    <div>
                        <small class="text-secondary">Departure Date</small>
                    </div>
                    <input type="date" name="departureDate" value="{{ $data->departureDate }}"  required class="form-control border-0 border-bottom rounded-0">
                </div> 
            </div>
            <div class="row">
                <div class="col-md-4 my-2">
                    <small class="text-secondary">Number of Night</small>
                    <input value="{{ $data->numOfNights }}" class="form-control border-0 border-bottom rounded-0" type="number" name="numOfNights" required>
                </div>
                <div class="col-md-4 my-2">
                    <small class="text-secondary">Room Type</small>
                    <input value="{{ $data->roomType }}" class="form-control border-0 border-bottom rounded-0" name="roomType" required>
                </div>
                <div class="col-md-4 my-2">
                    <div class="mb-2">
                        <small class="text-secondary">Route Map</small>
                    </div>
                    <input type="file" name="RouteMap" id="" value="{{ $data->routeMap }}"  class="form-control  form-control-sm">
                    {{-- <img src="{{ $data->routeMap }}"  style="object-fit: cover"> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="card position-relative my-5 p-3 border-hover shadow-hover">
        <h4 class="card-title form-title">Fight Details</h4>
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col p-0">
                    <div>
                        <small class="text-secondary">Flight Name</small>
                    </div>
                        
                    <select name="flight_id" class="form-select form-select-sm border-0 border-bottom rounded-0" required>
                        <option selected value="{{ $data->flight_id }}">Air india</option>
                        <option value="2">Air Asia</option>
                    </select>
                </div>
                <div class="col text-end">
                </div>
            </div>
            <table class="table table-hover table-bordered my-4 shadow-sm-hover ">
                <thead  class="bg-light">
                    <tr>
                        <th>S.No</th>
                        <th>FROM</th>
                        <th>TO</th>
                        <th>FLIGHT</th>
                        <th>DATE</th>
                        <th>DEP</th>
                        <th>ARR</th>
                        <th>BAGGAGE</th>
                        <th>REFUNDABLE</th>
                        <th>MEALS</th>
                    </tr>
                </thead>
                <tbody> 
                    @foreach ($data->FlightsDeatils as $key => $it)
                        <tr>
                            <td>@{{ index+1 }}</td>
                            <td><input type="text" value="{{ $it->from }}" name="from[]" class="form-control form-control-sm border-0 rounded-0"></td>
                            <td><input type="text" value="{{ $it->to }}" name="to[]" class="form-control form-control-sm border-0 rounded-0"></td>
                            <td><input type="text" value="{{ $it->flight }}" name="flight[]" class="form-control form-control-sm border-0 rounded-0"></td>
                            <td><input type="date" value="{{ $it->date }}" name="date[]" class="form-control form-control-sm border-0 rounded-0"></td>
                            <td><input type="text" value="{{ $it->dep }}" name="dep[]" class="form-control form-control-sm border-0 rounded-0"></td>
                            <td><input type="text" value="{{ $it->arr }}" name="arr[]" class="form-control form-control-sm border-0 rounded-0"></td>
                            <td><input type="number" value="{{ $it->bag }}" name="bag[]" class="form-control form-control-sm border-0 rounded-0"></td>
                            <td><input type="checkbox" {{ $it->refound ==  '1' ? "checked" : ""}} value="{{ $it->refound }}" name="refound[]"  class="form-check-input"></td>
                            <td><input type="checkbox" {{ $it->meals ==  '1' ? "checked" : ""}} value="{{ $it->meals }}" class="form-check-input" name="meals[]"></td>
                        </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card position-relative my-5 p-3 border-hover shadow-hover">
        <h4 class="card-title form-title">Itineraray Details</h4>
        <div class="card-body ">
         
            <table class="table table-hover table-bordered my-4 shadow-sm-hover ">
                <thead class="bg-light">
                    <tr>
                        <th>Day</th>
                        <th width="20%">Places name</th>
                        <th width="20%">Activity</th>
                        <th width="20%">Day Activity</th>
                        <th>Transfers</th>
                        <th>Tickets</th>
                        <th class="text-center">Meals</th>
                        <th colspan="2">Others</th> 
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data->Leaditinary as  $it)
                        {{-- <tr>
                            <td>
                                {{ $it }}
                            </td>
                        </tr> --}}
                        <tr>
                            <td class="text-center">
                                <input type="text"  name="days[]" class="text-center form-control form-control-sm border-0 p-0 rounded-0" disabled value="{{ $it->days }}">
                            </td>
                            <td>
                                <select name="PlacesName[]" id="" class="form-select form-select-sm">
                                    <option selected value=" {{ $it->PlacesName  }}">Merina</option>
                                    <option value="2">Light House</option>
                                    <option value="3">Redhills</option>
                                    <option value="4">Chennai Park</option>
                                </select>
                            </td> 
                            <td>
                                <select name="Activity[]" id="" class="form-select form-select-sm">
                                    <option value="1">-- Choose --</option>
                                    <option selected value="{{ $it->activity_id  }}">{{ $it->Activity->title  }}</option>
                                    @if ($act)
                                        @foreach ($act as $a)
                                            <option value="{{ $a->id }}">{{ $a->title }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </td>
                            <td>
                                <select name="DayActivity[]" id="" class="form-select form-select-sm">
                                    <option value="1">-- Choose --</option>
                                    <option selected value=" {{ $it->DayActivity  }}">{{ $it->DayActivity  }}</option>
                                    @if ($act)
                                        @foreach ($act as $a)
                                            <option value="{{ $a->title }}">{{ $a->title }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </td>
                            <td class="text-center">
                                <input class="form-check-input" {{ $it->Transfers == 'Included' ? "checked" : "" }} name="Transfers[]" type="checkbox" value="Included">
                            </td> 
                            <td class="text-center">
                                <input class="form-check-input" {{ $it->Tickets == 'Included' ? "checked" : "" }} name="Tickets[]" type="checkbox" value="Included">
                            </td> 
                            <td class="bg-light">
                                <div class="px-1">
                                    <div class="form-check form-check-inline">
                                        <input {{ $it->breack == 'Break fast' ? 'checked' : '' }} class="form-check-input"  name="breack[]" type="checkbox" id="Break@{{ index+1 }}" value="Break fast">
                                        <label class="form-check-label" for="Break@{{ index+1 }}"><small>Break fast</small></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input {{ $it->lunch == 'Lunch' ? 'checked' : '' }} class="form-check-input"   name="lunch[]" type="checkbox" id="Lunch@{{ index+1 }}" value="Lunch">
                                        <label class="form-check-label" for="Lunch@{{ index+1 }}"><small>Lunch</small></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input {{ $it->dinner == 'Dinner' ? 'checked' : '' }} class="form-check-input"   name="dinner[]" type="checkbox" id="Dinner@{{ index+1 }}" value="Dinner" >
                                        <label class="form-check-label" for="Dinner@{{ index+1 }}"><small>Dinner</small></label>
                                    </div>
                                </div>
                            </td> 
                            <td>
                                <input class="form-control form-control-sm border-0 rounded-0" value="{{ $it->others }}" name="others[]">
                            </td>
                            <td>
                                <a class="btn-sm btn shadow-hover  rounded-pill" ng-click="DelelteItDays(index)">
                                    <i class="fa fa-trash text-danger"></i>
                                </a>
                            </td>
                        </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
 
    <div class="card position-relative my-5 p-3 border-hover shadow-hover">
        <h4 class="card-title form-title">Holtels Details</h4>

        <div class="card-body ">
            <div class="text-end">
                <a class="btn btn-sm btn-primary rounded-pill shadow-hover" ng-click="AddHotalsOption()"><i class="fa fa-plus text-white me-1"></i> Add a new Opition</a>
            </div>
            <table class="table table-hover table-bordered my-4 shadow-sm-hover" ng-repeat="(index,I) in HotalDetails">
                <thead>
                    <tr class="bg-light">
                        <th colspan="6" class="text-center"> 
                            <strong>OPTION @{{ index+1 }} </strong>
                        </th>  
                        <th class="text-center">
                            <a class="btn btn-sm btn-primary rounded-pill shadow-hover" ng-click="AddHotel(index)"><i class="fa fa-plus text-white"></i> </a>
                        </th>                    
                    </tr>  
                </thead>
                <tbody > 
                    <tr  class="bg-light">
                        <th>S.NO</th>
                        <th>CITY</th>
                        <th>HOTEL</th>
                        <th>ROOM TYPE</th>
                        <th>STAR RATE</th>
                        <th>NIGHT</th>
                        <th>ACTION</th>
                    </tr>
                    <tr ng-repeat="(SecIndex,Cost) in I.Details">
                        <td class="text-center">
                            <input type="hidden" min="1" max="10" maxlength="2" name="HotelOptionNumber[]" value="@{{ index+1 }}">@{{ SecIndex+1 }}
                        </td>
                        <td><input type="text" name="city[]" class="form-control form-control-sm border-0 rounded-0"></td>
                        <td>
                            <select name="hotel_id[]" class="form-select form-select-sm border-0 rounded-0">
                                <option value="3">THE KHYBER HIMALAYAN RESORT</option>
                                <option value="2">PINE-N-PEAK</option>
                                <option value="1">ITC HOUSEBOAT</option>
                            </select>
                        </td>
                        <td><input type="text" name="hotal_room_type[]" class="form-control form-control-sm border-0 rounded-0"></td>
                        <td><input type="number" min="1" max="5" maxlength="2" name="star_ratings[]" class="form-control form-control-sm border-0 rounded-0"></td>
                        <td><input  type="number" min="1" maxlength="2" name="hotal_night[]" class="form-control form-control-sm border-0 rounded-0"></td>
                        <td>
                            <a class="btn-sm btn shadow-hover px-3 rounded-pill" ng-click="DelelteHotals(index)">
                                <i class="fa fa-trash text-danger"></i>
                            </a>
                        </td>
                    </tr>
                </tbody> 
            </table> 
        </div> 
    </div>
    <div class="card position-relative my-5 p-3 border-hover shadow-hover">
        <h4 class="card-title form-title">Cost Details</h4>
        <div class="card-body ">
            <div class="text-end">
                <a class="btn btn-sm btn-primary rounded-pill shadow-hover" ng-click="AddCost()"><i class="fa fa-plus text-white me-1"></i> Add a new Opition</a>
            </div>
            <table class="table table-hover table-bordered my-4 shadow-sm-hover" ng-repeat="(index,I) in CostDetails">
                <thead>
                    <tr class="bg-light">
                        <th colspan="3" class="text-center"> 
                            <strong>OPTION @{{ index+1 }} </strong>
                        </th>  
                        <th class="text-center">
                            <a class="btn btn-sm btn-primary rounded-pill shadow-hover" ng-click="SubAddCost(index)"><i class="fa fa-plus text-white"></i> </a>
                        </th>                    
                    </tr>  
                    <tr class="text-center">
                        <th>Costing Title</th>
                        <th>Members</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody> 
                    <tr ng-repeat="(SecIndex,Cost) in I.Details">
                        <td>
                            <input type="hidden" name="optionNumber[]" value="@{{ index+1 }}">
                            <input placeholder="Type Here.." type="text" name="costingFor[]" id="" class="form-control form-control-sm border-0 rounded-0">
                        </td>
                        <td><input placeholder="Type Here.." type="text" name="members[]" id="" class="form-control form-control-sm border-0 rounded-0"></td>
                        <td><input placeholder="Type Here.." type="number" name="costTotals[]"  class="form-control form-control-sm border-0 rounded-0"></td>
                        <td class="text-center">
                            {{-- @{{getTotalMy("Totals")}} --}}
                            <a class="btn-sm btn shadow-hover px-3 rounded-pill" ng-click="DelelteCost(index, SecIndex)">
                                <i class="fa fa-trash text-danger"></i>
                            </a>
                        </td>
                    </tr> 
                </tbody>
                {{-- <tfoot>
                    <table class="table table-striped">
                        <tbody>
                            <tr ng-repeat="item in items">
                                <td>@{{item.name}}</td>
                                <td>@{{item.years}}</td>
                                <td>@{{item.amount}}</td>
                                <td>@{{item.interest}}%</td>
                            </tr>
                            <tr>
                                <td>Total:</td>
                                <td>@{{getTotal('years')}}</td>
                                <td>@{{getTotal('amount')}}</td>
                                <td>@{{getTotal('interest')}}</td>
                            </tr>
                        </tbody>
                    </table>
                </tfoot> --}}
            </table>
            <label for="" class="mb-2">Notes</label>
            <textarea name="costingNotes" class="form-control"></textarea>
        </div> 
    </div>
    <div class="card position-relative my-5 p-3 border-hover shadow-hover">
        <h4 class="card-title form-title">Package Inclusions</h4>
        <div class="card-body py-4">
            <ul class="list-group" style="max-height:400px;overflow:auto">
                @foreach (json_decode($data->pack_includs ) as $key => $point)
                    <li class="list-group-item p-0 border-bottom shadow-sm-hover">
                        <label for="point__{{ $key+1 }}" class="list-group-item ">
                            <input type="checkbox" name="pack_includs[]" value="{{ $point }}" class="form-check-input" id="point__{{ $key+1 }}">
                            <span class="ps-2 text-dark">{{ $point }}</span>
                        </label>                        
                    </li>
                @endforeach
                {{-- @foreach (json_decode($data->pack_includs ) as $point)
                    <li>{{ $point }}</li>
                @endforeach --}}
            </ul>
        </div> 
    </div>
    <div class="card position-relative my-5 p-3 border-hover shadow-hover">
        <h4 class="card-title form-title">Package Exclusions</h4>
        <div class="card-body py-4">
            <ul class="list-group" style="max-height:400px;overflow:auto">
                @foreach ($pack_ex as $point)
                    <li class="list-group-item p-0 border-bottom shadow-sm-hover">
                        <label for="pointEx__{{ $point->id }}" class="list-group-item ">
                            <input type="checkbox" name="pack_excluds[]" value="{{ $point->point }}" class="form-check-input" id="pointEx__{{ $point->id }}">
                            <span class="ps-2 text-dark">{{ $point->point }}</span>
                        </label>                        
                    </li>
                @endforeach
            </ul>
        </div> 
    </div>
    <div class="card position-relative my-5 p-3 border-hover shadow-hover">
        <h4 class="card-title form-title">Terms & Conditions</h4>
        <div class="card-body py-4">
            <h5 class="tezxt-center"><b>PAYMENT POLICY</b></h5>
            <ul class="list-group" style="max-height:400px;overflow:auto">
                @foreach ($pay_poly as $point)
                    <li class="list-group-item p-0 border-bottom shadow-sm-hover">
                        <label for="pay_poly{{ $point->id }}" class="list-group-item ">
                            <input type="checkbox" name="pack_excluds[]" value="{{ $point->point }}" class="form-check-input" id="pay_poly{{ $point->id }}">
                            <span class="ps-2 text-dark">{{ $point->point }}</span>
                        </label>                        
                    </li>
                @endforeach
            </ul>
            <h5 class="tzext-center"><b>REFUND  POLICY</b></h5>
            <ul class="list-group" style="max-height:400px;overflow:auto">
                @foreach ($refo_poly as $point)
                    <li class="list-group-item p-0 border-bottom shadow-sm-hover">
                        <label for="refo_poly{{ $point->id }}" class="list-group-item ">
                            <input type="checkbox" name="pack_excluds[]" value="{{ $point->point }}" class="form-check-input" id="refo_poly{{ $point->id }}">
                            <span class="ps-2 text-dark">{{ $point->point }}</span>
                        </label>                        
                    </li>
                @endforeach
            </ul>
            <h5 class="tezxt-center"><b>CANCELLATION  POLICY</b></h5>
            <ul class="list-group" style="max-height:400px;overflow:auto">
                @foreach ($can_poly as $point)
                    <li class="list-group-item p-0 border-bottom shadow-sm-hover">
                        <label for="can_poly{{ $point->id }}" class="list-group-item ">
                            <input type="checkbox" name="pack_excluds[]" value="{{ $point->point }}" class="form-check-input" id="can_poly{{ $point->id }}">
                            <span class="ps-2 text-dark">{{ $point->point }}</span>
                        </label>                        
                    </li>
                @endforeach
            </ul>
        </div> 
    </div>
    <div class="btn p-0 mt-3">
        <button type="submit" class="btn btn-primary px-3 rounded-pill">Submit & Save</button>
    </div>
</form>
@endsection
