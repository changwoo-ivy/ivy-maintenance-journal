<?php

namespace Ivy\Maint\Views\Admin\Settings;

use Ivy\Maint\Models\SettingsModel;
use Ivy\Maint\Views\Admin\SettingsSubMenuPageView;
use Ivy\Mu\Views\Admin\SettingView;
use function Ivy\Maint\Functions\getSkillLevelAdminFieldWidget;

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
            'bh', 'skill_levels',
            getSkillLevelAdminFieldWidget($this->getModel()->getFieldSkillLevels())
        );
    }

    public function dispatch()
    {
        $this->renderSettings();
    }
}
