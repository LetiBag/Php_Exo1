<?php


namespace App\Entity;

use App\Interface\Comportement;

abstract class Animal implements Comportement
{
    protected string $nom;
    protected int $age;
    protected string $type;
    protected string $sexe;

    public function __construct(string $nom, int $age, string $type, string $sexe)
    {
        $this->nom = $nom;
        $this->age = $age;
        $this->type = $type;
        $this->sexe = $sexe;
    }

    abstract public function seDeplacer(): string;

    abstract public function emitterSon(): string;
}
