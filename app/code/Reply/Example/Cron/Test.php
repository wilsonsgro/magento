<?php

namespace Reply\Example\Cron;

class Test
{
	public function execute()
	{
		print_r("Custom Cron" . "\n\r");
		return $this;
	}
}