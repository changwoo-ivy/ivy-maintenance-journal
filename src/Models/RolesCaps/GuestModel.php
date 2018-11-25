<?php

namespace Ivy\Maint\Models\RolesCaps;

use Ivy\Mu\Models\BaseRolesCapsModel;
use function Ivy\Maint\Functions\prefixed;

/**
 * Class GuestModel
 *
 * 게스트
 *
 * @package Ivy\Maint\Models\RolesCaps
 */
class GuestModel extends BaseRolesCapsModel
{
    protected $assignToAdmin = false;

    public static function getRoleName()
    {
        return prefixed('guest');
    }

    public static function getDisplayName()
    {
        return '손님';
    }
}
