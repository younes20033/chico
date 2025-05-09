<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devis CHICO TRANS - {{ $facture_no }}</title>
    <style>
        @page {
            margin: 2cm 1cm;
        }
        body {
            font-family: Arial, sans-serif;
            color: #333;
            line-height: 1.4;
            font-size: 11px;
            margin: 0;
            padding: 0;
        }
        .header {
            width: 100%;
            position: relative;
            height: 120px;
            margin-bottom: 20px;
        }
        .logo-container {
            float: left;
            width: 50%;
        }
        .logo {
            height: 60px;
        }
        .company-info {
            float: right;
            text-align: right;
            width: 50%;
            font-size: 11px;
        }
        .company-name {
            font-size: 14px;
            font-weight: bold;
            color: #333;
            text-transform: uppercase;
        }
        .company-subtitle {
            font-size: 10px;
            color: #666;
            text-transform: uppercase;
        }
        .subtitle {
            font-size: 10px;
            text-transform: uppercase;
        }
        .info-table {
            width: 100%;
            margin-bottom: 15px;
            border-collapse: separate;
            border-spacing: 0 10px;
        }
        .info-left, .info-right {
            width: 48%;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            vertical-align: top;
        }
        .info-right {
            text-align: left;
        }
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0;
        }
        .data-table th, .data-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            font-size: 11px;
        }
        .data-table th {
            background-color: white;
            font-weight: normal;
            font-style: italic;
        }
        .data-table tbody tr td {
            height: 28px;
        }
        .data-table tbody tr:first-child td {
            border-top: 1px solid #ddd;
        }
        .total-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 0;
        }
        .total-table td {
            border: 1px solid #ddd;
            padding: 7px;
            font-size: 11px;
        }
        .total-label {
            text-align: center;
            font-weight: bold;
            font-style: italic;
            width: 70%;
        }
        .total-value {
            text-align: right;
            width: 30%;
        }
        .amount-box {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            margin-top: 20px;
            margin-bottom: 60px;
        }
        .amount-words {
            font-style: italic;
            margin-bottom: 15px;
            line-height: 1.5;
        }
        .payment-mode {
            margin-top: 10px;
        }
        .footer {
            position: fixed;
            bottom: -1cm;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 9px;
            color: #666;
            padding-top: 10px;
            border-top: 1px solid #ddd;
        }
        .clearfix {
            clear: both;
        }
        .stamp {
            position: absolute;
            bottom: -40px;
            right: 20px;
            opacity: 0.8;
            width: 120px;
            height: 120px;
        }
        .bg-image {
            position: fixed;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0.04;
            z-index: -1;
            width: 500px;
        }
    </style>
</head>
<body>
    <div class="bg-image">
        <img src="{{ public_path('/logo.png') }}" width="500">
    </div>
    
    <div class="header">
        <div class="logo-container">
            <img src="{{ public_path('/logo.png') }}" class="logo">
            <div class="subtitle">Le Transport C'est Notre Spécialité</div>
        </div>
        <div class="company-info">
            <div class="company-name">CHICO TRANS</div>
            <div class="company-subtitle">TRANSPORT NATIONAL<br>ET INTERNATIONAL</div>
        </div>
        <div class="clearfix"></div>
    </div>
    
    <table class="info-table">
        <tr>
            <td class="info-left">
                <strong>DATE FACTURE :</strong> {{ $date }}<br>
                <strong>FACTURE N° :</strong> {{ $facture_no }}
            </td>
            <td class="info-right">
                <strong>{{ $recipient['company'] }}</strong><br>
                {{ $recipient['address'] }}<br>
                {{ $recipient['city'] }} {{ $recipient['postal_code'] }}
                @if($recipient['ice'])
                <br><br>
                <strong>ICE:</strong> {{ $recipient['ice'] }}
                @endif
            </td>
        </tr>
    </table>
    
    <table class="data-table">
        <thead>
            <tr>
                <th width="15%">Date</th>
                <th width="20%">Client</th>
                <th width="20%">Destination</th>
                <th width="15%">Prix</th>
                <th width="15%">Type Véhicule</th>
                <th width="15%">Référence</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transports as $transport)
            <tr>
                <td>{{ \Carbon\Carbon::parse($transport['date'])->format('d/m/y') }}</td>
                <td>{{ $recipient['company'] }}</td>
                <td>{{ $transport['destination'] }}</td>
                <td>{{ number_format($transport['price'], 2, ',', ' ') }}</td>
                <td>{{ $transport['vehicle_type'] }}</td>
                <td>{{ $transport['reference'] }}</td>
            </tr>
            @endforeach
            <!-- Lignes vides pour correspondre au format de l'exemple -->
            @for ($i = 0; $i < max(4 - count($transports), 0); $i++)
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            @endfor
        </tbody>
    </table>
    
    <table class="total-table">
        <tr>
            <td class="total-label">TOTAL HT</td>
            <td class="total-value">{{ number_format($totalHT, 2, ',', ' ') }}</td>
        </tr>
        <tr>
            <td class="total-label">TOTAL TVA 13%</td>
            <td class="total-value">{{ number_format($totalTVA, 2, ',', ' ') }}</td>
        </tr>
        <tr>
            <td class="total-label">TOTAL TTC</td>
            <td class="total-value">{{ number_format($totalTTC, 2, ',', ' ') }}</td>
        </tr>
    </table>
    
    <div class="amount-box">
        <div class="amount-words">
            <em>Arrête la présente facture à la somme de :</em><br>
            <strong>{{ $total_in_words }}</strong>
        </div>
        
        <div class="payment-mode">
            <strong>Mode paiement : CHEQUE</strong>
        </div>
        
        <div class="stamp">
            <!-- Espace pour le tampon que vous ajouterez manuellement -->
        </div>
    </div>
    
    <div class="footer">
        R.C 418871 | PATENTE 30350488 | I.F 31859581 | ICE 002179776000022 | CNSS 1265707<br>
        EMAIL: TRANSPORT.CHICOTRANS@GMAIL.COM | GSM +212 663 094 035<br>
        56, RUE IBN AL OUANANE 5020 AIN SEBAA CASABLANCA
    </div>
</body>
</html>