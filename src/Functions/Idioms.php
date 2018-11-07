<?php

namespace Ivy\Maint\Functions;

use Ivy\Mu\Launchers\LauncherPool;

/**
 * 이 플러그인의 접두사는 'imj_' 입니다.
 *
 * @param bool $forFrontend
 *
 * @return string
 */
function getPrefix($forFrontend = false)
{
    return 'imj' . ($forFrontend ? '-' : '_');
}


function prefixed($string, $forFrontend = false)
{
    return getPrefix($forFrontend) . $string;
}


/**
 * 이 플러그인의 슬러그는 'imj' 입니다.
 *
 * @return string
 */
function getSlug()
{
    return 'imj';
}


function getLauncher()
{
    $pool = LauncherPool::getInstance();

    return $pool->getLauncher(getSlug());
}
