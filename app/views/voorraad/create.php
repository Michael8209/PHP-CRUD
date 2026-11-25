<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nieuw item toevoegen</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main class="container">
    <h1>Nieuw item toevoegen</h1>

    <form action="index.php?action=store" method="post" novalidate>
        <?php
        $fields = [
            'naam'               => ['Naam', 'text', 30],
            'categorie'          => ['Categorie', 'text', 20],
            'korte_beschrijving' => ['Korte beschrijving', 'text', 60],
            'hoeveelheid'        => ['Hoeveelheid', 'number', null],
        ];
        foreach ($fields as $name => [$label, $type, $max]): ?>
            <label for="<?= $name ?>"><?= htmlspecialchars($label) ?></label>
            <input type="<?= $type ?>" id="<?= $name ?>" name="<?= $name ?>"
                   value="<?= htmlspecialchars($old[$name]) ?>"
                   <?= $max ? 'maxlength="' . $max . '"' : 'min="0" max="127"' ?>
                   class="<?= isset($errors[$name]) ? 'invalid' : '' ?>">
            <?php if (isset($errors[$name])): ?>
                <div class="error"><?= htmlspecialchars($errors[$name]) ?></div>
            <?php endif; ?>
        <?php endforeach; ?>

        <div class="form-actions">
            <button type="submit">Opslaan</button>
            <a href="index.php?action=index">Annuleren</a>
        </div>
    </form>
    </main>
</body>
</html>
