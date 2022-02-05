@extends('layouts.admin-app')
@section('title') Lead List @endsection
@section('content') 
    <div class="card border-0">
        <div class="card-body">
            <div class="text-end mb-3">
                <a href="{{ route("lead-new") }}" class="btn btn-sm btn-primary rounded-pill shadow-hover">
                    <i class="fa fa-plus text-white me-1"></i> Add a new
                </a>
            </div>
            <div class="card  shadow-hover p-3 ps-4">
                <div class="card-body"> 
                    <table id="data-table" class="table table-hover my-3" style="width:100%">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>App Lead Number</th>
                                <th>Zoho Lead Number</th>
                                <th>Itinerary Date</th>
                                <th>Valid Date</th>
                                <th>Created Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($data)
                                @foreach ($data as $index => $row)
                                <tr>
                                    <td>{{ $index +1 }}</td>
                                    <td>VFI-D-0{{ $row->id }}</td>
                                    <td>{{ $row->leadNumber }}</td>
                                    <td>{{ $row->itDate }}</td>
                                    <td>{{ $row->itValidDate }} </td>
                                    <td>{{ $row->created_at->format('Y-m-d') }}</td>
                                    <td>
                                        {{-- <a href="{{ route("lead-edit", $row->id) }}"><i class="fa fa-pencil btn btn-sm btn-light border text-info"></i></a> --}}
                                        <a href="{{ route("lead-view", $row->id) }}"><i class="fa fa-eye btn btn-sm btn-light border text-primary"></i></a>
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
                                                        want to delete  <strong>{{ $row->packageName }} | ZOHO NUMBER - {{ $row->leadNumber }}</strong> Entry !
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light rounded-pill" data-bs-dismiss="modal">Close</button>
                                                        <a href="{{ route("lead-delete", $row->id) }}" class="btn btn-primary rounded-pill">
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
        </div>
    </div>
@endsection
