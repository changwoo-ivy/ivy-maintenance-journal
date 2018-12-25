<?php
/**
 * Plugin Name:         아이비넷 유지보수 플러그인
 * Description:         아이비넷 프로젝트 유지보수 기록을 위한 플러그잉닙니다.
 * Plugin URI:          https://github.com/changwoo-ivy/ivy-maintenance-journal
 * Author:              Changwoo Nam
 * Author URI:          mailto://changwoo@ivynet.co.kr
 * License:             GPLv2 or later
 * Version:             0.0.5
 */

/**
 * 이 플러그인은 한국어 전용으로, 다국어 지원을 하지 않습니다.
 */
require_once __DIR__ . '/vendor/autoload.php';

define('IMJ_MAIN', __FILE__);
define('IMJ_VERSION', '0.0.5');

try {
    $launcher = \Ivy\Maint\Functions\initLauncher(IMJ_MAIN, IMJ_VERSION);
    $launcher->launch();
} catch (Exception $exception) {
    wp_die($exception->getMessage());
}
