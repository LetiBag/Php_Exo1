<?php

namespace App\Command;

use App\Entity\Refuge;
use App\Entity\Chien;
use App\Entity\Chat;
use App\Entity\Oiseau;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RefugeCommand extends Command
{
    protected static $defaultName = 'app:refuge';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $refuge = new Refuge();

        // Ajout d'animaux
        $refuge->ajouterAnimal(new Chien("Rex", 5, "Mâle", "Labrador"));
        $refuge->ajouterAnimal(new Chat("Minou", 3, "Femelle", "Noir"));
        $refuge->ajouterAnimal(new Oiseau("Coco", 1, "Femelle", "Perruche"));

        // Lister les animaux
        $output->writeln("Liste des animaux dans le refuge :");
        $refuge->listerAnimaux();

        // Faire émettre un son
        $output->writeln("\nLes animaux émettent leurs sons :");
        $refuge->faireEmettreSon();

        // Faire déplacer les animaux
        $output->writeln("\nLes animaux se déplacent :");
        $refuge->faireDeplacer();

        return Command::SUCCESS;
    }
}

