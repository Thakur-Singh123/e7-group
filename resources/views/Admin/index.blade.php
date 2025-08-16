@extends('Admin.Layout.master')
 
@section('content')
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Dashboard</h3>
            </div>
            <div class="ms-md-auto py-2 py-md-0">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                @include('Admin.charts.monthly-outlook')
            </div>
            <div class="col-md-6">
                @include('Admin.charts.h1vsh2')
            </div>
            <div class="col-md-6">
                @include('Admin.charts.performance_per_segment')
            </div>
            <div class="col-md-6">
                @include('Admin.charts.top_country_chart')
            </div>
        </div>
    </div>
@endsection