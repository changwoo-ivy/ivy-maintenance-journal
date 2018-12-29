<?php

namespace Ivy\Maint\Functions;

use Ivy\Maint\Views\Admin\Metaboxes\ProjectBasicPropertyMetaboxView;
use Ivy\Mu\Interfaces\Models\FieldModelInterface;
use Ivy\Mu\Launchers\LauncherPool;
use Ivy\Mu\Views\Admin\FieldWidgets\RepeatableWidget;

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


/**
 * 메타박스와 옵션에서 공통적으로 사용되어 리펙터링
 *
 * @used-by ProjectBasicPropertyMetaboxView::getFieldWidgets()
 * @used-by SettingsView::getFieldWidgets()
 *
 * @param FieldModelInterface $fieldModel
 *
 * @return RepeatableWidget
 */
function getSkillLevelAdminFieldWidget($fieldModel)
{
    return new RepeatableWidget(
        $fieldModel,
        [
            'labels'       => [
                'slug'  => '슬러그',
                'name'  => '이름',
                'price' => '시간당 비용',
            ],
            'placeholders' => [
                'slug'  => '영소문자, 숫자, 하이픈만',
                'name'  => '표시되는 이름',
                'price' => '원 단위로 기록',
            ],
        ]
    );
}
