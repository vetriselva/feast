@extends('layouts.admin-app')

@section('content')

        <form  action="{{ route("data.itinerary.update",['id' => $place->id,'type' => 'place_update']) }}" method="POST" enctype="multipart/form-data">

                <h5 class="modal-title" id="staticBackdropLabel"><b>Edit Place Form</b></h5>
 
                <div class="row">
                    @csrf
                    <div class="col-6 my-3">
                        <small>State </small>
                        <select name="state_id" id="state_id" class="form-control mt-2">
                           
                        </select>
                    </div>

                    <div class="col-6 my-3">
                        <small>City </small>
                        <select class="form-select city form-select-sm my-2 mt-3" id="city" name="city_id"  required>
        
                        </select>
                    </div>

                    <div class="col-6 my-3">
                        <small>Place Name</small>
                        <input type="text" name="place_name" class="mt-2 form-control border-0 border-bottom" value="{{ $place->place_name }}"  required>
                    </div>

                
                </div>
            
                <div class="container">
                    <button type="button" class="btn btn-light rounded-pill" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary rounded-pill" type="submit"><i class="fa fa-save text-white me-2"></i> Save</button>
                </div>
        </form>

   
@endsection
@push('scripts')
<script>
   
    $(document).ready(function(){

        let state = {!! json_encode( $place->state->toArray() ) !!}
        var newOption = new Option(state.state_name, state.id, false, false);
        $('#state_id').append(newOption).trigger('change'); 
        $('#state_id').select2({
            ajax: {
                url : '{{route('get-states')}}',
                data: function (params) {   
                    return { q: params.term}
                },
                processResults: function (data) {
                    $('#city').val('').trigger('change');
                    let res = [];
                    data.forEach(item => {
                        res.push({'id': item.id, 'text': item.state_name});
                    })
                    return { results: res};
                }
            }
        });

        let city = {!! json_encode( $place->city->toArray() ) !!}
        var newOption = new Option(city.city_name, city.id, false, false);
        $('#city').append(newOption).trigger('change');
        $("#city").select2({
            ajax: {
                url : '{{route('get-cities-by-state-id')}}',
                data: function (params) {   
                    return { q: params.term, id: $("#state_id").val() }
                },
                processResults: function (data) {
                
                    let res = [];
                    data.forEach(item => {
                        res.push({'id': item.id, 'text': item.city_name});
                    })
                    return { results: res};
                }
            }
        });
    });
</script>

@endpush
