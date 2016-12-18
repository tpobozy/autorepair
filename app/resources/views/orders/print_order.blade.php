@extends('layouts.print')

@section('content')

    <div id="body">

        <div id="section_header">
        </div>

        <div id="content">

            <div class="page" style="font-size: 8pt">
                <table style="width: 100%;" class="header">
                    <tr>
                        <td>
                            <table class="table-pieczatka" >
                                <tr>
                                    <td style="border: 1px solid #666;">pieczątka firmowa</td>
                                </tr>
                            </table>
                        </td>
                        <td><p style="text-align: right; font-size: 9pt;">Toruń,&nbsp; {{ date('d-m-Y', strtotime($date)) }}</p></td>
                    </tr>
                </table>

                <br>
                <br>
                
                <table style="width: 100%;" class="table-zlecenie-naprawy">
                    <tr>
                        <td><h2>Zlecenie naprawy nr {{ $number }}</h2></td>
                    </tr>
                </table>

                <br>

                <table style="width: 100%;" class="table-details">
                    <tr>
                        <td colspan="3"><span class="subtitle">OPIS POJAZDU</span></td>
                    </tr>
                    <tr>
                        <td>Marka:</td>
                        <td>Model:</td>
                        <td>Rok produkcji:</td>
                    </tr>
                    <tr>
                        <td class="text-bold">{{ $make }}</td>
                        <td class="text-bold">{{ $model }}</td>
                        <td class="text-bold">{{ $year }}</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="line-height: 5px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Poj. silnika (cm3):</td>
                        <td>Moc (kw):</td>
                        <td>Rodzaj paliwa:</td>
                    </tr>
                    <tr>
                        <td class="text-bold">{{ $engine_size }}</td>
                        <td class="text-bold">{{ $engine_power }}</td>
                        <td class="text-bold">{{ $fuel }}</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="line-height: 5px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Stan licznika:</td>
                        <td colspan="2">Poziom zbiornika paliwa:</td>
                    </tr>
                    <tr>
                        <td class="text-bold">{{ $odometer }}</td>
                        <td colspan="2" class="text-bold">{{ $fuel_level > 0 ? $fuel_level : '' }}</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="line-height: 5px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>VIN:</td>
                        <td>Nr rejestracyjny:</td>
                        <td>Kod do radia:</td>
                    </tr>
                    <tr>
                        <td class="text-bold">{{ $vin }}</td>
                        <td class="text-bold">{{ $license_number }}</td>
                        <td class="text-bold">{{ $radio_code }}</td>
                    </tr>
                </table>

                <br>
                <br>

                <table style="width: 100%;" class="table-details">
                    <tr>
                        <td colspan="3"><span class="subtitle">DANE KLIENTA</span></td>
                    </tr>
                    <tr>
                        <td>Nazwa / Imię i nazwisko:</td>
                        <td>Telefon:</td>
                    </tr>
                    <tr>
                        <td class="text-bold">{{ $name }}</td>
                        <td class="text-bold">{{ $telephone }}</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="line-height: 5px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Adres:</td>
                        <td>NIP:</td>
                    </tr>
                    <tr>
                        <td class="text-bold">{{ $address }}</td>
                        <td class="text-bold">{{ $nip }}</td>
                    </tr>
                </table>

                
                <br>
                <br>

                <table style="width: 100%;" class="table-details">
                    <tr>
                        <td><span class="subtitle">ZLECENIE NAPRAWY</span><span style="font-size: 8pt; background: none;"> - usterki zgłaszane przez klienta</span></td>
                    </tr>
                    <tr>
                        <td>{{ $symptoms }}</td>
                    </tr>
                </table>


                <br>
                <br>
                <div class="pagebreak"></div>

                <table style="width: 100%;" class="table-details">
                    <tr>
                        <td><span class="subtitle">OGLĘDZINY POJAZDU</span></td>
                    </tr>
                    <tr>
                        <td><img src="{{ url('public/img/auto-schemat.jpg') }}" style="width: 700px"></td>
                    </tr>
                    <tr>
                        <td>{{ $review }}</td>
                    </tr>
                </table>


                <br>
                <br>
                
                <table style="width: 100%;" class="table-details">
                    <tr>
                        <td>Zgadzam się na wystawienie samochodu poza teren warsztatu: </td>
                        <td>{{ $is_park_outside == 2 ? 'tak' : ($is_park_outside == 1 ? 'nie' : '-') }}</td>
                    </tr>
                    <tr>
                        <td>Zgadzam się na wykonanie jazdy próbnej</td>
                        <td>{{ $is_test_drive == 2 ? 'tak' : ($is_test_drive == 1 ? 'nie' : '-') }}</td>
                    </tr>
                    <tr>
                        <td>Zostawić wymontowne części do dyspozycji klienta</td>
                        <td>{{ $is_keep_parts == 2 ? 'tak' : ($is_keep_parts == 1 ? 'nie' : '-') }}</td>
                    </tr>
                </table>

                <br>
                <br>
                <br>
                
                <table style="width: 100%;" class="header">
                    <tr>
                        <td>
                            <table class="table-podpis" >
                                <tr>
                                    <td style="border-top: 1px solid #666;">podpis właściciela</td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 30%; text-align: right">
                            <table class="table-podpis" >
                                <tr>
                                    <td style="border-top: 1px solid #666;">podpis przyjmującego</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>

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
