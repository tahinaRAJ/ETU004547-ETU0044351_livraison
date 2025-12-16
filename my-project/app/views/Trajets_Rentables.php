<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trajets rentables</title>
    <link rel="stylesheet" href="/ETU004547/ETU004351-ETU004547_taxibe/my-project/assets/css/bus-theme.css">
</head>
<body>
    <div class="wrapper">
        <div class="topbar">
            <div class="brand">
                <div class="brand-mark">BUS</div>
                <div>
                    <h1>Trajets les plus rentables</h1>
                    <div class="badge">Max (recette - carburant) par jour</div>
                </div>
            </div>
            <div class="controls" style="gap:8px; flex-wrap: wrap;">
                <a class="button" href="/ETU004547/ETU004351-ETU004547_taxibe/my-project/">Trajets</a>
                <a class="button" href="/ETU004547/ETU004351-ETU004547_taxibe/my-project/benefice_par_jour">Bénéfice / jour</a>
                <a class="button" href="/ETU004547/ETU004351-ETU004547_taxibe/my-project/voitures_disponibles">Véhicules dispo</a>
            </div>
        </div>

        <div class="card hero">
            <div>
                <h2>Top par jour</h2>
                <p>Un trajet gagnant par date.</p>
            </div>
            <form class="controls" method="get" data-filter-form>
                <input class="input" type="date" name="date" value="<?= htmlspecialchars(Flight::request()->query->date ?? '', ENT_QUOTES, 'UTF-8') ?>" data-filter-date>
                <button class="button" type="submit">Filtrer</button>
                <a class="button" href="/ETU004547/ETU004351-ETU004547_taxibe/my-project//trajets_rentables" style="text-decoration:none;">Réinitialiser</a>
            </form>
        </div>

        <div class="card table-card">
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>Jour</th>
                            <th>Chauffeur</th>
                            <th>Véhicule</th>
                            <th>Trajet</th>
                            <th>Recette</th>
                            <th>Carburant</th>
                            <th>Bénéfice</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if (!empty($trajets)) : ?>
                        <?php foreach ($trajets as $trajet): ?>
                            <tr>
                                <td><?= htmlspecialchars($trajet['jour'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars($trajet['chauffeur'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                                <td>
                                    <div class="metric">
                                        <span class="dot"></span>
                                        <span class="tag">
                                            <?= htmlspecialchars($trajet['marque'] ?? '', ENT_QUOTES, 'UTF-8') ?> ·
                                            <?= htmlspecialchars($trajet['modele'] ?? '', ENT_QUOTES, 'UTF-8') ?>
                                        </span>
                                    </div>
                                </td>
                                <td><?= htmlspecialchars($trajet['point_depart'] ?? '', ENT_QUOTES, 'UTF-8') ?> → <?= htmlspecialchars($trajet['point_arrivee'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= number_format((float)($trajet['montant_recette'] ?? 0), 2, '.', ' ') ?> Ar</td>
                                <td><?= number_format((float)($trajet['montant_carburant'] ?? 0), 2, '.', ' ') ?> Ar</td>
                                <td><?= number_format((float)($trajet['benefice'] ?? 0), 2, '.', ' ') ?> Ar</td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr><td class="empty" colspan="7">Aucun trajet trouvé.</td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="/ETU004547/ETU004351-ETU004547_taxibe/my-project/assets/js/bus-theme.js"></script>
</body>
</html>
