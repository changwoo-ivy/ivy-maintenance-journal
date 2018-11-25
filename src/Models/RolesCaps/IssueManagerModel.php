<?php

namespace Ivy\Maint\Models\RolesCaps;

use Ivy\Mu\Models\BaseRolesCapsModel;
use function Ivy\Maint\Functions\prefixed;

/**
 * Class IssueManagerModel
 *
 * 이슈 매니저 역할
 *
 * 수퍼바이저/프로젝트 매니저에 의해 프로젝트에 배정됨.
 * 담당 프로젝트 하에서 자유롭게 이슈 처리 가능.
 *
 * @package Ivy\Maint\Models\RolesCaps
 */
class IssueManagerModel extends BaseRolesCapsModel
{
    protected $assignToAdmin = false;

    public static function getRoleName()
    {
        return prefixed('issue_manager');
    }

    public static function getDisplayName()
    {
        return '이슈 매니저';
    }

//    public function getCapabilities()
//    {
//        // TODO: 이슈 에이전트에게 적절한 프로젝트와 이슈 권한 부여
//    }
}
