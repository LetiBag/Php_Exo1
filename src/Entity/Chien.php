<?php


namespace App\Entity;

class Chien extends Animal
{
    private string $race;

    public function __construct(string $nom, int $age, string $sexe, string $race)
    {
        parent::__construct($nom, $age, 'Chien', $sexe);
        $this->race = $race;
    }

    public function seDeplacer(): string
    {
        return "Je cours";
    }

    public function emitterSon(): string
    {
        return "Woof! Woof!";
    }
}
