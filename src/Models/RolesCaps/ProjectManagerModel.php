<?php

namespace Ivy\Maint\Models\RolesCaps;

use Ivy\Mu\Models\BaseRolesCapsModel;
use function Ivy\Maint\Functions\prefixed;

class ProjectManagerModel extends BaseRolesCapsModel
{
    protected $assignToAdmin = false;

    public static function getRoleName()
    {
        return prefixed('project_manager');
    }

    public static function getDisplayName()
    {
        return '프로젝트 매니저';
    }

//    public function getCapabilities()
//    {
//        // TODO: 프로젝트 매니저에게 적절한 프로젝트와 이슈 권한 부여
//    }
}