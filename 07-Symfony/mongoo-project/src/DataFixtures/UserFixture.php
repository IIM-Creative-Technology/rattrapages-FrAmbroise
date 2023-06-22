<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class UserFixture extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $userPasswordHasher
    )
    {
    }
    public function load(ObjectManager $manager): void
    {
        for($i=1; $i <= 10; $i++){
            $user = new User;
            $user->setEmail('user' .$i.'@example.com');
            if($i==1){
                $user->setPassword(
                    $this->userPasswordHasher->HashPassword(
                        $user,
                        'adminpassword'
                    )
                );
            }
            else{
                $user->setPassword(
                    $this->userPasswordHasher->HashPassword(
                        $user,
                        'password'
                    )
                );
            }
            if($i==1){
                $user->setRoles(['ROLE_ADMIN']);
            }
            $manager->persist($user);
        }

        $manager->flush();
    }
}
