<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class Country extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $data = json_decode(file_get_contents("https://gist.githubusercontent.com/Diarselimi/2865844554e86e51a9d043191dea0652/raw/7df084cce026cfc532751207a58a147bb9c401cd/Country_codes.json"));

        foreach ($data as $cntr) {
            $al = new \App\Entity\Country();
            $al->setName($cntr->name);
            $al->setShortName(substr($cntr->name, 0, 2));
            $al->setCode($cntr->code);
            $manager->persist($al);
        }

        $manager->flush();
    }
}
