<?php

namespace Ivy\Maint\Views\Admin\Metaboxes;

use Ivy\Maint\Models\CustomPosts\ProjectModel;
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

        return [
            // TODO: 프로젝트 매니저 설정
            // TODO: 이슈 매니저 설정
            // TODO: 이슈 에이전트 설정
            // TODO: 관련 이슈 목록
        ];
    }
}
