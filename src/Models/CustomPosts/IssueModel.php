<?php

namespace Ivy\Maint\Models\CustomPosts;

use Ivy\Mu\Models\CustomPostModel;
use function Ivy\Maint\Functions\prefixed;

class IssueModel extends CustomPostModel
{
    public static function getPostType()
    {
        return prefixed('issue');
    }

    public function getPostTypeArgs()
    {
        return [
            'label'                 => '이슈',
            'labels'                => [
                'name'                  => '이슈들',
                'singular_name'         => '이슈',
                'add_new'               => '새로 추가',
                'add_new_item'          => '새 이슈 추가',
                'edit_item'             => '이슈 편집',
                'view_item'             => '이슈 보기',
                'view_items'            => '이슈들 보기',
                'search_items'          => '이슈 검색',
                'not_found'             => '찾을 수 없음',
                'not_found_in_trash'    => '휴지통에서 이슈 찾을 수 없음',
                'parent_item_colon'     => '상위 이슈:',
                'all_items'             => '모든 이슈',
                'archives'              => '목록',
                'attributes'            => '속성들',
                'insert_into_item'      => '이 항목으로 삽입',
                'uploaded_to_this_item' => '이 이슈에 업로드',
                'featured_image'        => '대표 이미지',
                'set_featured_image'    => '대표 이미지 지정',
                'remove_featured_image' => '대표 이미지 제거',
                'use_featured_image'    => '대표 이미지로 사용',
                'menu_name'             => '이슈',
                'filter_items_list'     => '이슈 목록 필터',
                'items_list_navigation' => '이슈 목록 네비게이션',
                'items_list'            => '이슈 목록',
                'name_admin_bar'        => '이슈',
            ],
            'description'           => '이슈 정보를 기록하는 커스텀 포스트입니다.',
            'public'                => false,
            'exclude_from_search'   => true,
            'publicly_queryable'    => true,
            'show_ui'               => true,
            'show_in_nav_menus'     => false,
            'show_in_menu'          => true,
            'show_in_admin_bar'     => true,
            'menu_position'         => 22,
            'menu_icon'             => 'dashicons-format-chat',
            'capability_type'       => ['issue', 'issues'],
            'capabilities'          => static::getCapabilityArray(),
            'map_meta_cap'          => true,
            'hierarchical'          => false,
            'supports'              => ['title', 'editor', 'author', 'thumbnail', 'excerpt'],
            'register_meta_box_cb'  => null,
            'taxonomies'            => [],
            'has_archive'           => false,
            'rewrite'               => [
                'slug'       => 'issue',
                'with_front' => false,
                'feeds'      => false,
                'pages'      => false,
                'ep_mask'    => EP_PERMALINK,
            ],
            'permalink_epmask'      => EP_PERMALINK,
            'query_var'             => prefixed('issue', true),
            'can_export'            => true,
            'delete_with_user'      => false,
            'show_in_rest'          => true,
            'rest_base'             => prefixed('issue'),
            'rest_controller_class' => 'WP_REST_Posts_Controller'
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
            'edit_post'          => self::getCapEditPost(),
            'read_post'          => self::getCapReadPost(),
            'delete_post'        => self::getCapDeletePost(),
            'edit_posts'         => self::getCapEditPosts(),
            'edit_others_posts'  => self::getCapEditOthersPosts(),
            'publish_posts'      => self::getCapPublishPosts(),
            'read_private_posts' => self::getCapReadPrivatePosts(),
            'create_posts'       => self::getCapCreatePosts(),
        ];
    }

    public static function getCapEditPost()
    {
        return 'edit_issue';
    }

    public static function getCapReadPost()
    {
        return 'read_issue';
    }

    public static function getCapDeletePost()
    {
        return 'delete_issue';
    }

    public static function getCapEditPosts()
    {
        return 'edit_issues';
    }

    public static function getCapEditOthersPosts()
    {
        return 'edit_others_issues';
    }

    public static function getCapPublishPosts()
    {
        return 'publish_issues';
    }

    public static function getCapReadPrivatePosts()
    {
        return 'read_private_issues';
    }

    public static function getCapCreatePosts()
    {
        return 'create_issues';
    }
}