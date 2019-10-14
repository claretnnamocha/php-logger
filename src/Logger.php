<?php
namespace Alpha\Console;

/**
 * 
 */
class Logger
{
	static function output(array $messages, $type='debug')
	{
		ob_start();
		foreach ($messages as $message) {
			$msg = self::evaluate($message);
			if ($type == 'error') { print(ConsoleHighlight::COLOR_ERROR); }
			if ($type == 'info') { print(ConsoleHighlight::COLOR_INFO); }
			print_r($msg);
			print(ConsoleHighlight::COLOR_DEBUG);
		}
		error_log(ob_get_clean(), 4);
	}

	private static function evaluate($message, $debug=false)
	{
		foreach (Console::SPECIAL_VALUES as $special) {
			if ($message === $special) {
				$message = ConsoleHighlight::COLOR_SPECIAL.json_encode($message);
				return $debug ? $message.ConsoleHighlight::COLOR_DEBUG : $message;
			}
		}
		return $message;
	}
}