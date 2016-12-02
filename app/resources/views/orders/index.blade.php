@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="panel panel-default panel-orders">
            <div class="panel-heading">Orders</div>

            <div class="panel-body">
                {!! $filters !!}
                <br>
                {!! $grid !!}
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .btn-toolbar .pull-right {
        display: none;
    }
</style>
@endsection