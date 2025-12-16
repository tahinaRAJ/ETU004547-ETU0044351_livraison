<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bénéfice par jour</title>
    <link rel="stylesheet" href="/ETU004547/ETU004351-ETU004547_taxibe/my-project/assets/css/bus-theme.css">
</head>
<body>
    <div class="wrapper">
        <div class="topbar">
            <div class="brand">
                <div class="brand-mark">BUS</div>
                <div>
                    <h1>Bénéfice par jour</h1>
                    <div class="badge">Total recettes - carburant</div>
                </div>
            </div>
            <div class="controls" style="gap:8px; flex-wrap: wrap;">
                <a class="button" href="/ETU004547/ETU004351-ETU004547_taxibe/my-project/">Trajets</a>
                <a class="button" href="/ETU004547/ETU004351-ETU004547_taxibe/my-project/trajets_rentables">Trajets rentables</a>
                <a class="button" href="/ETU004547/ETU004351-ETU004547_taxibe/my-project/voitures_disponibles">Véhicules dispo</a>
            </div>
        </div>

        <div class="card hero">
            <div>
                <h2>Vue journalière</h2>
                <p>Somme quotidienne des bénéfices.</p>
            </div>
            <form class="controls" method="get" data-filter-form>
                <input class="input" type="date" name="date" value="<?= htmlspecialchars(Flight::request()->query->date ?? '', ENT_QUOTES, 'UTF-8') ?>" data-filter-date>
                <button class="button" type="submit">Filtrer</button>
                <a class="button" href="/benefice_par_jour" style="text-decoration:none;">Réinitialiser</a>
            </form>
        </div>

        <div class="card table-card">
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>Jour</th>
                            <th>Bénéfice total</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if (!empty($benefices)) : ?>
                        <?php foreach ($benefices as $row): ?>
                            <tr>
                                <td><?= htmlspecialchars($row['jour'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= number_format((float)($row['total_benefice'] ?? 0), 2, '.', ' ') ?> Ar</td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr><td class="empty" colspan="2">Aucun résultat.</td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="/ETU004547/ETU004351-ETU004547_taxibe/my-project/assets/js/bus-theme.js"></script>
</body>
</html>
