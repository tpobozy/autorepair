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
                        <td>Rok:</td>
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
                        <td>Nr rejestracyjny:</td>
                        <td colspan="2">Kod do radia:</td>
                    </tr>
                    <tr>
                        <td class="text-bold">{{ $license_number }}</td>
                        <td colspan="2" class="text-bold">{{ $radio_code }}</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="line-height: 5px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>VIN:</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-bold">
                            {{ $vin }}
                        </td>
                    </tr>
                </table>

                <br>
                <br>
                <br>

                <table style="width: 100%;" class="table-details">
                    <tr>
                        <td colspan="3"><span class="subtitle">DANE KLIENTA</span></td>
                    </tr>
                    <tr>
                        <td colspan="2">Nazwa / Imię i nazwisko:</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-bold">{{ $name }}</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="line-height: 5px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2">Adres:</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-bold">{{ $address }}</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="line-height: 5px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>NIP:</td>
                        <td>Telefon:</td>
                    </tr>
                    <tr>
                        <td class="text-bold">
                            {{ $nip }}
                        </td>
                        <td class="text-bold">{{ $telephone }}</td>
                    </tr>
                </table>

                
                <br>
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
