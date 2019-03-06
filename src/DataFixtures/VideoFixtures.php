<?php
namespace App\DataFixtures;

use App\Entity\Video;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\DataFixtures\TrickFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
 
class VideoFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        
        foreach ($this->getVideoData() as [ $urlIFrame ]) {
            $trick = $this->getReference('trick_'.rand(0, trickFixtures::$nbTricks));
            $video = (new Video())
                    ->setUrlIFrame($urlIFrame)
                    ->setTrick($trick);                  
            $manager->persist($video);
        }
 
        $manager->flush();
    }
 
    private function getVideoData(): array
    {
        return [
            ['https://www.youtube.com/watch?v=GwzBLYGRj6c'],
            ['https://www.youtube.com/watch?v=GwzBLYGRj6c'],
            ['https://www.youtube.com/watch?v=GwzBLYGRj6c']
        ];
    }
    
    public function getDependencies()
    {
        return array(
            TrickFixtures::class,
        );
    }
 
}