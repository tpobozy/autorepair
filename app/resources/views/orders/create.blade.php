@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">

            <h2>Nowe Zlecenie naprawy</h2>

            <hr>


            <form class="form-horizontal" role="form" method="POST" action="{{ route('orders.store') }}">
                {!! csrf_field() !!}


                <ul class="nav nav-tabs">
                    <li role="presentation" class="active"><a href="#zlecenie" role="tab" data-toggle="tab">Zlecenie Naprawy</a></li>
                    <li role="presentation"><a href="#karta-naprawy" role="tab" data-toggle="tab">Karta Naprawy Pojazdu</a></li>
                </ul>


                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="zlecenie">
                        @include('orders/partials/zlecenie_naprawy', ['order' => null] )
                    </div>
                    <div role="tabpanel" class="tab-pane" id="karta-naprawy">
                        @include('orders/partials/karta_naprawy', ['order' => null] )
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
<link href="{{ url('/public/libs/jquery-ui/1.11.4/jquery-ui.min.css') }}" rel='stylesheet' type='text/css'>
<style>
    form h3 {
        margin-top: 20px;
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
<script src="{{ url('/public/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ url('/public/libs/jquery-ui/1.11.4/jquery-ui.min.js') }}"></script>
<script src="{{ url('/public/libs/autosize/3.0.15/autosize.min.js') }}"></script>
<script src="{{ url('/public/js/autocomplete-vin.js') }}"></script>
<script src="{{ url('/public/js/autocomplete-name.js') }}"></script>
<script src="{{ url('/public/js/autocomplete-supplier.js') }}"></script>
<script src="{{ url('/public/js/copy-table-rows.js') }}"></script>

<script>
$(document).ready(function(){
    $("#radio_code").inputmask({mask: "****"});
    $("#year").inputmask({mask: "9999"});
    $("#engine_size").inputmask({mask: "9{3,5}"});
    $("#engine_power").inputmask({mask: "9{2,4}"});
    $("#license_number").inputmask({mask: "*{5,8}"});
    $("#vin").inputmask("vin");
    $("#nip").inputmask({mask: "999-999-99-99", placeholder: "999-999-99-99" });
    $("#telephone").inputmask({mask: "99[9]-999-999[9]" });
    $(".datepicker").inputmask({mask: "9999-99-99", placeholder: "YYYY-mm-dd" });
    $(".datepicker").datepicker({
        todayBtn: true,
        autoclose: true,
        todayHighlight: true,
        format: 'yyyy-mm-dd'
    });
	autosize($('textarea'));
    
});
</script>
@endsection
