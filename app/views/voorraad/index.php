<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Voorraad</title>
    <style>
        body { font-family: sans-serif; max-width: 800px; margin: 2rem auto; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: .4rem .6rem; text-align: left; }
        .success { background: #e6f4ea; color: #1e6b34; padding: .7rem 1rem; margin-bottom: 1rem; }
    </style>
</head>
<body>
    <h1>Voorraad</h1>

    <?php if ($success): ?>
        <div class="success"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>

    <p><a href="index.php?action=create">+ Nieuw item toevoegen</a></p>

    <table>
        <tr><th>ID</th><th>Naam</th><th>Categorie</th><th>Beschrijving</th><th>Hoeveelheid</th></tr>
        <?php foreach ($items as $item): ?>
            <tr>
                <td><?= (int) $item['id'] ?></td>
                <td><?= htmlspecialchars($item['naam']) ?></td>
                <td><?= htmlspecialchars($item['categorie']) ?></td>
                <td><?= htmlspecialchars($item['korte_beschrijving']) ?></td>
                <td><?= (int) $item['hoeveelheid'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>