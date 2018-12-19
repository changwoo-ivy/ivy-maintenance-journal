<?php

namespace Ivy\Maint\Initiators\Admin;

use Ivy\Maint\Views\Admin\SettingsSubMenuPageView;
use Ivy\Mu\Initiators\AutoHookInitiator;

class SettingsInitiator extends AutoHookInitiator
{
    public function v_action_admin_menu()
    {
        return [SettingsSubMenuPageView::class, 'addSubMenuPage'];
    }
}
