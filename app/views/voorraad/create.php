<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Nieuw item toevoegen</title>
    <style>
        body { font-family: sans-serif; max-width: 480px; margin: 2rem auto; }
        label { display: block; margin-top: 1rem; font-weight: bold; }
        input { width: 100%; padding: .4rem; box-sizing: border-box; }
        .error { color: #b00020; font-size: .9rem; margin-top: .2rem; }
        input.invalid { border: 1px solid #b00020; }
        button { margin-top: 1.5rem; padding: .5rem 1rem; }
    </style>
</head>
<body>
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

        <button type="submit">Opslaan</button>
        <a href="index.php?action=index">Annuleren</a>
    </form>
</body>
</html>
