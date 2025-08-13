<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{

    private const USERS = [
        [
            "firstName" => "Rémi",
            "lastName" => "Berta",
            "pseudonym" => "DellowYuck",
            "birthDate" => "08/01/1994",
            "email" => "example@email.com",
            "profilPicture" => "public/image/profilpic1"
        ],
        [
            "firstName" => "Camille",
            "lastName" => "Durand",
            "pseudonym" => "PixelVibe",
            "birthDate" => "12/06/1992",
            "email" => "example@email.com",
            "profilPicture" => "public/image/profilpic2"


        ],
        [
            "firstName" => "Lucas",
            "lastName" => "Martel",
            "pseudonym" => "SkyWaver",
            "birthDate" => "25/03/1990",
            "email" => "example@email.com",
            "profilPicture"=> "public/image/profilpic1"
        ],
        [
            "firstName" => "Sophie",
            "lastName" => "Lemoine",
            "pseudonym" => "NovaBlink",
            "birthDate" => "09/09/1995",
            "email" => "example@email.com",
            "profilPicture"=> "public/image/profilpic2"
        ],
        [
            "firstName" => "Julien",
            "lastName" => "Roche",
            "pseudonym" => "EchoKnight",
            "birthDate" => "18/11/1988",
            "email" => "example@email.com",
            "profilPicture"=> "public/image/profilpic1"
        ],
        [
            "firstName" => "Claire",
            "lastName" => "Petit",
            "pseudonym" => "ShadowMint",
            "birthDate" => "03/02/1993",
            "email" => "example@email.com",
            "profilPicture"=> "public/image/profilpic2"
        ],
        [
            "firstName" => "Antoine",
            "lastName" => "Garnier",
            "pseudonym" => "GlitchFox",
            "birthDate" => "14/07/1991",
            "email" => "example@email.com",
            "profilPicture"=> "public/image/profilpic1"
        ],
        [
            "firstName" => "Manon",
            "lastName" => "Morel",
            "pseudonym" => "CyberPanda",
            "birthDate" => "22/04/1996",
            "email" => "example@email.com",
            "profilPicture"=> "public/image/profilpic2"
        ],
        [
            "firstName" => "Hugo",
            "lastName" => "Lambert",
            "pseudonym" => "ByteSeeker",
            "birthDate" => "30/10/1989",
            "email" => "example@email.com",
            "profilPicture"=> "public/image/profilpic1"
        ],
        [
            "firstName" => "Élodie",
            "lastName" => "Benoit",
            "pseudonym" => "DreamCraze",
            "birthDate" => "05/12/1997",
            "email" => "example@email.com",
            "profilPicture"=> "public/image/profilpic2"
        ],
        [
            "firstName" => "Maxime",
            "lastName" => "Collet",
            "pseudonym" => "ZenSpark",
            "birthDate" => "11/01/1992",
            "email" => "example@email.com",
            "profilPicture"=> "public/image/profilpic1"
        ],
        [
            "firstName" => "Laura",
            "lastName" => "Perrot",
            "pseudonym" => "FrostNova",
            "birthDate" => "28/08/1994",
            "email" => "example@email.com",
            "profilPicture"=> "public/image/profilpic2"
        ]
    ];

    public function load(ObjectManager $manager): void
    {
       

        foreach (self::USERS as $oneUser) {
            $user = new User();
            $user
                ->setFirstName($oneUser["firstName"])
                ->setLastName($oneUser["lastName"])
                ->setPseudonym($oneUser["pseudonym"])
                ->setBirthDate($oneUser["birthDate"])
                ->setEmail($oneUser["email"])
                ->setProfilPicture($oneUser["profilPicture"]);

                $manager->persist($user);
        }

        $manager->flush();
    }


}
