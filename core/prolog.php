<?
session_start([
	'cookie_lifetime' => 86400,
]);
spl_autoload_register(function ($className) {
    require_once($_SERVER['DOCUMENT_ROOT'].'/core/classes/'.str_replace('\\', '/', $className).'.php');
})
?>