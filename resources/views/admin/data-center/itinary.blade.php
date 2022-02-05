@extends('layouts.admin-app')

@section('content')
    <div class="card  shadow-hover p-3 ps-4">
        <div class="card-body"> 
            <div class="row border-bottom mb-4">
                <div class="col p-0">
                    <h3>Itinary Data Center</h3>
                </div>
                <div class="col">
                    <div class="text-end">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary rounded-pill mb-3" data-bs-toggle="modal" data-bs-target="#Add_Activirys_model">
                            <i class="fa fa-plus ms-1 text-white"></i> Create
                        </button> 
                    </div>
                </div>
            </div>
            <table id="data-table" class="table table-hover my-3" style="width:100%">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Title</th>
                        <th>Sub Title</th>
                        <th>View</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($act)
                        @foreach ($act as $index => $row)
                        <tr>
                            <td>{{ $index +1 }}</td>
                            <td>{{ $row->title }}</td>
                            <td>{{ $row->sub_title }}</td>
                            <td><img src="{{ $row->image }}" alt="" width="50px" height="20px"></td>
                            <td>
                                <a data-bs-toggle="modal" data-bs-target="#Add_Activirys_edit_model__{{ $index +1 }}"><i class="fa fa-pencil btn btn-sm btn-light border text-primary"></i></a>
                                <div class="modal fade" id="Add_Activirys_edit_model__{{ $index +1 }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog  modal-lg">
                                        <form  action="{{ route("data.itinerary.update",['id' => $row->id,'type' => 'Act_update']) }}" method="POST" enctype="multipart/form-data" class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel"><b>Itinerary Edit Form</b></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div> 
                                                    <div class="row">
                                                        @csrf
                                                        <div class="col-6 my-3">
                                                            <small>Title</small>
                                                            <input type="text" name="title" value="{{ $row->title }}" class="mt-2 form-control border-0 border-bottom"  required>
                                                        </div>
                                                        <div class="col-md-6 my-3">
                                                            <small>Sub Title</small>
                                                            <input type="text" name="sub_title" value="{{ $row->sub_title }}" class="mt-2 form-control border-0 border-bottom"   required>
                                                        </div>
                                                        <div class="col-md-12 my-3">
                                                            <small>Image URL</small>
                                                            <input type="url" name="image" value="{{ $row->image }}" class="mt-2 form-control border-0 border-bottom"   required>
                                                        </div>
                                                        <div class="col-md-6 my-3">
                                                            <small>Image Preview</small>
                                                            <img src="{{ $row->image }}" alt="" width="100%" height="250px" style="object-fit: cover">
                                                        </div>
                                                        <div class="col-6 my-3">
                                                            <small>Summary</small>
                                                            <textarea name="content"  cols="30" rows="10" class="form-control mt-2 border-0 border-bottom">{{ $row->content }}</textarea>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light rounded-pill" data-bs-dismiss="modal">Close</button>
                                                    <button class="btn btn-primary rounded-pill" type="submit"><i class="fa fa-save text-white me-2"></i> Save</button>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- Button trigger modal -->
                                <i class="fa fa-trash btn-light border btn btn-sm text-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop__{{ $index +1 }}"></i>
                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop__{{ $index +1 }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="staticBackdropLabel"><b>Are yoy Sure!</b></h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                want to delete  <strong>{{ $row->packageName }}</strong> Entry !
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light rounded-pill" data-bs-dismiss="modal">Close</button>
                                                <a href="{{ route('activity-delete', ['id' => $row->id,'type' => 'Act_delete'] ) }}" class="btn btn-primary rounded-pill">
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

    <!-- Modal -->
    <div class="modal fade" id="Add_Activirys_model" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg">
            <form  action="{{ route("data.itinerary",['type' => 'Act_store']) }}" method="POST" enctype="multipart/form-data" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><b>Itinerary Form</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div > 
                        <div class="row">
                            @csrf
                            <div class="col-6 my-3">
                                <small>Title</small>
                                <input type="text" name="title" class="mt-2 form-control border-0 border-bottom"  required>
                            </div>
                            <div class="col-md-6 my-3">
                                <small>Sub Title</small>
                                <input type="text" name="sub_title" class="mt-2 form-control border-0 border-bottom"   required>
                            </div>
                            <div class="col-md-12 my-3">
                                <small>Image URL</small>
                                <input type="url" name="image" class="mt-2 form-control border-0 border-bottom"   required>
                            </div>
                            <div class="col-12 my-3">
                                <small>Summary</small>
                                <textarea name="content" class="form-control mt-2 border-0 border-bottom"></textarea>
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
@endsection