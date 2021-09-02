@extends('layouts.user')

@push('styles')
<style>
    #result div {
        border-bottom: 1px solid black;
        margin-top: 40px;
    }
</style>
@endpush

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 m-b-30">
            <div class="d-block d-sm-flex flex-nowrap align-items-center">
                <div class="page-title mb-2 mb-sm-0">
                    <h1>Cost Calculation</h1>
                </div>
                <div class="ml-auto d-flex align-items-center">
                    <nav>
                        <ol class="breadcrumb p-0 m-b-0">
                            <li class="breadcrumb-item">
                                <a href="index.html"><i class="ti ti-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                Cost Calculation
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="name">Distance (km)</label>
            <input type="number" id="km" class="form-control" placeholder="Input distance">
        </div>
        <div class="col-md-3 mb-3">
            <label for="name">Rate ($)</label>
            <input type="number" class="form-control" value="5" disabled='disabled'>
        </div>
        <div class="col-md-3 mb-3">
            <button class="btn btn-success" id="calc" style="margin-top:28px;">Calculate</button>
        </div>
    </div>
    <div style="padding: 50px;display: none;" id="invoice">
        <h1>Invoice</h1>
        <div class="row" id="result">
            <div class="col-md-3">Distance (km)</div>
            <div class="col-md-9" id="km_show">123</div>
            <div class="col-md-3">Rate ($)</div>
            <div class="col-md-9">5</div>
            <div class="col-md-3">Total Cost ($)</div>
            <div class="col-md-9" id="total_cost">123</div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#calc').click(function() {
            var distance = $('#km').val()
            if (distance == '') {
                alert('Please input distance first.')
            } else {
                cost = distance * 5
                $('#km_show').html(distance)
                $('#total_cost').html(cost)
                $('#invoice').css('display', 'block')
            }
        })
    })
</script>
@endpush