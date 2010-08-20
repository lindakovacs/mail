<?php

/**
 * Test: Nette\Mail\Mail invalid headers.
 *
 * @author     David Grudl
 * @category   Nette
 * @package    Nette\Application
 * @subpackage UnitTests
 */

use Nette\Mail\Mail;



require __DIR__ . '/../initialize.php';

require __DIR__ . '/Mail.inc';



$mail = new Mail();

try {
	$mail->setHeader('', 'value');
	Assert::failed();
} catch (Exception $e) {
	Assert::exception('InvalidArgumentException', "Header name must be non-empty alphanumeric string, '' given.", $e );
}

try {
	$mail->setHeader(' name', 'value');
	Assert::failed();
} catch (Exception $e) {
	Assert::exception('InvalidArgumentException', "Header name must be non-empty alphanumeric string, ' name' given.", $e );
}

try {
	$mail->setHeader('n*ame', 'value');
	Assert::failed();
} catch (Exception $e) {
	Assert::exception('InvalidArgumentException', "Header name must be non-empty alphanumeric string, 'n*ame' given.", $e );
}