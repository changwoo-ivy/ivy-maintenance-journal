<?php

namespace Ivy\Maint\Views\Admin\Settings;

use Ivy\Maint\Models\SettingsModel;
use Ivy\Maint\Views\Admin\SettingsSubMenuPageView;
use Ivy\Mu\Views\Admin\FieldWidgets\RepeatableWidget;
use Ivy\Mu\Views\Admin\SettingView;

/**
 * Class SettingsView
 *
 * @package Ivy\Maint\Views\Admin
 *
 * @method SettingsModel getModel()
 */
class SettingsView extends SettingView
{
    public function setup($args = [])
    {
        /** @noinspection PhpUndefinedMethodInspection */
        $this->setPage($this->queryView(SettingsSubMenuPageView::class)->getMenuSlug());

        $this->setModel($this->queryModel(SettingsModel::class));

        $this->addSection('bh', 'Billable Hour (B/H)');

        $this->addField(
            'bh',
            'skill_levels',
            new RepeatableWidget(
                $this->getModel()->getFieldSkillLevels(),
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
            )
        );
    }

    public function dispatch()
    {
        $this->renderSettings();
    }
}
