<?php

namespace Ivy\Maint\Views\Admin;

use Ivy\Maint\Models\RolesCaps\SupervisorModel;
use Ivy\Maint\Views\Admin\Settings\SettingsView;
use Ivy\Mu\Views\Admin\SubMenuPageView;
use function Ivy\Maint\Functions\getSlug;

class SettingsSubMenuPageView extends SubMenuPageView
{
    public function getParentSlug()
    {
        return 'options-general.php';
    }

    public function getPageTitle()
    {
        return '아이비넷 유지보수 플러그인 설정';
    }

    public function getMenuTitle()
    {
        return '유지보수';
    }

    public function getCapability()
    {
        return SupervisorModel::getRoleName();
    }

    public function getMenuSlug()
    {
        return getSlug();
    }

    public function dispatch()
    {
        /** @var SettingsView $subView */
        $subView = $this->queryView(SettingsView::class);
        $subView->dispatch();
    }
}
