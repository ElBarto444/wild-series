<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Actor;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ActorFixtures extends Fixture
{
    public const PROGRAMS = [
        'The Walking Dead',
        'American Horror Story',
        'Game of Thrones',
        'The Last of Us',
        'Le Bureau des légendes',
        'OZ',
    ];

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i <= 50; $i++) {
            $actor = new Actor();
            $actor->setName($faker->name());

            $manager->persist($actor);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        [
            ProgramFixtures::class,
        ];
    }
}
