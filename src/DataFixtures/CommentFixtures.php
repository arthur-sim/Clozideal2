<?php
namespace App\DataFixtures;

use App\Entity\Comment;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\DataFixtures\UserFixtures;
use App\DataFixtures\TrickFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
 
class CommentFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        
        foreach ($this->getCommentData() as [ $title, $content]) {
            $user = $this->getReference('user_'.rand(0, UserFixtures::$nbUsers));
            $trick = $this->getReference('trick_'.rand(0, trickFixtures::$nbTricks));
            $comment = (new Comment())
                    ->setTitle($title)
                    ->setContent($content)
                    ->setUser($user)
                    ->setTrick($trick); 
                    
            $manager->persist($comment);
        }
 
        $manager->flush();
    }
 
    private function getCommentData(): array
    {
        return [
            ['Comment','On the other hand, '
                . 'we denounce with righteous indignation and dislike '
                . 'men who are so beguiled and demoralized by the charms of pleasure of the moment, '
                . 'so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue'],
            ['Comment','On the other hand, '
                . 'we denounce with righteous indignation and dislike '
                . 'men who are so beguiled and demoralized by the charms of pleasure of the moment, '
                . 'so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue'],
            ['Comment','On the other hand, '
                . 'we denounce with righteous indignation and dislike '
                . 'men who are so beguiled and demoralized by the charms of pleasure of the moment, '
                . 'so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue'],
            ['Comment','On the other hand, '
                . 'we denounce with righteous indignation and dislike '
                . 'men who are so beguiled and demoralized by the charms of pleasure of the moment, '
                . 'so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue'],
            ['Comment','On the other hand, '
                . 'we denounce with righteous indignation and dislike '
                . 'men who are so beguiled and demoralized by the charms of pleasure of the moment, '
                . 'so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue']
        ];
    }
 
    public function getDependencies()
    {
        return array(
            TrickFixtures::class,
            UserFixtures::class,
        );
    }
 
}

