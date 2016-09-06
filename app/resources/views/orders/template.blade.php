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
                        <td><p style="text-align: right; font-size: 9pt;">Toruń,&nbsp;&nbsp; ___-___-______</p></td>
                    </tr>
                </table>

                <br>
                <br>

                <table style="width: 100%;" class="table-zlecenie-naprawy">
                    <tr>
                        <td><h2>Zlecenie naprawy nr <span style="font-weight: normal">____________</span></h2></td>
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
                        <td>____________________</td>
                        <td>____________________</td>
                        <td>____________________</td>
                    </tr>
                    <tr>
                        <td>Poj. silnika (cm3):</td>
                        <td>Moc (kw):</td>
                        <td>Rodzaj paliwa:</td>
                    </tr>
                    <tr>
                        <td>____________________</td>
                        <td>____________________</td>
                        <td>____________________</td>
                    </tr>
                    <tr>
                        <td>Nr rejestracyjny:</td>
                        <td>Kod do radia:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>____________________</td>
                        <td>____________________</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>VIN:</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="3" >
                            <br>

                            <table class="table-vin">
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>

                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>

                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>

                                    <td></td>
                                    <td></td>
                                </tr>
                            </table>
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
                        <td colspan="2">_________________________________________________________________________________________________________</td>
                    </tr>
                    <tr>
                        <td colspan="2">Adres:</td>
                    </tr>
                    <tr>
                        <td colspan="2">_________________________________________________________________________________________________________</td>
                    </tr>
                    <tr>
                        <td>NIP:</td>
                        <td>Telefon:</td>
                    </tr>
                    <tr>
                        <td>
                            <br>

                            <table class="table-nip">
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>

                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </table>
                        </td>
                        <td>___________________________________________</td>
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
                        <td>______________________________________________________________________________________________________________</td>
                    </tr>
                    <tr>
                        <td>______________________________________________________________________________________________________________</td>
                    </tr>
                    <tr>
                        <td>______________________________________________________________________________________________________________</td>
                    </tr>
                    <tr>
                        <td>______________________________________________________________________________________________________________</td>
                    </tr>
                    <tr>
                        <td>______________________________________________________________________________________________________________</td>
                    </tr>
                    <tr>
                        <td>______________________________________________________________________________________________________________</td>
                    </tr>
                    <tr>
                        <td>______________________________________________________________________________________________________________</td>
                    </tr>
                    <tr>
                        <td>______________________________________________________________________________________________________________</td>
                    </tr>
                    <tr>
                        <td>______________________________________________________________________________________________________________</td>
                    </tr>
                    <tr>
                        <td>______________________________________________________________________________________________________________</td>
                    </tr>
                </table>

            </div>

        </div>
    </div>

@endsection

@section('scripts')
<script>
    window.print();
</script>
@endsection