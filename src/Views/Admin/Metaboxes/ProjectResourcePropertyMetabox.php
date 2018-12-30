<?php

namespace Ivy\Maint\Views\Admin\Metaboxes;

use Ivy\Maint\Models\CustomPosts\ProjectModel;
use Ivy\Maint\Models\RolesCaps\IssueAgentModel;
use Ivy\Maint\Models\RolesCaps\IssueManagerModel;
use Ivy\Maint\Models\RolesCaps\ProjectManagerModel;
use Ivy\Maint\Views\Admin\FieldWidgets\Select2Widget;
use Ivy\Mu\Views\Admin\PropertyMetaBoxView;

/**
 * Class ProjectResourcePropertyMetabox
 *
 * @package Ivy\Maint\Views\Admin\Metaboxes
 *
 * @method ProjectModel getModel()
 */
class ProjectResourcePropertyMetabox extends PropertyMetaBoxView
{
    public function setup($args = array())
    {
        $this->setModel($this->queryModel(ProjectModel::class));
    }

    public function getNonceAction()
    {
        return 'phrpmv_hkj@pmn@#b*!';
    }

    public function getNonceParam()
    {
        return 'phrpmv_nonce';
    }

    public function getId()
    {
        return 'phrpmv';
    }

    public function getTitle()
    {
        return '프로젝트 리소스 속성';
    }

    public function getFieldWidgets($post)
    {
        $model = $this->getModel();

        $select2Opts = ['multiple' => true];
        $selectAttrs = ['style' => 'width: 350px;'];


        return [
            new Select2Widget(
                $model->getFieldProjectManagers(),
                [
                    'choice'      => $this->getUserChoice(ProjectManagerModel::getRoleName()),
                    'select2Opts' => &$select2Opts,
                    'selectAttrs' => &$selectAttrs,
                ]
            ),
            new Select2Widget(
                $model->getFieldIssueManagers(),
                [
                    'choice'      => $this->getUserChoice(IssueManagerModel::getRoleName()),
                    'select2Opts' => &$select2Opts,
                    'selectAttrs' => &$selectAttrs,
                ]
            ),
            new Select2Widget(
                $model->getFieldIssueAgents(),
                [
                    'choice'      => $this->getUserChoice(IssueAgentModel::getRoleName()),
                    'select2Opts' => &$select2Opts,
                    'selectAttrs' => &$selectAttrs,
                ]
            ),
            // TODO: 관련 이슈 목록
        ];
    }

    private function getUserChoice($role)
    {
        $users = get_users(
            [
                'role'    => $role,
                'orderby' => 'display_name',
                'fields'  => ['ID', 'display_name'],
            ]
        );

        $output = [];

        foreach ($users as $user) {
            $output[$user->ID] = $user->display_name;
        }

        return $output;
    }
}
