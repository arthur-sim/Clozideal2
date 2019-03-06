<?php
 
namespace App\Tests\Service;
use App\Service\WebPlayer;
use PHPUnit\Framework\TestCase;
 
class WebPlayerTest extends TestCase
{
    private $webPlayer;
 
    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->webPlayer = new WebPlayer();
    }
 
    public function testYoutubeLink()
    {
        $this->assertEquals('https://www.youtube.com/embed/ktkjUjcZid0', $this->webPlayer->convertToIFrameUrl('https://www.youtube.com/watch?v=ktkjUjcZid0'));
        $this->assertEquals('https://www.youtube.com/embed/ktkjUjcZid0', $this->webPlayer->convertToIFrameUrl('https://youtu.be/ktkjUjcZid0'));
        $this->assertEquals('https://www.youtube.com/embed/ktkjUjcZid0', $this->webPlayer->convertToIFrameUrl('https://www.youtube.com/embed/ktkjUjcZid0'));
    }
    public function testDailymotionLink()
    {
        $this->assertEquals('https://www.dailymotion.com/embed/video/ktkjUjcZid0', $this->webPlayer->convertToIFrameUrl('https://www.dailymotion.com/video/ktkjUjcZid0'));
        $this->assertEquals('https://www.dailymotion.com/embed/video/ktkjUjcZid0', $this->webPlayer->convertToIFrameUrl('https://dai.ly/ktkjUjcZid0'));
        $this->assertEquals('https://www.dailymotion.com/embed/video/ktkjUjcZid0', $this->webPlayer->convertToIFrameUrl('https://www.dailymotion.com/embed/video/ktkjUjcZid0'));
    }
    
}