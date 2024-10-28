<?php

namespace App\Entity;

use App\Interface\Comportement;

class Refuge
{
    private array $animaux = [];

    public function ajouterAnimal(Comportement $animal): void
    {
        $this->animaux[] = $animal;
    }

    public function listerAnimaux(): array
    {
        return $this->animaux;
    }

    public function faireEmettreSon(): array
    {
        $sons = [];
        foreach ($this->animaux as $animal) {
            $sons[] = $animal->emitterSon();
        }
        return $sons;
    }

    public function faireDeplacer(): array
    {
        $deplacements = [];
        foreach ($this->animaux as $animal) {
            $deplacements[] = $animal->seDeplacer();
        }
        return $deplacements;
    }
}
