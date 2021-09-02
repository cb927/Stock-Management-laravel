@extends('layouts.user')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 m-b-30">
            <div class="d-block d-sm-flex flex-nowrap align-items-center">
                <div class="page-title mb-2 mb-sm-0">
                    <h1>Search Vehicle</h1>
                </div>
                <div class="ml-auto d-flex align-items-center">
                    <nav>
                        <ol class="breadcrumb p-0 m-b-0">
                            <li class="breadcrumb-item">
                                <a href="index.html"><i class="ti ti-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                Search Vehicle
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <form action="{{route('vehicle.search')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12 mb-3">
                <label for="name">Search</label>
                <input type="text" name="key" class="form-control" placeholder="Input key">
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>
</div>
@endsection