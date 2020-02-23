<?php
if ($_GET["img"] == "contract_termination.png") {
	header('Content-type: image/png');
	passthru('cat /var/www/html/contract_termination.png');
//} elseif ($_GET["img"] == "some_other_image.png") {
//	header('Content-type: image/png');
//	passthru('cat /var/www/html/some_other_image.png');
} else {
	header('Location: https://photobucket.com');
}


$req_dump = print_r($_SERVER['REMOTE_ADDR'].'	'.$_SERVER['HTTP_USER_AGENT'], TRUE);
$fp = fopen('log.txt', 'a');
fwrite($fp, date("c").'	'.$req_dump."\n");
fclose($fp);
?>
