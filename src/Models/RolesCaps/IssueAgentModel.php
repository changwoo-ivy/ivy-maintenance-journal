<?php

namespace Ivy\Maint\Models\RolesCaps;

use Ivy\Maint\Models\CustomPosts\IssueModel;
use Ivy\Mu\Models\BaseRolesCapsModel;
use function Ivy\Maint\Functions\prefixed;

/**
 * Class IssueAgentModel
 *
 * 프로젝트 이슈 담당자 역할
 *
 * 배정된 프로젝트, 배정된 이슈에만 접근 가능.
 * 이슈에 대해 코멘트 지정, 일부 속성만 편집 가능.
 *
 * @package Ivy\Maint\Models\RolesCaps
 */
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

    public function getCapabilities()
    {
        return [
            'read' => true,

            IssueModel::getCapEditPosts()          => true,
            IssueModel::getCapEditOthersPosts()    => true,
            IssueModel::getCapEditPublishedPosts() => true,
        ];
    }
}
