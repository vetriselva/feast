@extends('layouts.admin-app')

@section('content')

    <div class="card  shadow-hover p-3 ps-4">
        <div class="card-body"> 
            <div class="row border-bottom mb-4">
                <div class="col p-0">
                    <h3>Sightseeing</h3>
                </div>
                <div class="col">
                    <div class="text-end">
                        <button type="button" class="btn btn-primary rounded-pill mb-3" data-bs-toggle="modal" data-bs-target="#Add_Hotels_model">
                            <i class="fa fa-plus ms-1 text-white"></i> Create
                        </button> 
                    </div>
                </div>
            </div> 
            <table id="hotel-table" class="table table-hover my-3" style="width:100%">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>State</th>
                        <th>City</th>
                        <th>Title</th>
                        <th>Sub Title</th>
                        <th>Content</th>
                        <th>Image </th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($hot)
                        @foreach ($hot as $index => $row)
                        <tr>
                            <td>{{ $index +1 }}</td>
                            <td>{{ $row->state->state_name }}</td>
                            <td>{{ $row->city->city_name }}</td>
                            <td>{{ $row->title }}</td>
                            <td>{{ $row->sub_title }}</td>
                            <td>{{ $row->content }}</td>
                            <td><img src="{{ $row->image }}" alt="" width="50px" height="20px"></td>
                            <td>
                                <a href="{{route('edit-dayactivity',$row->id)}}"><i  data-bs-target="dayActivityModal" class="fa fa-pencil btn btn-sm btn-light border text-primary"></i></a>
                                <!-- Button trigger modal -->
                                <i class="fa fa-trash btn-light border btn btn-sm text-danger" data-bs-toggle="modal" data-bs-target="#Hotels__{{ $index +1 }}"></i>
                                <!-- Modal -->
                                <div class="modal fade" id="Hotels__{{ $index +1 }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="staticBackdropLabel"><b>Are you Sure!</b></h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                want to delete  <strong>{{ $row->packageName }}</strong> Entry !
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light rounded-pill" data-bs-dismiss="modal">Close</button>
                                                <a href="{{ route('activity-delete', ['id' => $row->id,'type' => 'DayActivities_delete'] ) }}" class="btn btn-primary rounded-pill">
                                                    Yes! Delete
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody> 
            </table> 
        </div>
    </div> 
    <div id="dayActivityModalAppend"></div>
    <!-- Modal -->
    <div ng-controller="dayActivity">
        <div class="modal fade" id="Add_Hotels_model" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog  modal-lg">
                <form  action="{{ route("data.itinerary",['type' => 'DayActivites_store']) }}" method="POST" enctype="multipart/form-data" class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"><b>Create Form</b></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div > 
                            <div class="row">
                                @csrf
                            
                                <div class="col-6 my-3">
                                    <small>State </small>
                                    <select name="state_id" id="state_id" class="form-control mt-2" get-cities ng-model="I.StateName">
                                        <option value="">Select State</option>
                                        @foreach ($states as $state)
                                        <option value="{{$state->id}}">{{$state->state_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-6 my-3">
                                    <small>City </small>
                                    <select class="form-select  form-select-sm my-2 mt-3" get-places name="city_id" ng-model="I.CityName" required>
                                        <option value="">Select City</option>
                                        <option ng-repeat="City in Cities" value="@{{ City.id }}">
                                            @{{ City.city_name }}
                                        </option>
                                    </select>
                                </div>

                                <div class="col-6 my-3">
                                    <small>Title Name</small>
                                    <input type="text" name="title" class="mt-2 form-control border-0 border-bottom"  required>
                                </div>
                                <div class="col-6 my-3">
                                    <small>Sightseeing</small>
                                    <input type="text" name="sub_title" class="mt-2 form-control border-0 border-bottom"  required>
                                </div>
                                <div class="col-6 my-3">
                                    <small>Image URL</small>
                                    <input type="url" name="image" class="mt-2 form-control border-0 border-bottom"  required>
                                </div>
                                <div class="col-12 my-3">
                                    <small>Content</small>
                                    <input type="text" name="content" class="mt-2 form-control border-0 border-bottom"  required>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light rounded-pill" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-primary rounded-pill" type="submit"><i class="fa fa-save text-white me-2"></i>Sumbit & Save</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
