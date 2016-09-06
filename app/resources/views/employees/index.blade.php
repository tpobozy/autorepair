@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Orders
                <a href="{{ route('employees.create') }}" class="btn btn-xs btn-primary pull-right">
                    <i class="fa fa-plus"></i>
                    nowego pracownika
                </a>
            </div>

            <div class="panel-body">
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