<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes Commandes</title>
    <style>
        body { font-family: sans-serif; margin: 40px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 40px; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: left; }
        h2 { color: #d4af37; }
    </style>
</head>
<body>

<h1>Mes Commandes</h1>

@forelse ($commandes as $commande)
    <div style="margin-bottom: 30px;">
        <h2>Commande #{{ $commande->id }} - {{ $commande->etat }} - {{ $commande->created_at->format('d/m/Y') }}</h2>

        <table>
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>Prix unitaire</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($commande->lignes as $ligne)
                    <tr>
                        <td>{{ $ligne->produit->nom ?? 'Produit supprimé' }}</td>
                        <td>{{ $ligne->quantite }}</td>
                        <td>{{ number_format($ligne->prix_unitaire, 2) }} MAD</td>
                        <td>{{ number_format($ligne->quantite * $ligne->prix_unitaire, 2) }} MAD</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@empty
    <p>Vous n'avez encore passé aucune commande.</p>
@endforelse

</body>
</html>
