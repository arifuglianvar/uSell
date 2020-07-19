<?php
/**
 * @package MomentBoard v2.0
 * @copyright (c) guardeon.biz
 * @link http://guardeon.biz/
 * @author Pavel <support@guardeon.biz>
 * @desc Запускающий файл
 */

/**
 * Устанавливаем системные настройки
 */
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('magic_quotes_runtime', 0);
ini_set('magic_quotes_sybase', 0);
ini_set('error_log', './files/.logs/errors.log');

/**
 * Отправляем заголовки
 */
header('Content-Type: text/html; charset=utf-8');
header('Pragma:  no-cache');

/**
 * редирект если происходит какая то хуйня
 */


/**
 * Устанавливаем временну зону
 */
date_default_timezone_set('Europe/Kiev');


//Устанавливаем начальное время генерации странички
define('START_MB', microtime());

//Устанавливаем константу проверки доступа к страницам
define('MOMENT_BOARD', TRUE);

/**
 * Стартуем сессии
 */
@session_start();

/**
 * Добавляем пути в системную переменную include_path
 */
set_include_path(
	'.'
	.PATH_SEPARATOR.'./application/'
	.PATH_SEPARATOR.'./modules/'
	.PATH_SEPARATOR.'./library/'
	.PATH_SEPARATOR.'./library/php/'
    .PATH_SEPARATOR.get_include_path()
);

/**
 * Подключаем главную библиотеку
 */
include_once('site.php');

/**
 * Регистрируем функцию для авто подключения классов
 */
Site::registerAutoload();

/**
 * Запускаем сайт
 */
Kernel::run();