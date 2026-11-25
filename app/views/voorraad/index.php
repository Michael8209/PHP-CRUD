<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Voorraad</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main class="container">
    <h1>Voorraad</h1>

    <?php if ($success): ?>
        <div class="success"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>

    <p class="actions"><a class="button" href="index.php?action=create">+ Nieuw item toevoegen</a></p>

    <div class="table-wrap">
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
    </div>
    </main>
</body>
</html>