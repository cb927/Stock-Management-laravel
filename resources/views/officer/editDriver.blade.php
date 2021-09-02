@extends('layouts.user')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 m-b-30">
            <div class="d-block d-sm-flex flex-nowrap align-items-center">
                <div class="page-title mb-2 mb-sm-0">
                    <h1>Update Driver</h1>
                </div>
                <div class="ml-auto d-flex align-items-center">
                    <nav>
                        <ol class="breadcrumb p-0 m-b-0">
                            <li class="breadcrumb-item">
                                <a href="index.html"><i class="ti ti-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                Drivers
                            </li>
                            <li class="breadcrumb-item active text-primary" aria-current="page">
                                Update Driver</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <form action="{{route('driver.update', $driver->id)}}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{$driver->name}}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="name">Vehicle Number</label>
                <select type="text" name="vehicle_id" class="form-control">
                    <option value="">No Vehicle</option>
                    @foreach($vehicles as $item)
                    <option value="{{$item->id}}" @if($item->id == $driver->vehicle_id) selected='selected' @endif>{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
</div>
@endsection