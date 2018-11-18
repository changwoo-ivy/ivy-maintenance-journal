<?php

namespace Ivy\Maint\Models\RolesCaps;

use Ivy\Mu\Models\BaseRolesCapsModel;
use function Ivy\Maint\Functions\prefixed;

class IssueAgentModel extends BaseRolesCapsModel
{
    protected $assignToAdmin = false;

    public static function getRoleName()
    {
        return prefixed('issue_agent');
    }

    public static function getDisplayName()
    {
        return '이슈 에이전트';
    }

//    public function getCapabilities()
//    {
//        // TODO: 이슈 에이전트에게 적절한 프로젝트와 이슈 권한 부여
//    }
}