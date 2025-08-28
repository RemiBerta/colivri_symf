<?php

namespace App\DataFixtures;

use App\Entity\Adress;
use App\Entity\Listing;
use App\Entity\Picture;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
        public function __construct(private UserPasswordHasherInterface $passwordHasher) {}
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
                ->setGender($oneUser["gender"])
                ->setInscriptionDate(\DateTime::createFromFormat('d/m/Y',$oneUser["inscriptionDate"]));
            $hashedPassword = $this->passwordHasher->hashPassword($user, '0000');
            $user->setPassword($hashedPassword);
                $manager->persist($user);

                $users[] = $user;
        }

    $adressesData = json_decode(file_get_contents(__DIR__ . '/data/adress.json'), true);

        foreach ($adressesData as $oneAdress) {
            $adress = new Adress();
            $adress
                ->setStreet($oneAdress["street"])
                ->setCity($oneAdress["city"])
                ->setPostalCode($oneAdress["postalCode"])
                ->setCountry($oneAdress["country"]);

                $manager->persist($adress);

                $adresses[] = $adress;
        }

        $listingsData = json_decode(file_get_contents(__DIR__ . '/data/listing.json'), true);

        foreach ($listingsData as $index => $oneListing) {
            $listing = new Listing();
            $listing
                ->setMaximumCapacity($oneListing["maximumCapacity"])
                ->setPricePerMonth($oneListing["pricePerMonth"])
                ->setDescription($oneListing["description"])
                ->setTitle($oneListing["title"]);

                $randomUser = $users[array_rand($users)];
                $listing->setUser($randomUser);

                if (isset($adresses[$index])) {
                 $listing->setAdress($adresses[$index]);
                }

                $manager->persist($listing);

                $listings[] = $listing;
        }
        
        $picturesData = json_decode(file_get_contents(__DIR__ . '/data/picture.json'), true);

        foreach ($picturesData as $onePicture) {
            $picture = new Picture();
            $picture
                ->setUrl($onePicture["url"])
                ->setDescription($onePicture["description"])
                ->setSortOrder($onePicture["sortOrder"])
                ->setTitle($onePicture["title"]);

                $randomUser = $users[array_rand($users)];
                $picture->setUser($randomUser);

                $randomListing = $listings[array_rand($listings)];
                $picture->setListing($randomListing);

                $manager->persist($picture);     
        }
    


        $manager->flush();
    }


}
