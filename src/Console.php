<?php
namespace Alpha;

/**
 * 
 */
class Console
{
	static function log(... $messages)
	{
		ob_start();
		foreach ($messages as $message) {
			$evaluated = self::evaluate($message);
			$msg = $evaluated['flagged'] ? "\e[1;34m". $evaluated['message'] ."\e[0m" : $evaluated['message']; 
			print_r($msg);
			print(' ');
		}
		error_log(ob_get_clean(), 500);
	}

	static function error(... $messages)
	{
		ob_start();
		foreach ($messages as $message) {
			$evaluated = self::evaluate($message);
			$msg = $evaluated['flagged'] ? "\e[1;34m". $evaluated['message'] : $evaluated['message']; 
			print("\e[1;31m");
			print_r($msg);
			if (!$evaluated['flagged']) {
				print("\e[0m");
			}
			print(' ');
		}
		error_log(ob_get_clean(), 500);
	}

	static function info(... $messages)
	{
		ob_start();
		foreach ($messages as $message) {
			$evaluated = self::evaluate($message);
			$msg = $evaluated['flagged'] ? "\e[1;34m". $evaluated['message'] : $evaluated['message']; 
			print("\e[0;32;47m");
			print_r($msg);
			if (!$evaluated['flagged']) {
				print("\e[0m");
			}
			print(' ');
		}
		error_log(ob_get_clean(), 500);
	}

	private static function evaluate($message)
	{
		$flagged = true;
		if ($message === null) {
			$message = 'NULL';
		}elseif ($message === true) {
			$message = 'True';
		}elseif ($message === false) {
			$message = 'False';
		}else{
			$flagged = false;
			$message = $message;
		}
		return compact('flagged', 'message');
	}
}