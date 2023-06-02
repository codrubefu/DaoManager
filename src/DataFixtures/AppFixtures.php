<?php

namespace App\DataFixtures;

use App\Factory\EventsCategoriesFactory;
use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        EventsCategoriesFactory::createMany(100);
        UserFactory::createMany(5);
    }
}
