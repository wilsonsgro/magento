<?php

namespace Reply\Example\Controller\Index;

class Test extends \Magento\Framework\App\Action\Action
{
	public function execute()
	{
		$textDisplay = new \Magento\Framework\DataObject(array('text' => 'Reply'));
		$this->_eventManager->dispatch('reply_example_display_text', ['reply_text' => $textDisplay]);
		echo $textDisplay->getText();
		exit;
	}
}