@extends('layouts.app')

@section('title')
    <title>Vehicles</title>
@endsection

@push('styles')
@endpush

@section('header')
    <h1 class="m-0">Update vehicle</h1>
    <a href="{{route('vehicles.index')}}">back</a>
@endsection

@section('body')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <section>
        <form method="POST" action="{{route('vehicles.update', $vehicle->id)}}" enctype="multipart/form-data" >
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="vehicleNumber">Vehicle number</label>
                <input id="vehicleNumber" name="vehicleNumber" value="{{ old('vehicleNumber') ?? $vehicle->vehicle_number }}" type="text" class="form-control" placeholder="Enter vehicle number" >
            </div>
            <div class="form-group">
                <label for="brand">Brand</label>
                <select id="brand" name="brand" class="brand form-control" data-dependent='brandModel'>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}" {{ old('brand') ? (old('brand') == $brand->id ? "selected" : "" ) : ($vehicle->brandModel->brand->id == $brand->id ? "selected" : "") }}>{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="brandModel">Model</label>
                <select id="brandModel" name="brandModel" class="brandModel form-control">
                    @foreach($brandModels as $brandModel)
                        <option value="{{ $brandModel->id }}" {{ old('brand') ? (old('brand') == $brandModel->id ? "selected" : "" ) : ($vehicle->brandModel->id == $brandModel->id ? "selected" : "") }}>{{ $brandModel->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="vehicleType">Type</label>
                <textarea id="vehicleType" name="vehicleType" class="form-control" >{{ old('vehicleType') ?? $vehicle->type }}</textarea>
            </div>
            <div class="form-group">
                <label for="vehicleMileage">Mileage</label>
                <input id="vehicleMileage" name="vehicleMileage" value="{{ old('vehicleMileage') ?? $vehicle->mileage }}"  type="number" min="0"  class="form-control" placeholder="Vehicle mileage">
            </div>
            <div class="form-group">
                <label for="vehiclePrice">Price</label>
                <input id="vehiclePrice" name="vehiclePrice" value="{{ old('vehiclePrice') ?? $vehicle->price }}" type="number" step=".01" min="0" class="form-control" placeholder="Vehicle price">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </section>
@endsection

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.brand').change(function () {
                console.log("ne radssi");
                var value = $(this).val();
                if (value != 0) {
                    var dependent = $(this).data('dependent');
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "/brandModels",
                        method: "POST",
                        data: {
                            value: value,
                            _token: _token
                        }
                    }).done(function (result) {
                        $('#' + dependent).html(result);
                    }).fail(function () {
                    }).always(function () {
                    });
                }
            });
        });
    </script>
@endpush
