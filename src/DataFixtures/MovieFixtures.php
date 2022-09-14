<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MovieFixtures extends Fixture
{
  public function load(ObjectManager $manager): void
  {
    $movie = new Movie();
    $movie->setTitle('The Dark Knight');
    $movie->setReleaseYear(2008);
    $movie->setDescription('This is the Dark Knight description');
    $movie->setImagePath('https://cdn.pixabay.com/photo/2020/03/19/07/28/batman-4946610_960_720.jpg');

    // Add Data To Pivot Table
    $movie->addActor($this->getReference('actor_1'));
    $movie->addActor($this->getReference('actor_2'));
    $manager->persist($movie);

    $movie2 = new Movie();
    $movie2->setTitle('Avengers: Endgame');
    $movie2->setReleaseYear(2019);
    $movie2->setDescription('This is the Avengers: Endgame');
    $movie2->setImagePath('https://cdn.pixabay.com/photo/2020/03/29/17/23/spiderman-4981530_960_720.jpg');

    // Add Data To Pivot Table
    $movie2->addActor($this->getReference('actor_3'));
    $movie2->addActor($this->getReference('actor_4'));

    $manager->persist($movie2);

    $manager->flush();
  }
}
