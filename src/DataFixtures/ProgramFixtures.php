<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{

    public const PROGRAMS = [
        [
            "title" => "Walking Dead",
            "synopsis" => "Des zombies envahissent la Terre",
            "category" => "category_Horreur"
        ],
        [
            "title" => "Breaking Bad",
            "synopsis" => "Walter White, 50 ans, est professeur de chimie dans un lycée du Nouveau-Mexique.",
            "category" => "category_Action"
        ],
        [
            "title" => "The Witcher",
            "synopsis" => "Geralt de Riv, un chasseur de monstres mutant, poursuit son destin dans un monde chaotique où les humains se révèlent souvent plus vicieux que les bêtes.",
            "category" => "category_Fantastique"
        ],
        [
            "title" => "Curon",
            "synopsis" => "Une femme retourne dans son village pour la première fois depuis 17 ans. Mais lorsqu'elle disparaît mystérieusement, ses enfants doivent affronter un sombre héritage.",
            "category" => "category_Horreur"
        ],
        [
            "title" => "Game of Thrones",
            "synopsis" => "Il y a très longtemps, à une époque oubliée, une force a détruit l'équilibre des saisons.",
            "category" => "category_Fantastique"
        ]
    ];
    public function load(ObjectManager $manager): void
    {
        foreach (self::PROGRAMS as $key => $programs) {
                $program = new Program();
                $program->setTitle($programs['title']);
                $program->setSynopsis($programs['synopsis']);
                $program->setCategory($this->getReference($programs['category']));
                $manager->persist($program);
            }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
        ];
    }
}
