<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Reçu de Paiement</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f6f9;
            color: #333;
            font-size: 10px;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            border: 1px solid #ddd;
        }
        .header {
            background: #2c3e50;
            color: #fff;
            padding: 20px 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .header .logo img {
            height: 50px;
        }

        .logoimg {
    width: 25% !important;
    height:auto !important;
}
        .header .title {
            text-align: right;
        }
        .header .title h1 {
            margin: 0;
            font-size: 13px;
            letter-spacing: 1px;
        }
        .header .title p {
            margin: 5px 0 0;
            font-size: 13px;
        }
        .details {
            padding: 20px 30px;
            border-bottom: 1px solid #eee;
            line-height: 1.6;
        }
        .details strong {
            color: #2c3e50;
        }
        .recu-info {
            padding: 10px 30px;
            font-size: 10px;
            background: #f9f9f9;
            border-bottom: 1px solid #eee;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        .table th {
            background: #27ae60;
            color: #fff;
            padding: 10px;
            font-size: 13px;
            text-transform: uppercase;
        }
        .table td {
            border: 1px solid #eee;
            padding: 10px;
            text-align: center;
            font-size: 10px;
        }
        .table td.verse {
            color: #27ae60;
            font-weight: bold;
        }
        .table td.reliquat {
            color: #e74c3c;
            font-weight: bold;
        }
        .total {
            text-align: right;
            padding: 15px 30px;
            font-size: 10px;
            font-weight: bold;
            color: #27ae60;
            background: #f9f9f9;
            border-top: 2px solid #eee;
        }
        .signature {
            padding: 30px;
            text-align: right;
        }
        .signature .line {
            margin-top: 50px;
            border-top: 1px solid #333;
            width: 200px;
            float: right;
        }
        .signaturelab {
            /*padding: 30px;*/
            text-align: right;
        }
        .footer {
            padding: 15px 30px;
            text-align: center;
            font-size: 10px;
            color: #999;
            background: #fafafa;
            border-top: 1px solid #eee;
        }
        .badge {
            display: inline-block;
            padding: 4px 10px;
            font-size: 10px;
            font-weight: bold;
            border-radius: 12px;
        }
        .badge-success { background: #27ae60; color: #fff; }
        .badge-warning { background: #f39c12; color: #fff; }
        .badge-danger { background: #e74c3c; color: #fff; }
    </style>
</head>
<body>
    <div class="container">
        <!-- HEADER -->
        <div class="header">
            <div class="logo">
                <img src="{{ public_path('assets/images/imagelogo.png') }}" class="logoimg" alt="Logo" >
            </div>
            <div class="title">
                <h1>Reçu de Paiement</h1>
                <p>Reçu N° {{ strtoupper(uniqid('REC-')) }}</p>
            </div>
        </div>

        <!-- INFOS REÇU -->
        <div class="recu-info">
            Émis le : {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }}
        </div>

        <!-- DETAILS LOCATAIRE -->
        <div class="details">
            <p>
                <strong>Locataire :</strong> {{ $locataire->nom ?? '---' }} {{ $locataire->prenom ?? '---' }} <br>
                <strong>Appartement :</strong> {{ $locataire->numappartement ?? '---' }} <br>
                <strong>Date du paiement :</strong> {{ \Carbon\Carbon::parse($datevers)->format('d/m/Y') }} <br>
                <strong>Mode de paiement :</strong> {{ ucfirst($modepaie) }}
            </p>
        </div>

        <!-- TABLE -->
        <table class="table">
            <thead>
                <tr>
                    <th>Mois payé</th>
                    <th>Loyer mensuel</th>
                    <th>Montant versé</th>
                    <th>Reliquat</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                  @php 
        $totalVerse = 0; 
        \Carbon\Carbon::setLocale('fr'); // définir la langue française
    @endphp
                @foreach($paiements as $paiement)
                @php 
                    $totalVerse += $paiement->montantmensuelverse; 
                    $status = $paiement->relicatloyer > 0 ? 'Partiel' : 'Payé';
                @endphp
                <tr>
                    <td>{{ \Carbon\Carbon::createFromFormat('Y-m', $paiement->moispaieloyer)->translatedFormat('M Y') }}</td>
                    <td>{{ number_format($paiement->montantloyer, 0, ',', ' ') }} FCFA</td>
                    <td class="verse">{{ number_format($paiement->montantmensuelverse, 0, ',', ' ') }} FCFA</td>
                    <td class="reliquat">{{ number_format($paiement->relicatloyer, 0, ',', ' ') }} FCFA</td>
                    <td>
                        @if($paiement->relicatloyer > 0)
                            <span class="badge badge-warning">{{ $status }}</span>
                        @else
                            <span class="badge badge-success">{{ $status }}</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- TOTAL -->
        <div class="total">
            Total payé : {{ number_format($totalVerse, 0, ',', ' ') }} FCFA
        </div>

        <!-- SIGNATURE -->
        <div class="signature" style='display:none;'>
            <p>Signature du bailleur</p>
            <div class="line"></div>
        </div>
 <div class="signaturelab" style='padding-right:10px;padding-top:10px;' > Cachet et Signature du bailleur</div>
<table style="width:100%; margin-top:-15px;border-collapse:collapse; border:none;">
    <tr style="border:none;">

        <!-- Cachet à gauche -->
        <td style="width:50%; vertical-align:top; text-align:left;border:none;">
          
        </td>

        <!-- Totaux à droite -->
        <td style="width:50%; vertical-align:top; text-align:right;border:none;">
                   <div > @if(isset($cachet))
                <img src="{{ public_path($cachet->chemin_cachet) }}" alt="Cachet" style="width:50%; height:auto;" />
                      @else
                    <span >Aucune Image</span>
                    
                     @endif</div>
        </td>

    </tr>
</table>
        <!-- FOOTER -->
        <div class="footer">
            Merci pour votre paiement. Pour toute réclamation, contactez le Controleur Financier.<br>
            &copy; {{ date('Y') }} GestLoyer - Tous droits réservés
        </div>
    </div>
</body>
</html>
