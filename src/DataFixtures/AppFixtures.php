<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{



    public function load(ObjectManager $manager): void
    {
    $usersData = json_decode(file_get_contents(__DIR__ . '/data/users.json'), true);
    
        foreach ($usersData as $oneUser) {
            $user = new User();
            $user
                ->setFirstName($oneUser["firstName"])
                ->setLastName($oneUser["lastName"])
                ->setPseudonym($oneUser["pseudonym"])
                ->setBirthDate(\DateTime::createFromFormat('d/m/Y', $oneUser["birthDate"]))
                ->setEmail($oneUser["email"])
                ->setProfilPicture($oneUser["profilPicture"])
                ->setPassword($oneUser["password"])
                ->setGender($oneUser["gender"])
                ->setInscriptionDate(\DateTime::createFromFormat('d/m/Y',$oneUser["inscriptionDate"]));
                $manager->persist($user);
        }

        $manager->flush();
    }


}
