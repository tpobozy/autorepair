
<div class="col-sm-12">

    @if ($order)
        <div class="row">
            <div class="col-sm-12">
                <span class="help-block pull-right">
                    <a class="btn btn-default" href="{{ route('orders.print_order', $order->id) }}" ><i class="fa fa-print" "></i> drukuj</a>
                </span>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}">
                <label class="col-sm-4 control-label">Nr Zlecenia*</label>

                <div class="col-sm-8">
                    <input type="text" class="form-control" name="number" id="number" value="{{ old('number', ($order) ? $order->number : null) }}" required>

                    @if ($errors->has('number'))
                        <span class="help-block">
                            <strong>{{ $errors->first('number') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                <label class="col-sm-4 control-label">Data</label>

                <div class="col-sm-6">
                    <input type="text" class="form-control datepicker" name="date" value="{{ old('date', ($order) ? $order->date : date('Y-m-d')) }}" >

                    @if ($errors->has('date'))
                        <span class="help-block">
                            <strong>{{ $errors->first('date') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>


    <h3>Dane Klienta</h3>
    <hr>


    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label class="col-sm-3 control-label">Nazwa / Imię i nazwisko*</label>

        <div class="col-sm-9">
            <input type="text" class="form-control input-yellow" name="name" id="name" value="{{ old('name', ($order) ? $order->name : null) }}" required>

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="client-group">
        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
            <label class="col-sm-3 control-label">Adres</label>

            <div class="col-sm-9">
                <input type="text" class="form-control" name="address" id="address" value="{{ old('address', ($order) ? $order->address : null) }}">

                @if ($errors->has('address'))
                    <span class="help-block">
                        <strong>{{ $errors->first('address') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group{{ $errors->has('nip') ? ' has-error' : '' }}">
                    <label class="col-sm-6 control-label">NIP</label>

                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="nip" id="nip" value="{{ old('nip', ($order) ? $order->nip : null) }}" >

                        @if ($errors->has('nip'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nip') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
                    <label class="col-sm-6 control-label">Telefon*</label>

                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="telephone" id="telephone" value="{{ old('telephone', ($order) ? $order->telephone : null) }}" required>

                        @if ($errors->has('telephone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('telephone') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h3>Opis Pojazdu</h3>
    <hr>

    <div class="form-group{{ $errors->has('vin') ? ' has-error' : '' }}">
        <label class="col-sm-3 control-label">VIN*</label>

        <div class="col-sm-9">
            <input type="text" class="form-control input-yellow" name="vin" id="vin" value="{{ old('vin', ($order) ? $order->vin : null) }}" required>

            @if ($errors->has('vin'))
                <span class="help-block">
                    <strong>{{ $errors->first('vin') }}</strong>
                </span>
            @endif
        </div>
    </div>


    <div class="car-group">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group{{ $errors->has('make') ? ' has-error' : '' }}">
                    <label class="col-sm-6 control-label">Marka*</label>

                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="make" id="make" value="{{ old('make', ($order) ? $order->make : null) }}" required>

                        @if ($errors->has('make'))
                            <span class="help-block">
                                <strong>{{ $errors->first('make') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group{{ $errors->has('model') ? ' has-error' : '' }}">
                    <label class="col-sm-6 control-label">Model*</label>

                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="model" id="model" value="{{ old('model', ($order) ? $order->model : null) }}" required>

                        @if ($errors->has('model'))
                            <span class="help-block">
                                <strong>{{ $errors->first('model') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-6">
                <div class="form-group{{ $errors->has('license_number') ? ' has-error' : '' }}">
                    <label class="col-sm-6 control-label">Nr rejestracyjny*</label>

                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="license_number" id="license_number" value="{{ old('license_number', ($order) ? $order->license_number : null) }}" required>

                        @if ($errors->has('license_number'))
                            <span class="help-block">
                                <strong>{{ $errors->first('license_number') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
                    <label class="col-sm-6 control-label">Rok produkcji</label>

                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="year" id="year" value="{{ old('year', ($order) ? $order->year : null) }}">

                        @if ($errors->has('year'))
                            <span class="help-block">
                                <strong>{{ $errors->first('year') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-6">
                <div class="form-group{{ $errors->has('engine_size') ? ' has-error' : '' }}">
                    <label class="col-sm-6 control-label">Poj. silnika (cm3)</label>

                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="engine_size" id="engine_size" value="{{ old('engine_size', ($order) ? $order->engine_size : null) }}">
                        <?php /*<span class="help-block help-info">w cm, np. 1600</span>*/ ?>

                        @if ($errors->has('engine_size'))
                            <span class="help-block">
                                <strong>{{ $errors->first('engine_size') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group{{ $errors->has('engine_power') ? ' has-error' : '' }}">
                    <label class="col-sm-6 control-label">Moc (kw)</label>

                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="engine_power" id="engine_power" value="{{ old('engine_power', ($order) ? $order->engine_power : null) }}">
                        <?php /*<span class="help-block help-info">w kw, np. 120</span>*/ ?>

                        @if ($errors->has('engine_power'))
                            <span class="help-block">
                                <strong>{{ $errors->first('engine_power') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-6">
                <div class="form-group{{ $errors->has('fuel') ? ' has-error' : '' }}">
                    <label class="col-sm-6 control-label">Rodzaj paliwa</label>

                    <div class="col-sm-6">

                        <label class="radio-inline">
                            <input type="radio" name="fuel" id="fuel-petrol" value="petrol" {{ ($order AND $order->fuel == 'petrol') ? 'checked' : '' }} > benzyna
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="fuel" id="fuel-diesel" value="diesel" {{ ($order AND $order->fuel == 'diesel') ? 'checked' : '' }} > diesel
                        </label>

                        @if ($errors->has('fuel'))
                            <span class="help-block">
                                <strong>{{ $errors->first('fuel') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group{{ $errors->has('odometer') ? ' has-error' : '' }}">
                    <label class="col-sm-6 control-label">Stan licznika</label>

                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="odometer" id="odometer" value="{{ old('odometer', ($order) ? $order->odometer : null) }}">

                        @if ($errors->has('odometer'))
                            <span class="help-block">
                                <strong>{{ $errors->first('odometer') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-6">
                <div class="form-group{{ $errors->has('fuel_level') ? ' has-error' : '' }}">
                    <label class="col-sm-6 control-label">Poziom zbiornika paliwa</label>

                    <div class="col-sm-6">

                        <select class="form-control selectpicker" name="fuel_level" >
                            <option value=""></option>
                            <option value="1" {{ ($order AND $order->fuel_level == 1) ? 'selected' : '' }}>0 (rezerwa)</option>
                            <option value="25" {{ ($order AND $order->fuel_level == 25) ? 'selected' : '' }}>1/4</option>
                            <option value="50" {{ ($order AND $order->fuel_level == 50) ? 'selected' : '' }}>1/2</option>
                            <option value="75" {{ ($order AND $order->fuel_level == 75) ? 'selected' : '' }}>3/4</option>
                            <option value="100" {{ ($order AND $order->fuel_level == 100) ? 'selected' : '' }}>1</option>
                        </select>

                        @if ($errors->has('fuel_level'))
                            <span class="help-block">
                                <strong>{{ $errors->first('fuel_level') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group{{ $errors->has('radio_code') ? ' has-error' : '' }}">
                    <label class="col-sm-6 control-label">Kod radia</label>

                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="radio_code" id="radio_code" value="{{ old('radio_code', ($order) ? $order->radio_code : null) }}">

                        @if ($errors->has('radio_code'))
                            <span class="help-block">
                                <strong>{{ $errors->first('radio_code') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <h3>Usterki zgłaszane przez klienta</h3>
    <hr>

    <div class="form-group{{ $errors->has('symptoms') ? ' has-error' : '' }}">

        <div class="col-sm-11 col-sm-offset-1">
            <textarea class="form-control" name="symptoms" >{{ old('symptoms', ($order) ? $order->symptoms : null) }}</textarea>

            @if ($errors->has('symptoms'))
                <span class="help-block">
                    <strong>{{ $errors->first('symptoms') }}</strong>
                </span>
            @endif
        </div>
    </div>


    <h3>Oględziny pojazdu</h3>
    <hr>

    <div class="form-group{{ $errors->has('review') ? ' has-error' : '' }}">

        <div class="col-sm-11 col-sm-offset-1">
            <textarea class="form-control" name="review" >{{ old('review', ($order) ? $order->review : null) }}</textarea>

            @if ($errors->has('review'))
                <span class="help-block">
                    <strong>{{ $errors->first('review') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>

