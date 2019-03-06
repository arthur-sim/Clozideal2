<?php
namespace App\DataFixtures;

use App\Entity\Image;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\DataFixtures\TrickFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
 
class ImageFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        
        foreach ($this->getImageData() as [ $name ]) {
            $trick = $this->getReference('trick_'.rand(0, trickFixtures::$nbTricks));
            $image = (new Image())
                    ->setName($name)
                    ->setTrick($trick); 
            $manager->persist($image);
        }
 
        $manager->flush();
    }
 
    private function getImageData(): array
    {
        return [
            ['10a3c6c659fea77cd0fe17cc8dd9754f.jpeg'],
            ['10a3c6c659fea77cd0fe17cc8dd9754f.jpeg'],
            ['10a3c6c659fea77cd0fe17cc8dd9754f.jpeg'],
            ['10a3c6c659fea77cd0fe17cc8dd9754f.jpeg'],
            ['10a3c6c659fea77cd0fe17cc8dd9754f.jpeg'],
            ['10a3c6c659fea77cd0fe17cc8dd9754f.jpeg'],
            ['10a3c6c659fea77cd0fe17cc8dd9754f.jpeg'],
            ['10a3c6c659fea77cd0fe17cc8dd9754f.jpeg'],
            ['10a3c6c659fea77cd0fe17cc8dd9754f.jpeg'],
            ['10a3c6c659fea77cd0fe17cc8dd9754f.jpeg'],
            ['10a3c6c659fea77cd0fe17cc8dd9754f.jpeg'],
            ['10a3c6c659fea77cd0fe17cc8dd9754f.jpeg']
            
        ];
    }
    
    public function getDependencies()
    {
        return array(
            TrickFixtures::class,
        );
    }
 
}