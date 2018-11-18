<?php

namespace Ivy\Maint\Models\RolesCaps;

use Ivy\Maint\Models\CustomPosts\IssueModel;
use Ivy\Maint\Models\CustomPosts\ProjectModel;
use Ivy\Mu\Models\BaseRolesCapsModel;
use function Ivy\Maint\Functions\prefixed;

class SupervisorModel extends BaseRolesCapsModel
{
    public static function getRoleName()
    {
        return prefixed('supervisor');
    }

    public static function getDisplayName()
    {
        return '수퍼바이저';
    }

    public function getCapabilities()
    {
        $projectCaps = array_values(ProjectModel::getCapabilityArray());
        $issueCaps   = array_values(IssueModel::getCapabilityArray());

        return array_merge(
            array_combine($projectCaps, array_pad([], count($projectCaps), true)),
            array_combine($issueCaps, array_pad([], count($issueCaps), true))
        );
    }
}