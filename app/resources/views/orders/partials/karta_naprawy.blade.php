
<div class="col-sm-12">

    @if ($order)
        <div class="row">
            <div class="col-sm-12">
                <span class="help-block pull-right">
                    <a class="btn btn-default" href="{{ route('orders.print_service', $order->id) }}" ><i class="fa fa-print" "></i> drukuj</a>
                </span>
            </div>
        </div>
    @endif

    <h3>Opis Naprawy</h3>
    <hr>
    
    <div class="row">

        <table class="table table-condensed" id="table-services">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Czynność</th>
                    <th>Mechanik</th>
                    <th>Koszt</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0; ?>
                @if ($order)
                    @foreach ($order->services()->get() as $r)
                        <tr>
                            <th scope="row">{{ ($i +1) }}</th>
                            <td>
                                <select class="form-control selectpicker" name="services[{{ $i }}][service_id]" >
                                    <option value=""></option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}" {{ ($r->service_id == $service->id) ? 'selected' : '' }}>{{ $service->title }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select class="form-control selectpicker" name="services[{{ $i }}][employee_id]" >
                                    <option value=""></option>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}" {{ ($r->hasEmployee($employee->id)) ? 'selected' : '' }}>{{ $employee->firstname .' '. $employee->lastname }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="services[{{ $i }}][price]" value="{{ old('services.'. $i .'.price', $r->html_price()) }}">
                            </td>
                        </tr>
                        <?php $i++; ?>
                    @endforeach
                @else
                    <tr>
                        <th scope="row">1</th>
                        <td>
                            <select class="form-control selectpicker" name="services[0][service_id]" >
                                <option value=""></option>
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}" >{{ $service->title }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="form-control selectpicker" name="services[0][employee_id]" >
                                <option value=""></option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}" >{{ $employee->firstname .' '. $employee->lastname }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="services[0][price]" value="{{ old('services.0.price') }}">
                        </td>
                    </tr>
                @endif

                <tr id="services-copy-tr">
                    <td colspan="4">
                        <div style="display: block; position: relative;">
                            <span class="btn-link fa fa-2x fa-plus" id="insert-service-row"></span>
                        </div>
                    </td>
                </tr>

                <tr id="services-template" class="hidden">
                    <th scope="row">#index#</th>
                    <td>
                        <select class="form-control selectpicker" name="services[#number#][service_id]" >
                            <option value=""></option>
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}" >{{ $service->title }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="form-control selectpicker" name="services[#number#][employee_id]" >
                            <option value=""></option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}" >{{ $employee->firstname .' '. $employee->lastname }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="services[#number#][price]" >
                    </td>
                </tr>

            </tbody>
        </table>

    </div>



    <h3>Części użyte do naprawy</h3>
    <hr>


    <div class="row">
        <table class="table table-condensed" id="table-products">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nazwa Towaru</th>
                    <th>Index</th>
                    <th>Hurtownia</th>
                    <th>Data zakupu</th>
                    <th>Nr dokumentu</th>
                    <th>Cena zakupu (netto)</th>
                    <th>Cena sprzedaży (brutto)</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0; ?>
                @if ($order)
                    @foreach ($order->products()->get() as $r)
                        <tr>
                            <th scope="row">{{ ($i +1) }}</th>
                            <td>
                                <input type="text" class="form-control" name="products[{{ $i }}][product]" value="{{ old('products.'. $i .'.product', $r->product) }}">
                            </td>
                            <td>
                                <input type="text" class="form-control" name="products[{{ $i }}][index]" value="{{ old('products.'. $i .'.index', $r->index) }}">
                            </td>
                            <td>
                                <input type="text" class="form-control field-supplier" name="products[{{ $i }}][supplier]" value="{{ old('products.'. $i .'.supplier', $r->supplier) }}">
                            </td>
                            <td>
                                <input type="text" class="form-control datepicker" name="products[{{ $i }}][purchased_at]" value="{{ old('products.'. $i .'.purchased_at', date('Y-m-d', strtotime($r->purchased_at)) ) }}">
                            </td>
                            <td>
                                <input type="text" class="form-control" name="products[{{ $i }}][document]" value="{{ old('products.'. $i .'.document', $r->document) }}">
                            </td>
                            <td>
                                <input type="text" class="form-control" name="products[{{ $i }}][purchased_price]" value="{{ old('products.'. $i .'.purchased_price', $r->html_purchased_price()) }}">
                            </td>
                            <td>
                                <input type="text" class="form-control" name="products[{{ $i }}][selling_price]" value="{{ old('products.'. $i .'.selling_price', $r->html_selling_price()) }}">
                            </td>
                        </tr>
                    <?php $i++; ?>
                    @endforeach
                @else
                    <tr>
                        <th scope="row">1</th>
                        <td>
                            <input type="text" class="form-control" name="products[0][product]" value="{{ old('products.0.product') }}">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="products[0][index]" value="{{ old('products.0.index') }}">
                        </td>
                        <td>
                            <input type="text" class="form-control field-supplier" name="products[0][supplier]" value="{{ old('products.0.supplier') }}">
                        </td>
                        <td>
                            <input type="text" class="form-control datepicker" name="products[0][purchased_at]" value="{{ old('products.0.purchased_at') }}">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="products[0][document]" value="{{ old('products.0.document') }}">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="products[0][purchased_price]" value="{{ old('products.0.purchased_price') }}">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="products[0][selling_price]" value="{{ old('products.0.selling_price') }}">
                        </td>
                    </tr>
                @endif

                <tr id="products-copy-tr">
                    <td colspan="8">
                        <div style="display: block; position: relative;">
                            <span class="btn-link fa fa-2x fa-plus" id="insert-product-row"></span>
                        </div>
                    </td>
                </tr>

                <tr id="products-template" class="hidden">
                    <th scope="row">#index#</th>
                    <td>
                        <input type="text" class="form-control" name="products[#number#][product]" >
                    </td>
                    <td>
                        <input type="text" class="form-control" name="products[#number#][index]" >
                    </td>
                    <td>
                        <input type="text" class="form-control field-supplier" name="products[#number#][supplier]" >
                    </td>
                    <td>
                        <input type="text" class="form-control datepicker" name="products[#number#][purchased_at]" >
                    </td>
                    <td>
                        <input type="text" class="form-control" name="products[#number#][document]" >
                    </td>
                    <td>
                        <input type="text" class="form-control" name="products[#number#][purchased_price]" >
                    </td>
                    <td>
                        <input type="text" class="form-control" name="products[#number#][selling_price]" >
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

</div>