
@extends('layouts.admin-app')
@section('title') Lead List @endsection
@section('content') 

<style>
    ul.dropdown-menu li {
        cursor: pointer;
    }

        ul.dropdown-menu li span.red {
            color: red;
        }

        ul.dropdown-menu li span.green {
            color: green;
        }
</style>
<form ng-controller="LeadController" ng-submit="submitLead()" method="POST" enctype="multipart/form-data"> @csrf
    <div class="card position-relative my-4 p-3 border-hover shadow-hover">
        <h4 class="card-title form-title">Basic Informations</h4>
        <div class="card-body mt-4">
            <div class="row mb-3"> 
                <div class="col-md-6 my-2">
                    <small class="text-secondary">Lead Number</small>
                    <input type="number" name="leadNumber" ng-model="basicInformation.leadNumber" class="form-control border-0 border-bottom rounded-0" required  >
                </div>
                <div class="col-md-6 my-2">
                    <small class="text-secondary">Tour Package Name</small>
                    <input name="packageName" ng-model="basicInformation.packageName" class="form-control border-0 border-bottom rounded-0" required  >
                </div>
                <div class="col-md-6 my-2">
                    <small class="text-secondary">Place To visit</small>
                    <input name="placeToVisit" ng-model="basicInformation.placeToVisit" class="form-control border-0 border-bottom rounded-0"required>
                </div>
                <div class="col-md-6 my-2">
                    <small class="text-secondary">Sub Title</small>
                    <input name="subTitle" ng-model="basicInformation.subTitle" class="form-control border-0 border-bottom rounded-0"required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md col-sm-6 my-2">
                    <div>
                        <small class="text-secondary">Itinerary Date</small>
                    </div>
                    <input type="date" name="itDate" ng-model="basicInformation.itineraryDate"  required class="form-control border-0 border-bottom rounded-0">
                </div> 
                <div class="col-md col-sm-6 my-2">
                    <div>
                        <small class="text-secondary">Valid Date</small>
                    </div>
                    <input type="date" name="itValidDate" ng-model="basicInformation.validDate" required class="form-control border-0 border-bottom rounded-0">
                </div> 
                <div class="col-md col-sm-6 my-2">
                    <div>
                        <small class="text-secondary">Departure Date</small>
                    </div>
                    <input type="date" name="departureDate" ng-model="basicInformation.departureDate" required class="form-control border-0 border-bottom rounded-0">
                </div> 
            </div>
            <div class="row">
                <div class="col-md-4 my-2">
                    <small class="text-secondary">Number of Night</small>
                    <input   ng-model="basicInformation.numofNights" class="form-control border-0 border-bottom rounded-0" type="number" name="numOfNights" value="5" required>
                </div>
                <div class="col-md-4 my-2">
                    <small class="text-secondary">Room Type</small>
                    <input ng-model="basicInformation.roomType" class="form-control border-0 border-bottom rounded-0" name="roomType" value="AC ROOM" required>
                </div>
                <div class="col-md-4 my-2">
                    <div class="mb-2">
                        <small class="text-secondary">Route Map</small>
                    </div>
                    <input type="file" ng-model="basicInformation.RouteMap" file-model = "myFile"  name="RouteMap" id=""   class="form-control  form-control-sm">
                </div>
            </div>
        </div>
    </div>
    <div class="card position-relative my-5 p-3 border-hover shadow-hover">
        <h4 class="card-title form-title">Fight Details</h4>
        <div class="card-body ">
            <div class="row align-items-center">
                <div class="col p-0">
                    <div>
                        <small class="text-secondary">Flight Name</small>
                    </div>
                    <select name="flight_id" class="form-select form-select-sm border-0 border-bottom rounded-0" required>
                        <option value="1">Air india</option>
                        <option value="2">Air Asia</option>
                    </select>
                </div>
                <div class="col text-end">
                    <a class="btn btn-sm btn-primary rounded-pill shadow-hover" ng-click="AddFlights()"><i class="fa fa-plus text-white me-1"></i> Add a new flight</a>
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
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="(index,I) in FlightDetails">
                        <td>@{{ index+1 }}</td>
                        <td><input type="text" name="from" ng-model="I.from" class="form-control form-control-sm border-0 rounded-0"></td>
                        <td><input type="text" name="to" ng-model="I.to"  class="form-control form-control-sm border-0 rounded-0"></td>
                        <td><input type="text" name="flight" ng-model="I.flight"  class="form-control form-control-sm border-0 rounded-0"></td>
                        <td><input type="date" name="date" ng-model="I.date"  class="form-control form-control-sm border-0 rounded-0"></td>
                        <td><input type="text" name="dep" ng-model="I.dep"  class="form-control form-control-sm border-0 rounded-0"></td>
                        <td><input type="text" name="arr" ng-model="I.arr"  class="form-control form-control-sm border-0 rounded-0"></td>
                        <td><input type="number" name="bag" ng-model="I.bag"  class="form-control form-control-sm border-0 rounded-0"></td>
                        <td><input type="checkbox" name="refound" ng-model="I.refound"  value="1" class="form-check-input"></td>
                        <td><input type="checkbox" value="1" class="form-check-input" ng-model="I.meals" name="meals[]"></td>
                        <td>
                            <a class="btn-sm btn shadow-hover px-3 rounded-pill" ng-click="DelelteFlights(index)">
                                <i class="fa fa-trash text-danger"></i>
                            </a>
                        </td>
                    </tr> 
                </tbody>
            </table>
        </div>
    </div>
    <div class="card position-relative my-5 p-3 border-hover shadow-hover">
        <h4 class="card-title form-title">Itinerary Details</h4>
        <div class="card-body ">
            <div class="text-end">
                <a class="btn btn-sm btn-primary rounded-pill shadow-hover" ng-click="AddItDays()"><i class="fa fa-plus text-white me-1"></i> Add a new day</a>
            </div>
            <table class="table table-hover table-bordered my-4 shadow-sm-hover ">
                <thead class="bg-light">
                    <tr>
                        <th>Day</th>
                        <th width="20%">State name</th>
                        <th width="20%">City name</th>
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
                    <tr ng-repeat="(index,I) in ItDays">
                        <td class="text-center">
                            <input type="text" ng-model="I.DayCount"  name="DayCount[]" class="text-center form-control form-control-sm border-0 p-0 rounded-0"  ng-value="@{{ index+1 }}">
                        </td>
                        <td>
                            <select class="form-select  form-select-sm my-2 mt-3"  get-cities name="StateName" ng-model="I.StateName" required>
                                <option value="">Select State </option>
                                <option ng-repeat="State in States" value="@{{ State.id }}">
                                    @{{ State.state_name }}
                                </option>
                            </select>
                        </td>
                        <td>
                            <select class="form-select  form-select-sm my-2 mt-3" get-places name="CityName" ng-model="I.CityName" required>
                                <option value="">Select City</option>
                                <option ng-repeat="City in Cities" value="@{{ City.id }}">
                                    @{{ City.city_name }}
                                </option>
                            </select>
                        </td>
                        <td>
                            <select  get-day-activities get-activities  class="form-select form-select-sm my-2 mt-3" name="PlaceName" ng-model="I.PlaceName" required>
                                <option value="">Select Place</option>
                                <option ng-repeat="Place in Places" value="@{{ Place.id }}">
                                    @{{ Place.place_name }}
                                </option>
                            </select>
                        </td>
                        <td>
                            <select class="form-select  form-select-sm my-2 mt-3" name="Activity" ng-model="I.Activity" required>
                                <option value="">Select Activity</option>
                                <option ng-repeat="Place in Places" value="@{{ Place.id }}">
                                    @{{ Place.place_name }}
                                </option>
                            </select>
                        </td>
                        <td>
                            <div class="col-xs-6">
                                <dropdown-multiselect model="I.DayActivity" 
                                options="dayActivities"></dropdown-multiselect>
                            </div>
                        </td>
                        <td class="text-center">
                            <input class="form-check-input"  name="Transfers[]"  ng-model="I.Transfers" type="checkbox" value="Included">
                        </td> 
                        <td class="text-center">
                            <input class="form-check-input"  name="Tickets[]" ng-model="I.Tickets" type="checkbox" value="Included">
                        </td> 
                        <td class="bg-light">
                            <div class="px-1">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input"  name="breack[]" ng-model="I.Meals.breack" type="checkbox" id="Break@{{ index+1 }}" value="Break fast">
                                    <label class="form-check-label" for="Break@{{ index+1 }}"><small>Break fast</small></label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input"  ng-model="I.Meals.lunch" name="lunch[]" type="checkbox" id="Lunch@{{ index+1 }}" value="Lunch">
                                    <label class="form-check-label" for="Lunch@{{ index+1 }}"><small>Lunch</small></label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" ng-model="I.Meals.dinner"  name="dinner[]" type="checkbox" id="Dinner@{{ index+1 }}" value="Dinner" >
                                    <label class="form-check-label" for="Dinner@{{ index+1 }}"><small>Dinner</small></label>
                                </div>
                            </div>
                        </td> 
                        <td>
                            <input class="form-control form-control-sm border-0 rounded-0" ng-model="I.others" name="others[]">
                        </td>
                        <td>
                            <a class="btn-sm btn shadow-hover  rounded-pill" ng-click="DelelteItDays(index)">
                                <i class="fa fa-trash text-danger"></i>
                            </a>
                        </td>
                    </tr> 
                </tbody>
            </table>
        </div>
    </div>
 
    <div class="card position-relative my-5 p-3 border-hover shadow-hover">
        <h4 class="card-title form-title">Holtels Details</h4>
        <small class="mx-auto text-danger">Mandatory to fill @{{HotalDetails.length}} cost details</small>

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
                            <input type="hidden" min="1" max="10" maxlength="2" ng-model="Cost.HotelOptionNumber" name="HotelOptionNumber[]" value="@{{ index+1 }}">@{{ SecIndex+1 }}
                        </td>
                        <td><input type="text" ng-model="Cost.city" name="city[]" class="form-control form-control-sm border-0 rounded-0"></td>
                        <td>
                            <select ng-model="Cost.hotel" name="hotel_id[]" class="form-select form-select-sm border-0 rounded-0">
                                <option value="">-- Choose --</option>
                                @if ($hotels)
                                    @foreach ($hotels as $hotel)
                                        <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </td>
                        <td><input type="text" ng-model="Cost.hotalRoomType" name="hotal_room_type[]" class="form-control form-control-sm border-0 rounded-0"></td>
                        <td><input type="number" ng-model="Cost.starRating" min="1" max="5" maxlength="2" name="star_ratings[]" class="form-control form-control-sm border-0 rounded-0"></td>
                        <td><input  type="number" ng-model="Cost.hotalNight" min="1" maxlength="2" name="hotal_night[]" class="form-control form-control-sm border-0 rounded-0"></td>
                        <td>
                            <a class="btn-sm btn shadow-hover px-3 rounded-pill" ng-click="DelelteHotals(index, SecIndex)">
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
                            <input placeholder="Type Here.." type="text" ng-model="Cost.costTitle" name="costingFor[]" id="" class="form-control form-control-sm border-0 rounded-0">
                        </td>
                        <td><input placeholder="Type Here.." type="text" ng-model="Cost.member" name="members[]" id="" class="form-control form-control-sm border-0 rounded-0"></td>
                        <td><input placeholder="Type Here.." type="number" ng-model="Cost.costTotal"  name="costTotals[]"  class="form-control form-control-sm border-0 rounded-0"></td>
                        <td class="text-center">
                            <a class="btn-sm btn shadow-hover px-3 rounded-pill" ng-click="DelelteCost(index, SecIndex)">
                                <i class="fa fa-trash text-danger"></i>
                            </a>
                        </td>
                    </tr> 
                </tbody> 
            </table>
            <label for="" class="mb-2">Notes</label>
            <textarea name="costingNotes" ng-model="basicInformation.costingNote" class="form-control"></textarea>
        </div> 
    </div>
    <div class="card position-relative my-5 p-3 border-hover shadow-hover">
        <h4 class="card-title form-title">Package Inclusions</h4>
        <div class="card-body py-4">
            <ul class="list-group" style="max-height:400px;overflow:auto">
                    <li class="list-group-item p-0 border-bottom shadow-sm-hover"  ng-repeat="(index,packageInclusion) in packageInclusions">
                        <label for="package_inclusions__@{{packageInclusion.id}}" class="list-group-item">
                            <input type="checkbox" ng-model="active" ng-change="changeInclusion(packageInclusion.id, active)" name="pack_incxcluds[]" value="@{{packageInclusion.id}}" class="form-check-input" id="package_inclusions__@{{packageInclusion.id}}">
                            <span class="ps-2 text-dark">@{{ packageInclusion.point }}</span>
                        </label>                        
                    </li>
            </ul>
        </div> 
    </div>
    <div class="card position-relative my-5 p-3 border-hover shadow-hover">
        <h4 class="card-title form-title">Package Exclusions</h4>
        <div class="card-body py-4">
            <ul class="list-group" style="max-height:400px;overflow:auto">
                    <li class="list-group-item p-0 border-bottom shadow-sm-hover" ng-repeat="(index,packageExclusion) in packageExclusions">
                        <label for="package_exclusions__@{{packageExclusion.id}}" class="list-group-item">
                            <input type="checkbox" ng-model="active" ng-change="changeExclusion(packageExclusion.id, active)" name="pack_excluds[]" value="@{{packageExclusion.id}}" class="form-check-input" id="package_exclusions__@{{packageExclusion.id}}">
                            <span class="ps-2 text-dark">@{{ packageExclusion.point }}</span>
                        </label>                        
                    </li>
            </ul>
        </div> 
    </div>
    <div class="card position-relative my-5 p-3 border-hover shadow-hover">
        <h4 class="card-title form-title">Terms & Conditions</h4>
        <div class="card-body py-4">
            <h5 class="tezxt-center"><b>PAYMENT POLICY</b></h5>
            <ul class="list-group" style="max-height:400px;overflow:auto">
                <li class="list-group-item p-0 border-bottom shadow-sm-hover" ng-repeat="(index,paymentPolicy) in paymentPolicies">
                    <label for="payment_policy__@{{paymentPolicy.id}}" class="list-group-item">
                        <input type="checkbox" ng-model="active" ng-change="changePaymentPolicy(paymentPolicy.id, active)" name="paymentpolicy[]" value="@{{paymentPolicy.id}}" class="form-check-input" id="payment_policy__@{{paymentPolicy.id}}">
                        <span class="ps-2 text-dark">@{{ paymentPolicy.point }}</span>
                    </label>                        
                </li>
            </ul>
            <h5 class="tzext-center"><b>REFUND  POLICY</b></h5>
            <ul class="list-group" style="max-height:400px;overflow:auto">
                <li class="list-group-item p-0 border-bottom shadow-sm-hover" ng-repeat="(index,refundPolicy) in refundPolicies">
                    <label for="refund_policy__@{{refundPolicy.id}}" class="list-group-item ">
                        <input type="checkbox" ng-model="active" ng-change="changeRefundPolicy(refundPolicy.id, active)" name="refund_policy[]" value="@{{refundPolicy.id}}" class="form-check-input" id="refund_policy__@{{refundPolicy.id}}">
                        <span class="ps-2 text-dark">@{{ refundPolicy.point }}</span>
                    </label>                        
                </li>
            </ul>
            <h5 class="tezxt-center"><b>CANCELLATION  POLICY</b></h5>
            <ul class="list-group" style="max-height:400px;overflow:auto">
                <li class="list-group-item p-0 border-bottom shadow-sm-hover" ng-repeat="(index,cancellationPolicy) in cancellationPolicies">
                    <label for="cancellation__@{{cancellationPolicy.id}}" class="list-group-item ">
                        <input type="checkbox" ng-model="active" ng-change="changeCancellationPolicy(cancellationPolicy.id, active)" name="cancellation_policy[]" value="@{{cancellationPolicy.id}}" class="form-check-input" id="cancellation__@{{cancellationPolicy.id}}">
                        <span class="ps-2 text-dark">@{{ cancellationPolicy.point }}</span>
                    </label>                        
                </li>
            </ul>
        </div> 
    </div>
    <div class="btn p-0 mt-3">
        <button type="submit"  class="btn btn-primary px-3 rounded-pill">Submit & Save</button>
    </div>
</form>
@endsection
