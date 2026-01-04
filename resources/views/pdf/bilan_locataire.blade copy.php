<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bilan des paiements - {{ $locataire->nom ?? '' }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #000;
            margin: 20px;
        }

       /* .header {
            text-align: center;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        .header h2 {
            margin: 0;
            font-size: 18px;
            text-transform: uppercase;
        }

        .header small {
            font-size: 12px;
            color: #555;
        }

        .info {
            margin-bottom: 10px;
        }*/

  .header {
        width: 100%;
        border-bottom: 2px solid #000;
        padding-bottom: 10px;
        margin-bottom: 15px;
    }

    .header-table {
        width: 100%;
        border-collapse: collapse;
    }

    .header-table td {
        vertical-align: middle;
    }

    .header-left {
        width: 100px;
        text-align: left;
    }

    .header-center {
        text-align: center;
    }

    .header img.logo {
        width: 80px;
        height: auto;
    }

    .header h2 {
        margin: 0;
        font-size: 18px;
        text-transform: uppercase;
    }

    .header small {
        font-size: 12px;
        color: #555;
    }
.info {
            margin-bottom: 10px;
        }
.info p {
            margin: 2px 0;
        }

        .title {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            text-decoration: underline;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;
        }

        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .total {
            text-align: right;
            margin-top: 10px;
            font-size: 13px;
        }

        .footer {
            text-align: center;
            font-size: 11px;
            margin-top: 25px;
            border-top: 1px dashed #555;
            padding-top: 10px;
            color: #444;
        }

        .logo {
            width: 80px;
            height: auto;
            margin-bottom: 5px;
        }

        .highlight {
            font-weight: bold;
            color: #1a73e8;
        }
    </style>
</head>
<body>

<div class="header">
    <table class="header-table">
        <tr>
            <td class="header-left">
                @if(file_exists(public_path('assets/images/imagelogo.png')))
                    <img src="{{ public_path('assets/images/imagelogo.png') }}" class="logo" alt="Logo">
                @endif
            </td>
            <td class="header-center">
                <h2>REÇU - BILAN DES PAIEMENTS</h2>
                <small>{{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</small>
            </td>
        </tr>
    </table>
</div>

    <div class="info">
        <p><strong>Locataire :</strong> {{ strtoupper($locataire->nom) }} {{ ucfirst($locataire->prenom) }}</p>
        <p><strong>Appartement :</strong> {{ $locataire->numappartement }}</p>
        <p><strong>Entrée le :</strong> {{ $locataire->dateentree ? \Carbon\Carbon::parse($locataire->dateentree)->format('d/m/Y') : '-' }}</p>
    </div>

    <div class="title">Bilan des Paiements Mensuels</div>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Mois</th>
                <th>Date Paiement</th>
                <th>Montant Versé (FCFA)</th>
                <th>Reliquat (FCFA)</th>
                <th>Loyer (FCFA)</th>
            </tr>
        </thead>
        <tbody>
            @php 
                $totalVerse = 0; 
                $totalReliquat = 0;
                $totalLoyer = 0;
            @endphp
            @foreach($paiements as $index => $p)
                @php 
                    $totalVerse += $p->montantmensuelverse;
                    $totalReliquat += $p->relicatloyer;
                    $totalLoyer += $p->montantloyer;
                    $moisLoyer = \Carbon\Carbon::parse($p->moispaieloyer . '-01')->locale('fr')->translatedFormat('F Y');
                @endphp
                <tr>
                    <td>{{ $index + 1 }}</td>
                     
                    <td>{{ $moisLoyer }}</td>
                    <td>{{ \Carbon\Carbon::parse($p->daterengloyer)->format('d/m/Y') }}</td>
                    <td>{{ number_format($p->montantmensuelverse, 0, ',', ' ') }}</td>
                    <td>{{ number_format($p->relicatloyer, 0, ',', ' ') }}</td>
                    <td>{{ number_format($p->montantloyer, 0, ',', ' ') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="total">
        <p><strong>Total versé :</strong> <span class="highlight">{{ number_format($totalVerse, 0, ',', ' ') }} FCFA</span></p>
        <p><strong>Total reliquat :</strong> 
            @if($totalReliquat > 0)
                <span style="color:red;font-weight:bold;">{{ number_format($totalReliquat, 0, ',', ' ') }} FCFA</span>
            @else
                <span>{{ number_format($totalReliquat, 0, ',', ' ') }} FCFA</span>
            @endif
        </p>
        <p><strong>Total loyers dus :</strong> {{ number_format($totalLoyer, 0, ',', ' ') }} FCFA</p>
    </div>

    <div class="footer">
        Merci pour votre ponctualité. Ce document fait office de bilan global de paiements.
        <br>Généré automatiquement par le système - {{ config('app.name') }}
    </div>

</body>
</html>
