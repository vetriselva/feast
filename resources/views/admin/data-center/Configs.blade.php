@extends('layouts.admin-app')

@section('content')

    <div class="card  shadow-hover p-3 ps-4">
        <div class="card-body"> 
            <div class="row border-bottom mb-4">
                <div class="col p-0">
                    <h3>Configs Data Center</h3>
                </div>
            </div> 
            <table id="hotel-table" class="table table-hover my-3" style="width:100%">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Bank Name</th>
                        <th>Account Holder Name</th>
                        <th>Account Number</th>
                        <th>Branch</th>
                        <th>IFSC Code </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($hot)
                        @foreach ($hot as $index => $row)
                        <tr>
                            <td>{{ $index +1 }}</td>
                            <td>{{ $row->bank_name }}</td>
                            <td>{{ $row->account_holder_name }}</td>
                            <td>{{ $row->account_number }}</td>
                            <td>{{ $row->branch_name }}</td>
                            <td>{{ $row->ifsc_code }}</td>
                         
                            <td>
                                <a data-bs-toggle="modal" data-bs-target="#Add_Hotels_edit_model__{{ $index +1 }}"><i class="fa fa-pencil btn btn-sm btn-light border text-primary"></i></a>
                                <div class="modal fade" id="Add_Hotels_edit_model__{{ $index +1 }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog  modal-lg">
                                        <form  action="{{ route("data.itinerary.update",['id' => $row->id,'type' => 'Configs_update']) }}" method="POST"  class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel"><b>Edit Form</b></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div> 
                                                    <div class="row">
                                                        @csrf
                                                        <div class="col-6 my-3">
                                                            <small>Bank Name </small>
                                                            <input type="text" name="bank_name" class="mt-2 form-control border-0 border-bottom" value="{{$row->bank_name}}"  required>
                                                        </div>
                                                        <div class="col-6 my-3">
                                                            <small>Account Holder Name</small>
                                                            <input type="text" name="account_holder_name" class="mt-2 form-control border-0 border-bottom" value="{{$row->account_holder_name}}"  required>
                                                        </div>
                                                        <div class="col-6 my-3">
                                                            <small>Account No</small>
                                                            <input type="text" name="account_number" class="mt-2 form-control border-0 border-bottom" value="{{$row->account_number}}"  required>
                                                        </div>
                                                        <div class="col-6 my-3">
                                                            <small>Branch Name</small>
                                                            <input type="text" name="branch_name" class="mt-2 form-control border-0 border-bottom" value="{{$row->branch_name}}" required>
                                                        </div>
                                                        <div class="col-6 my-3">
                                                            <small>IFSC Code</small>
                                                            <input type="text" name="ifsc_code" class="mt-2 form-control border-0 border-bottom"  value="{{$row->ifsc_code}}" required>
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
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody> 
            </table> 
        </div>
    </div> 
    
@endsection