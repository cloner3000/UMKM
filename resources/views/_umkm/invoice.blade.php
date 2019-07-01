<!DOCTYPE html>
<html lang="id">
<head>
    <title>Tagihan</title>
    <style>
        @media print {
            a[href]:after {
                content: none !important;
            }
        }
        @page {
            size: A4 portrait;
            margin: 0;
        }
        body {
            font-family: open sans, tahoma, sans-serif;
            -webkit-print-color-adjust: exact;
        }
        .watermark {
            position: fixed;
            top: 0;
            right: 0;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
            opacity: .13;
        }
        .sign {
            position: absolute;
            top: 38.5rem;
            left: 31.5rem;
            width: 150px;
            display: {{$order->status_payment > 1 ? '' : 'none'}};
        }
        .container {
            width: 80%;
            height: 100%;
            margin: 0 auto;
        }
        .invoice {
            position: absolute;
            left: -6.2rem;
            top: 13.5rem;
            font-weight: 600;
            font-size: 48px;
            -webkit-transform: rotate(-90deg);
            -moz-transform: rotate(-90deg);
            -ms-transform: rotate(-90deg);
            -o-transform: rotate(-90deg);
            transform: rotate(-90deg);
        }
        .items {
            width: 100%;
            text-align: center;
            padding: 15px 0;
            border: 1px solid black;
            border-collapse: collapse;
            font-size: 14px;
        }
        .items th, .items td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        a {
            font-size: 14px;
            text-decoration: none;
        }
        .paid, .text-purple {
            color: #1e8bc3;
        }
        .unpaid {
            color: #f23a2e;
        }
    </style>
</head>
<body >
{{--<img class="watermark" alt="watermark"--}}
     {{--src="{{asset('images/shop.png')}}">--}}
{{--<img class="sign" alt="stamp" src="{{asset('images/stamp_paid.png')}}">--}}
<div class="container">
    {{--<div class="invoice">Invoice <span style="color: #1e8bc3">Atas Nama</span></div>--}}
    <table cellspacing="0" cellpadding="0" style="margin-top: 4.5rem">
        <tr>
            <td>
                <table cellspacing="0" cellpadding="0"
                       style="width: 100%; padding-bottom: 20px;font-weight: 600;font-size: 14px">
                    <tbody>
                    <tr style="margin-bottom: 8px;">
                        <td>
                            <h2 class="text-purple" style="margin-bottom: 10px">{{$umkm->nama}}</h2>
                            <span>{{$umkm->alamat}}</span>
                            <table style="margin-left: -3px;margin-top: 10px">
                                <tr>
                                    <td>Phone</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>{{$umkm->no_telp}}</td>
                                </tr>
                                <tr>
                                    <td>E-mail</td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td></td>
                                </tr>
                            </table>
                        </td>
                        <td style="text-align: center">
                            {{--<img src="{{asset('images/logo_purple_ver.png')}}" alt="Print"--}}
                                 {{--style="vertical-align: middle;width: 150px">--}}
                        </td>
                    </tr>
                    </tbody>
                </table>

                <table cellspacing="0" cellpadding="0"
                       style="width: 100%; padding-bottom: 15px;border-top: 3px solid #1e8bc3">
                    <tbody>
                    <tr style="font-weight: 600;">
                        <td style="padding: 0 10px;">
                            <span class="text-purple">Bill To</span>
                            <p>{{$buyer->first_name}}<br>{{$buyer->alamat}}<br>{{$buyer->no_telp}}
                            </p>
                        </td>
                        <td style="padding: 0 10px;">
                            <span class="text-purple">Ship To</span>
                            <p>Nama Pembeli<br>Alamat Pembeli<br>NO telp
                            </p>
                        </td>
                        <td style="padding: 0 10px; vertical-align: top">
                            <table style="margin-top:-11px;border-collapse:separate;-webkit-border-vertical-spacing: 10px;vertical-align: top">
                                <tr>
                                    <td class="text-purple" style="text-align: right">Invoice&nbsp;Date</td>
                                    <td>&emsp;</td>
                                    <td>{{\Carbon\Carbon::parse($order->created_at)->format('m/d/Y')}}</td>
                                </tr>
                                <tr>
                                    <td class="text-purple" style="text-align: right">P.O</td>
                                    <td>&emsp;</td>
                                    <td>TGL</td>
                                </tr>
                                <tr>
                                    <td class="text-purple" style="text-align: right">Due&nbsp;Date</td>
                                    <td>&emsp;</td>
                                    <td>
                                        {{--{{\Carbon\Carbon::parse($order->start)->subDays(2)->format('m/d/Y')}}--}}
                                        TGL
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>

                <table class="items" cellspacing="0" cellpadding="0" style="width: 100%; padding-bottom: 15px;">
                    <thead>
                    <tr style="background-color: #1e8bc3;color: #fff;text-align: center">
                        <th style="padding: 2px 8px;">Qty</th>
                        <th style="padding: 2px 8px;">Description</th>
                        <th style="padding: 2px 8px;">Unit Price</th>
                        <th style="padding: 2px 8px;">Amount</th>
                    </tr>
                    </thead>
                    <tbody style="font-weight: 600">
                    <tr>
                        <td style="text-align: center">{{$order->qty}}</td>
                        <td style="text-align: justify;padding: 0 5px"></td>
                        <td style="text-align: right;padding-right: 5px">Harga</td>
                        <td style="text-align: right;padding-right: 5px">Harga</td>
                    </tr>
                    </tbody>
                </table>

                <table cellspacing="0" cellpadding="0" style="text-align: right; padding: 2rem 0 3rem 0;float: right">
                    <tbody>
                    <tr>
                        <td style="font-weight: 600">Total Bill</td>
                        <td>&emsp;&emsp;&emsp;</td>
                        <td style="font-weight: 600">346436345168</td>
                    </tr>
                    <tr>
                        <td>Payment Type (<b>Cara bayyar </b>)</td>
                        <td>&emsp;&emsp;&emsp;</td>
                        <td style="font-weight: 600">DP ta FP</td>
                    </tr>
                    <tr style="font-weight: 800" class="text-purple">
                        <td>Amount to Pay</td>
                        <td>&emsp;&emsp;&emsp;</td>
                        <td>RpSeng kudu dibayar</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>Surabaya, {{now()->format('j F Y')}}<br><br><br><br>Admin<br><br><br></td>
                    </tr>
                    </tbody>
                </table>

                <table cellspacing="0" cellpadding="0"
                       style="width: 100%;border-top: 3px solid #1e8bc3">
                    <tbody>
                    <tr style="font-weight: 600;">
                        <td style="padding: 0 10px;">
                            <span class="text-purple">Terms & Condition</span>
                            <p style="font-size: 14px">
                                Payment is due within 3 days<br><br>

                                   NAMA<br>
                                    Account Number: NOMOR AKUN NAMA AKUN

                            </p>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </table>
</div>
</body>
</html>
