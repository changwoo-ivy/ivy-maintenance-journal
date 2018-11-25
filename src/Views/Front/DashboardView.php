<?php

namespace Ivy\Maint\Views\Front;

use Ivy\Mu\Views\BaseView;
use function Ivy\Maint\Functions\prefixed;

class DashboardView extends BaseView
{
    public function index()
    {
        $this->renderCustomPage('front/dashboard/index.php');
    }

    public function projects()
    {
        $this->renderCustomPage('front/dashboard/projects.php');
    }

    public function issues()
    {
        $this->renderCustomPage('front/dashboard/issues.php');
    }

    private function renderCustomPage($templateName, $context = array())
    {
        $that = &$this;

        $this->prepareScripts();
        $this->render(
            'front/dashboard/header-imj.php',
            [
                'sidebar_func' => function () use ($that) {
                    $that->render('front/dashboard/sidebar-imj.php');
                },
                'header_func'  => function () use ($that) {
                    wp_print_styles();
                    wp_print_head_scripts();
                }
            ]
        );
        $this->render($templateName, $context);
        $this->render(
            'front/dashboard/footer-imj.php',
            [
                'footer_func' => function () use ($that) {
                    wp_print_footer_scripts();
                    // wp_admin_bar_render();
                }
            ]
        );
    }

    private function prepareScripts()
    {
        wp_enqueue_style(
            prefixed('bootstrap', 1),
            $this->getAssetsUrl('externals', 'bootstrap-4.1.3/css/bootstrap.css', false),
            [],
            '4.1.3'
        );

        wp_enqueue_style(
            prefixed('font-awesome', 1),
            $this->getAssetsUrl('externals', 'font-awesome-4.7.0/css/font-awesome.css', false),
            [],
            '4.7.0'
        );

        wp_enqueue_style(
            prefixed('themefy-icons', 1),
            $this->getAssetsUrl('externals', 'themify-icons/themify-icons.css', false),
            [],
            '4.7.0'
        );

        wp_enqueue_style(
            prefixed('style', 1),
            $this->getCssUrl('front/dashboard/style.css'),
            [],
            $this->getLauncher()->getVersion()
        );

        $this->enqueueJs(
            prefixed('sidebar', 1),
            'front/dashboard/sidebar.js',
            [],
            '1.0.0',
            true
        );
    }
}
