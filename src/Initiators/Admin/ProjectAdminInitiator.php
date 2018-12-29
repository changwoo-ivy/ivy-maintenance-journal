<?php

namespace Ivy\Maint\Initiators\Admin;

use Ivy\Maint\Models\CustomPosts\ProjectModel;
use Ivy\Maint\Views\Admin\Metaboxes\ProjectBasicPropertyMetaboxView;
use Ivy\Maint\Views\Admin\Metaboxes\ProjectResourcePropertyMetabox;
use Ivy\Maint\Views\Admin\ProjectAdminView;
use Ivy\Mu\Initiators\Admin\CustomPostAdminInitiator;

/**
 * Class ProjectAdminInitiator
 *
 * @package Ivy\Maint\Initiators\Admin
 *
 * @method ProjectModel getModel()
 */
class ProjectAdminInitiator extends CustomPostAdminInitiator
{
    private $view;

    /**
     * @return ProjectAdminView
     */
    public function getView()
    {
        return $this->view;
    }

    public function setView($view)
    {
        $this->view = $view;
    }

    public function setup($args = [])
    {
        $this->setModel($this->queryModel(ProjectModel::class));
        $this->setView($this->queryModel(ProjectAdminView::class));

        $this->enableKeyword(static::ACTION_META_BOXES);
    }

    public function actionMetaBoxes($post)
    {
        foreach (
            [
                ProjectBasicPropertyMetaboxView::class,
                ProjectResourcePropertyMetabox::class,
            ]
            as $metaboxView
        ) {
            /** @noinspection PhpUndefinedMethodInspection */
            $this->queryView($metaboxView)->addMetaBox();
        }
    }
}
