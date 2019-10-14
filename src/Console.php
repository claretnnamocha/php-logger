<?php
namespace Alpha\Console;

/**
 * 
 */
class Console
{

	const SPECIAL_VALUES = [ true, false, null ];

	static function log(... $messages)
	{
		Logger::output($messages);
	}

	static function error(... $messages)
	{
		Logger::output($messages,'error');
	}

	static function info(... $messages)
	{
		Logger::output($messages,'info');
	}
}