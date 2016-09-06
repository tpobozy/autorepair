@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-sm-offset-1">

            <h2>Edycja Pracownika</h2>

            <hr>


            <form class="form-horizontal" role="form" method="POST" action="{{ route('employees.update', $employee->id) }}">
                {!! csrf_field() !!}
                {!! method_field('PUT') !!}


                <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Imię*</label>

                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="firstname" value="{{ old('firstname', $employee->firstname) }}">

                        @if ($errors->has('firstname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('firstname') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>


                <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label">Nazwisko*</label>

                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="lastname" value="{{ old('lastname', $employee->lastname) }}">

                        @if ($errors->has('lastname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('lastname') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>



                <div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
                    <label class="col-sm-6 control-label">Telefon*</label>

                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="telephone" id="telephone" value="{{ old('telephone', $employee->telephone) }}">

                        @if ($errors->has('telephone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('telephone') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>




                <br><br>

                <div class="form-group">
                    <div class="col-sm-6 col-sm-offset-4">
                        <button type="submit" class="btn btn-lg btn-primary" style="width: 100%">Zapisz</button>
                    </div>
                </div>

                
                <br><br><br>

            </form>

            
        </div>
    </div>
</div>
@endsection



@section('styles')
<link href="{{ url('/public/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker3.min.css') }}" rel='stylesheet' type='text/css'>
<style>
    form h3 {
        margin-top: 30px;
        margin-bottom: 0px;
        font-size: 22px;
    }
    form hr {
        margin-top: 10px;
    }
</style>
@endsection


@section('scripts')
<script src="{{ url('/public/libs/inputmask/3.3.1/jquery.inputmask.bundle.min.js') }}"></script>
<script>
$(document).ready(function(){
    $("#telephone").inputmask({mask: "99[9]-999-999[9]" });
});
</script>
@endsection