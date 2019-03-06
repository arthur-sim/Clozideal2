<?php
namespace App\DataFixtures;

use App\Entity\Trick;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\DataFixtures\UserFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
 
class TrickFixtures extends Fixture implements DependentFixtureInterface
{
    public static $nbTricks = -1;
    public function load(ObjectManager $manager)
    {     
        foreach ($this->getTrickData() as [ $title, $content]) {
            $user = $this->getReference('user_'.rand(0, UserFixtures::$nbUsers));
            $trick = (new Trick())
                    ->setTitle($title)
                    ->setContent($content)
                    ->setUser($user);                   
            $manager->persist($trick);
            self::$nbTricks++;
            $this->addReference('trick_'.self::$nbTricks, $trick);        
        }
 
        $manager->flush();
    }
 
    private function getTrickData(): array
    {
        return [
            ['Backside Triple Cork 1440',
                'Lorem ipsum dolor sit amet, '
                . 'consectetur adipiscing elit, '
                . 'sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. '
                . 'Ut enim ad minim veniam, '
                . 'quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. '
                . 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. '
                . 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'],
            ['Backside Triple Cork 1440',
                'Lorem ipsum dolor sit amet, '
                . 'consectetur adipiscing elit, '
                . 'sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. '
                . 'Ut enim ad minim veniam, '
                . 'quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. '
                . 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. '
                . 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'],
            ['Backside Triple Cork 1440',
                'Lorem ipsum dolor sit amet, '
                . 'consectetur adipiscing elit, '
                . 'sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. '
                . 'Ut enim ad minim veniam, '
                . 'quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. '
                . 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. '
                . 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'],
            ['Backside Triple Cork 1440',
                'Lorem ipsum dolor sit amet, '
                . 'consectetur adipiscing elit, '
                . 'sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. '
                . 'Ut enim ad minim veniam, '
                . 'quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. '
                . 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. '
                . 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'],
            ['Backside Triple Cork 1440',
                'Lorem ipsum dolor sit amet, '
                . 'consectetur adipiscing elit, '
                . 'sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. '
                . 'Ut enim ad minim veniam, '
                . 'quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. '
                . 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. '
                . 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'],
            ['Backside Triple Cork 1440',
                'Lorem ipsum dolor sit amet, '
                . 'consectetur adipiscing elit, '
                . 'sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. '
                . 'Ut enim ad minim veniam, '
                . 'quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. '
                . 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. '
                . 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'],
            ['Backside Triple Cork 1440',
                'Lorem ipsum dolor sit amet, '
                . 'consectetur adipiscing elit, '
                . 'sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. '
                . 'Ut enim ad minim veniam, '
                . 'quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. '
                . 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. '
                . 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'],
            ['Backside Triple Cork 1440',
                'Lorem ipsum dolor sit amet, '
                . 'consectetur adipiscing elit, '
                . 'sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. '
                . 'Ut enim ad minim veniam, '
                . 'quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. '
                . 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. '
                . 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'],
            ['Backside Triple Cork 1440',
                'Lorem ipsum dolor sit amet, '
                . 'consectetur adipiscing elit, '
                . 'sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. '
                . 'Ut enim ad minim veniam, '
                . 'quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. '
                . 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. '
                . 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'] 
        ];
    }
 
    public function getDependencies()
    {
        return array(
            UserFixtures::class,
        );
    }
 
}

