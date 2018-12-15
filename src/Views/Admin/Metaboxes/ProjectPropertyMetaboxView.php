<?php

namespace Ivy\Maint\Views\Admin\Metaboxes;

use Ivy\Maint\Models\CustomPosts\ProjectModel;
use Ivy\Mu\Views\Admin\FieldWidgets\DatepickerWidget;
use Ivy\Mu\Views\Admin\PropertyMetaBoxView;

class ProjectPropertyMetaboxView extends PropertyMetaBoxView
{
    public function getNonceAction()
    {
        return 'ppmv_kb~9y9^8+]mn';
    }

    public function getNonceParam()
    {
        return 'ppmv_nonce';
    }

    public function getId()
    {
        return 'ppmv';
    }

    public function getTitle()
    {
        return '프로젝트 속성';
    }

    public function getFieldWidgets($post)
    {
        /** @var ProjectModel $model */
        $model = $this->queryModel(ProjectModel::class);

        return [
            new DatepickerWidget($model->getFieldStartDate()),
            new DatepickerWidget($model->getFieldEndDate()),
            // TODO: billable hour 설정 위젯
            // TODO: 프로젝트 매니저 설정
            // TODO: 이슈 매니저 설정
            // TODO: 이슈 에이전트 설정
            // TODO: 관련 이슈 목록
        ];
    }
}
