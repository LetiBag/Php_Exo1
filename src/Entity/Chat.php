<?php


namespace App\Entity;

class Chat extends Animal
{
    private string $couleur;

    public function __construct(string $nom, int $age, string $sexe, string $couleur)
    {
        parent::__construct($nom, $age, 'Chat', $sexe);
        $this->couleur = $couleur;
    }

    public function seDeplacer(): string
    {
        return "Je me faufile";
    }

    public function emitterSon(): string
    {
        return "Meow! Meow!";
    }
}
