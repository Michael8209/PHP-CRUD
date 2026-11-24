<?php

require_once __DIR__ . '/../models/Voorraad.php';

class VoorraadController
{
    private Voorraad $model;

    public function __construct(PDO $pdo)
    {
        $this->model = new Voorraad($pdo);
    }

    // Overzicht (minimale lijst zodat je het resultaat van CREATE ziet)
    public function index(): void
    {
        $items = $this->model->all();
        $success = $_SESSION['success'] ?? null;
        unset($_SESSION['success']);
        require __DIR__ . '/../views/voorraad/index.php';
    }

    // Toont het lege formulier (GET)
    public function create(): void
    {
        $errors = $_SESSION['errors'] ?? [];
        $old    = $_SESSION['old'] ?? ['naam' => '', 'categorie' => '', 'korte_beschrijving' => '', 'hoeveelheid' => ''];
        unset($_SESSION['errors'], $_SESSION['old']);
        require __DIR__ . '/../views/voorraad/create.php';
    }

    // Verwerkt het formulier (POST)
    public function store(): void
    {
        $old = [
            'naam'               => trim($_POST['naam'] ?? ''),
            'categorie'          => trim($_POST['categorie'] ?? ''),
            'korte_beschrijving' => trim($_POST['korte_beschrijving'] ?? ''),
            'hoeveelheid'        => trim($_POST['hoeveelheid'] ?? ''),
        ];

        $errors = $this->validate($old);

        if ($errors) {
            $_SESSION['errors'] = $errors;
            $_SESSION['old']    = $old;
            header('Location: index.php?action=create');
            exit;
        }

        $this->model->create($old['naam'], $old['categorie'], $old['korte_beschrijving'], (int) $old['hoeveelheid']);

        $_SESSION['success'] = 'Het item "' . $old['naam'] . '" is succesvol toegevoegd.';
        header('Location: index.php?action=index');
        exit;
    }

    // Servervalidatie, afgestemd op de kolommen in de database
    private function validate(array $d): array
    {
        $e = [];

        if ($d['naam'] === '') {
            $e['naam'] = 'Naam is verplicht.';
        } elseif (mb_strlen($d['naam']) > 30) {
            $e['naam'] = 'Naam mag maximaal 30 tekens zijn.';
        }

        if ($d['categorie'] === '') {
            $e['categorie'] = 'Categorie is verplicht.';
        } elseif (mb_strlen($d['categorie']) > 20) {
            $e['categorie'] = 'Categorie mag maximaal 20 tekens zijn.';
        }

        if ($d['korte_beschrijving'] === '') {
            $e['korte_beschrijving'] = 'Beschrijving is verplicht.';
        } elseif (mb_strlen($d['korte_beschrijving']) > 60) {
            $e['korte_beschrijving'] = 'Beschrijving mag maximaal 60 tekens zijn.';
        }

        if ($d['hoeveelheid'] === '') {
            $e['hoeveelheid'] = 'Hoeveelheid is verplicht.';
        } elseif (filter_var($d['hoeveelheid'], FILTER_VALIDATE_INT, ['options' => ['min_range' => 0, 'max_range' => 127]]) === false) {
            $e['hoeveelheid'] = 'Hoeveelheid moet een heel getal tussen 0 en 127 zijn.';
        }

        return $e;
    }
}
