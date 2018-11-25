<?php

namespace Ivy\Maint\Models\Taxonomies;

use Ivy\Maint\Models\CustomPosts\ProjectModel;
use Ivy\Mu\Models\TaxonomyModel;
use function Ivy\Maint\Functions\prefixed;

class MilestoneModel extends TaxonomyModel
{
    public static function getTaxonomy()
    {
        return prefixed('milestone', 1);
    }

    public function getTaxonomyArgs()
    {
        return [
            'label'                 => '마일스톤들',
            'labels'                => [
                'name'                       => '마일스톤들',
                'singular_name'              => '마일스톤',
                'menu_name'                  => '마일스톤',
                'all_items'                  => '모든 마일스톤',
                'edit_item'                  => '마일스톤 편집',
                'view_item'                  => '마일스톤 보기',
                'update_item'                => '마일스톤 업데이트',
                'add_new_item'               => '새 마일스톤 추가',
                'new_item_name'              => '새 마일스톤 이름',
                'parent_item'                => '부모 마일스톤',
                'parent_item_colon'          => '부모 마일스톤:',
                'search_items'               => '마일스톤 검색',
                'popular_items'              => '자주 사용된 마일스톤',
                'separate_items_with_commas' => '마일스톤을 콤마로 분리',
                'add_or_remove_items'        => '마일스톤 추가 또는 삭제',
                'choose_from_most_used'      => '많이 사용된 마일스톤에서 선택',
                'not_found'                  => '찾을 수 없음',
                'back_to_items'              => '마일스톤 목록으로 돌아가기',
            ],
            'public'                => 'false',
            'publicly_queryable'    => false,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'show_in_nav_menus'     => false,
            'show_in_rest'          => false,
            'rest_base'             => static::getTaxonomy(),
            'rest_controller_class' => 'WP_REST_Terms_Controller',
            'show_tagcloud'         => false,
            'show_in_quick_edit'    => true,
            'meta_box_cb'           => null,
            'show_admin_column'     => true,
            'description'           => '프로젝트의 중요 마일스톤을 나타내는 태그',
            'hierarchical'          => false,
            'update_count_callback' => '',
            'query_var'             => prefixed('milestone', 1),
            'rewrite'               => [
                'slug'         => 'milestone',
                'with_front'   => false,
                'hierarchical' => false,
                'ep_mask'      => EP_NONE,
            ],
            'capabilities'          => static::getCapabilityArray(),
            'sort'                  => false,
        ];
    }

    public function getObjectType()
    {
        return [
            ProjectModel::getPostType()
        ];
    }

    public function activationSetup()
    {
    }

    public function deactivationCleanup()
    {
    }

    public static function getCapabilityArray()
    {
        return [
            'manage_terms' => static::getCapManageTerms(),
            'edit_terms'   => static::getCapEditTerms(),
            'delete_terms' => static::getCapDeleteTerms(),
            'assign_terms' => static::getCapAssignTerms(),
        ];
    }

    public static function getCapManageTerms()
    {
        return 'manage_milestones';
    }

    public static function getCapEditTerms()
    {
        return 'edit_milestones';
    }

    public static function getCapDeleteTerms()
    {
        return 'delete_milestones';
    }

    public static function getCapAssignTerms()
    {
        return 'assign_milestones';
    }
}
