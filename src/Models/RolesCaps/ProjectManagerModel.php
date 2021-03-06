<?php

namespace Ivy\Maint\Models\RolesCaps;

use Ivy\Maint\Models\CustomPosts\IssueModel;
use Ivy\Maint\Models\CustomPosts\ProjectModel;
use Ivy\Maint\Models\Taxonomies\MilestoneModel;
use Ivy\Mu\Models\BaseRolesCapsModel;
use function Ivy\Maint\Functions\prefixed;

/**
 * Class ProjectManagerModel
 *
 * 프로젝트 매니저 역할을 담당.
 *
 * - 수퍼바이저에 의해 프로젝트 배정됨.
 * - 담당한 프로젝트에 대해 편집 권한을 가지게 됨. (생성/삭제 불가)
 * - 프로젝트 내부 이슈에 대해 모든 권한을 가지게 됨.
 *
 * @package Ivy\Maint\Models\RolesCaps
 */
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

    public function getCapabilities()
    {
        $issueCaps = IssueModel::getCapabilityArray();

        return array_merge(
            [
                'read'                                   => true,

                // projects
                ProjectModel::getCapEditPosts()          => true,
                ProjectModel::getCapEditPublishedPosts() => true,
                ProjectModel::getCapEditPrivatePosts()   => true,
                ProjectModel::getCapPublishPosts()       => true,
                ProjectModel::getCapReadPrivatePosts()   => true,

                // milestones
                MilestoneModel::getCapEditTerms()        => true,
                MilestoneModel::getCapAssignTerms()      => true,
                MilestoneModel::getCapDeleteTerms()      => true,
            ],
            array_combine(array_values($issueCaps), array_pad([], count($issueCaps), true))
        );
    }
}
