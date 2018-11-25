<?php

namespace Ivy\Maint\Initiators;

use Ivy\Maint\Models\RolesCaps\ProjectManagerModel;
use Ivy\Maint\Models\RolesCaps\SupervisorModel;
use Ivy\Mu\Initiators\AutoHookInitiator;

class RolesCapsInitiator extends AutoHookInitiator
{
    /**
     * @param array    $meta
     * @param \WP_User $user
     *
     * @return array
     */
    public function filter_10_2_insert_user_meta($meta, $user)
    {
        $wpdb      = &muGetWpDb();
        $userLevel = intval($user->user_level);

        if ($userLevel < 7 && $user->has_cap(SupervisorModel::getRoleName())) {
            $meta["{$wpdb->prefix}user_level"] = 7;
        } elseif ($userLevel < 6 && $user->has_cap(ProjectManagerModel::getRoleName())) {
            $meta["{$wpdb->prefix}user_level"] = 6;
        }

        return $meta;
    }
}
