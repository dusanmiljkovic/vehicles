@extends('layouts.app')

@section('title')
    <title>Vehicles</title>
@endsection

@push('styles')
@endpush

@section('header')
    <h1 class="m-0">Vehicles</h1>
@endsection

@section('body')
    <div class="card">
        <div class="card-body">
            <a href="{{route('vehicles.create')}}" class="btn btn-primary">
                Add vehicle
            </a>
            <a href="{{route('vehicles.download')}}" class="btn btn-info">
                Download as csv
            </a>
        </div>
        <div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Brand</th>
                    <th scope="col">Model</th>
                    <th scope="col">Number</th>
                    <th scope="col">Type</th>
                    <th scope="col">Mileage</th>
                    <th scope="col">Price</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($vehicles as $vehicle)
                    <tr>
                        <td>{{$vehicle->brandModel->brand->name}}</td>
                        <td>{{$vehicle->brandModel->name}}</td>
                        <td>{{$vehicle->vehicle_number}}</td>
                        <td>{{$vehicle->type ?? "/"}}</td>
                        <td>{{$vehicle->mileage ?? "/"}}</td>
                        <td>{{$vehicle->price ?? "/"}}</td>
                        <td>
                            <a href="{{route('vehicles.edit', $vehicle->id)}}" class="btn btn-primary">Edit</a>
                            <form style="display: inline-block" method="POST" action="{{route('vehicles.delete', $vehicle->id)}}">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {!! $vehicles->links() !!}
    </div>
@endsection

@push('scripts')
@endpush
