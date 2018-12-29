<?php

namespace Ivy\Maint\Views\Admin\Metaboxes;

use Ivy\Maint\Models\CustomPosts\ProjectModel;
use Ivy\Mu\Views\Admin\FieldWidgets\DatepickerWidget;
use Ivy\Mu\Views\Admin\PropertyMetaBoxView;
use function Ivy\Maint\Functions\getSkillLevelAdminFieldWidget;

/**
 * Class ProjectBasicPropertyMetaboxView
 *
 * @package Ivy\Maint\Views\Admin\Metaboxes
 *
 * @method ProjectModel getModel()
 */
class ProjectBasicPropertyMetaboxView extends PropertyMetaBoxView
{
    public function setup($args = array())
    {
        $this->setModel($this->queryModel(ProjectModel::class));
    }

    public function getNonceAction()
    {
        return 'pbpmv_kb~9y9^8+]mn';
    }

    public function getNonceParam()
    {
        return 'pbpmv_nonce';
    }

    public function getId()
    {
        return 'pbpmv';
    }

    public function getTitle()
    {
        return '프로젝트 기본 속성';
    }

    public function getFieldWidgets($post)
    {
        $model = $this->getModel();

        return [
            new DatepickerWidget($model->getFieldStartDate()),
            new DatepickerWidget($model->getFieldEndDate()),
            getSkillLevelAdminFieldWidget($model->getFieldBillableHour()),
        ];
    }
}
