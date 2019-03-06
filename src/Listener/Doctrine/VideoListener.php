<?php

namespace App\Listener\Doctrine;

use App\Entity\Video;
use App\Service\WebPlayer;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;

class VideoListener
{
	/**
	 * @var WebPlayer
	 */
	private $webPlayer;

	public function __construct(WebPlayer $webPlayer)
	{
		$this->webPlayer = $webPlayer;
	}

	public function prePersist(LifecycleEventArgs $eventArgs) {
		$entity = $eventArgs->getObject();

		if (!$entity instanceof Video) {
			return;
		}

		$entity->setUrlIFrame(
			$this->webPlayer->convertToIFrameUrl(
				$entity->getUrlIFrame()
			)
		);
	}
}