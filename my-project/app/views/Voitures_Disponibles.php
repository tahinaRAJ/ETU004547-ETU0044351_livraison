<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Véhicules disponibles</title>
    <link rel="stylesheet" href="/ETU004547/ETU004351-ETU004547_taxibe/my-project/assets/css/bus-theme.css">
</head>
<body>
    <div class="wrapper">
        <div class="topbar">
            <div class="brand">
                <div class="brand-mark">BUS</div>
                <div>
                    <h1>Véhicules disponibles</h1>
                    <div class="badge">Hors panne à la date choisie</div>
                </div>
            </div>
            <div class="controls" style="gap:8px; flex-wrap: wrap;">
                <a class="button" href="/ETU004547/ETU004351-ETU004547_taxibe/my-project/">Trajets</a>
                <a class="button" href="/ETU004547/ETU004351-ETU004547_taxibe/my-project/benefice_par_jour">Bénéfice / jour</a>
                <a class="button" href="/ETU004547/ETU004351-ETU004547_taxibe/my-project/trajets_rentables">Trajets rentables</a>
            </div>
        </div>

        <div class="card hero">
            <div>
                <h2>Disponibilité</h2>
                <p>Liste des véhicules non en panne.</p>
            </div>
            <form class="controls" method="get" data-filter-form>
                <input class="input" type="date" name="date" value="<?= htmlspecialchars($date ?? '', ENT_QUOTES, 'UTF-8') ?>" data-filter-date>
                <button class="button" type="submit">Filtrer</button>
                <a class="button" href="/ETU004547/ETU004351-ETU004547_taxibe/my-project/voitures_disponibles" style="text-decoration:none;">Réinitialiser</a>
            </form>
        </div>

        <div class="card table-card">
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Véhicule</th>
                            <th>Versement min.</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if (!empty($voitures)) : ?>
                        <?php foreach ($voitures as $voiture): ?>
                            <tr>
                                <td><?= htmlspecialchars($voiture['vehicule_id'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                                <td>
                                    <div class="metric">
                                        <span class="dot"></span>
                                        <span class="tag">
                                            <?= htmlspecialchars($voiture['marque'] ?? '', ENT_QUOTES, 'UTF-8') ?> ·
                                            <?= htmlspecialchars($voiture['modele'] ?? '', ENT_QUOTES, 'UTF-8') ?>
                                        </span>
                                    </div>
                                </td>
                                <td><?= number_format((float)($voiture['versement_minimum'] ?? 0), 2, '.', ' ') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr><td class="empty" colspan="3">Aucun véhicule disponible.</td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="/ETU004547/ETU004351-ETU004547_taxibe/my-project/assets/js/bus-theme.js"></script>
</body>
</html>
