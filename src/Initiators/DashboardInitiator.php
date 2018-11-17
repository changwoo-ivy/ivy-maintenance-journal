<?php

namespace Ivy\Maint\Initiators;

use Ivy\Maint\Views\Front\DashboardView;
use Ivy\Mu\Initiators\RewriteInitiator;

class DashboardInitiator extends RewriteInitiator
{
    public function setup($args = array())
    {
        $this
            ->addPublicParam('imj')
            ->addRewrite(
                'dashboard-index',
                '^imj/dashboard/?$',
                'index.php?imj=dashboard',
                'top',
                [DashboardView::class, 'index']
            )
            ->addRewrite(
                'dashboard-projects',
                '^imj/dashboard/projects/?$',
                'index.php?imj=dashboard-projects',
                'top',
                [DashboardView::class, 'projects']
            )
            ->addRewrite(
                'dashboard-issues',
                '^imj/dashboard/issues/?$',
                'index.php?imj=dashboard-issues',
                'top',
                [DashboardView::class, 'issues']
            );
    }
}
