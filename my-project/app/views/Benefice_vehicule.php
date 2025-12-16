<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bénéfice par véhicule</title>
    <link rel="stylesheet" href="/ETU004547/ETU004351-ETU004547_taxibe/my-project/assets/css/bus-theme.css">
</head>
<body>
    <div class="wrapper">
        <div class="topbar">
            <div class="brand">
                <div class="brand-mark">BUS</div>
                <div>
                    <h1>Bénéfice véhicule</h1>
                    <div class="badge">Synthèse recettes - carburant</div>
                </div>
            </div>
            <div class="controls" style="gap:8px; flex-wrap: wrap;">
                <a class="button" href="/ETU004547/ETU004351-ETU004547_taxibe/my-project/">Trajets</a>
                <a class="button" href="/ETU004547/ETU004351-ETU004547_taxibe/my-project/benefice_par_jour">Bénéfice / jour</a>
                <a class="button" href="/ETU004547/ETU004351-ETU004547_taxibe/my-project/trajets_rentables">Trajets rentables</a>
                <a class="button" href="/ETU004547/ETU004351-ETU004547_taxibe/my-project/voitures_disponibles">Véhicules dispo</a>
            </div>
        </div>

        <div class="card hero">
            <div>
                <h2>Détail par véhicule</h2>
                <p>Marque, modèle et bénéfice total calculé.</p>
            </div>
            <div class="badge">Vue agrégée</div>
        </div>

        <div class="card table-card">
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>Véhicule</th>
                            <th>Bénéfice total</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if (!empty($voitures)) : ?>
                        <?php foreach ($voitures as $voiture): ?>
                            <tr>
                                <td>
                                    <div class="metric">
                                        <span class="dot"></span>
                                        <span class="tag">
                                            <?= htmlspecialchars($voiture['marque'] ?? '', ENT_QUOTES, 'UTF-8') ?> ·
                                            <?= htmlspecialchars($voiture['modele'] ?? '', ENT_QUOTES, 'UTF-8') ?>
                                        </span>
                                    </div>
                                </td>
                                <td><?= number_format((float)($voiture['total_benefice'] ?? 0), 2, '.', ' ') ?> Ar</td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr><td class="empty" colspan="2">Aucun véhicule trouvé.</td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="/ETU004547/ETU004351-ETU004547_taxibe/my-project/assets/js/bus-theme.js"></script>
</body>
</html>