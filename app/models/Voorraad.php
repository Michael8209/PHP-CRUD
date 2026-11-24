<?php

class Voorraad
{
    public function __construct(private PDO $pdo)
    {
    }

    public function create(string $naam, string $categorie, string $beschrijving, int $hoeveelheid): int
    {
        $stmt = $this->pdo->prepare(
            'INSERT INTO voorraadbeheer (naam, categorie, korte_beschrijving, hoeveelheid)
             VALUES (:naam, :categorie, :beschrijving, :hoeveelheid)'
        );
        $stmt->execute([
            ':naam'         => $naam,
            ':categorie'    => $categorie,
            ':beschrijving' => $beschrijving,
            ':hoeveelheid'  => $hoeveelheid,
        ]);
        return (int) $this->pdo->lastInsertId();
    }

    public function all(): array
    {
        return $this->pdo->query('SELECT * FROM voorraadbeheer ORDER BY id DESC')->fetchAll();
    }
}
