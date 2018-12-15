<?php

namespace Ivy\Maint\Models\CustomPosts;

use Ivy\Maint\Models\ValueObjects\BillableHour;
use Ivy\Mu\Models\CustomPostModel;
use Ivy\Mu\Models\ValueTypes\DatetimeType;
use Ivy\Mu\Models\ValueTypes\ValueObjectValueType;
use function Ivy\Maint\Functions\prefixed;

class ProjectModel extends CustomPostModel
{
    public static function getPostType()
    {
        return prefixed('project');
    }

    public function getPostTypeArgs()
    {
        return [
            'label'                 => '프로젝트',
            'labels'                => [
                'name'                  => '프로젝트들',
                'singular_name'         => '프로젝트',
                'add_new'               => '새로 추가',
                'add_new_item'          => '새 프로젝트 추가',
                'edit_item'             => '프로젝트 편집',
                'view_item'             => '프로젝트 보기',
                'view_items'            => '프로젝트들 보기',
                'search_items'          => '프로젝트 검색',
                'not_found'             => '찾을 수 없음',
                'not_found_in_trash'    => '휴지통에서 프로젝트 찾을 수 없음',
                'parent_item_colon'     => '상위 프로젝트:',
                'all_items'             => '모든 프로젝트',
                'archives'              => '목록',
                'attributes'            => '속성들',
                'insert_into_item'      => '이 항목으로 삽입',
                'uploaded_to_this_item' => '이 프로젝트에 업로드',
                'featured_image'        => '대표 이미지',
                'set_featured_image'    => '대표 이미지 지정',
                'remove_featured_image' => '대표 이미지 제거',
                'use_featured_image'    => '대표 이미지로 사용',
                'menu_name'             => '프로젝트',
                'filter_items_list'     => '프로젝트 목록 필터',
                'items_list_navigation' => '프로젝트 목록 네비게이션',
                'items_list'            => '프로젝트 목록',
                'name_admin_bar'        => '프로젝트',
            ],
            'description'           => '프로젝트 정보를 기록하는 커스텀 포스트입니다.',
            'public'                => false,
            'exclude_from_search'   => true,
            'publicly_queryable'    => false,
            'show_ui'               => true,
            'show_in_nav_menus'     => false,
            'show_in_menu'          => true,
            'show_in_admin_bar'     => true,
            'menu_position'         => 23,
            'menu_icon'             => 'dashicons-portfolio',
            'capability_type'       => ['project', 'projects'],
            'capabilities'          => static::getCapabilityArray(),
            'map_meta_cap'          => true,
            'hierarchical'          => false,
            'supports'              => ['title', 'editor', 'thumbnail'],
            'register_meta_box_cb'  => null,
            'taxonomies'            => [],
            'has_archive'           => false,
            'rewrite'               => [
                'slug'       => 'project',
                'with_front' => false,
                'feeds'      => false,
                'pages'      => false,
                'ep_mask'    => EP_PERMALINK,
            ],
            'permalink_epmask'      => EP_PERMALINK,
            'query_var'             => prefixed('project', true),
            'can_export'            => true,
            'delete_with_user'      => false,
            'show_in_rest'          => true,
            'rest_base'             => prefixed('project'),
            'rest_controller_class' => 'WP_REST_Posts_Controller',
        ];
    }

    public function getFieldStartDate()
    {
        return $this->getMetaFieldModel(
            prefixed('start_date'),
            [
                'label'      => '프로젝트 시작일',
                'shortLabel' => '시작',
                'valueType'  => new DatetimeType(),
            ]
        );
    }

    public function getFieldEndDate()
    {
        return $this->getMetaFieldModel(
            prefixed('end_date'),
            [
                'label'      => '프로젝트 종료일',
                'shortLabel' => '종료',
                'valueType'  => new DatetimeType(),
            ]
        );
    }

    public function getFieldBillableHour()
    {
        return $this->getMetaFieldModel(
            prefixed('billable_hour'),
            [
                'label'      => '청구 시간 설정',
                'shortLabel' => 'BH',
                'valueType'  => new ValueObjectValueType(BillableHour::class),
            ]
        );
    }

    public function getMilestones()
    {
    }

    public function getIssues()
    {
    }

    public function getProjectManagers()
    {
    }

    public function getIssueManagers()
    {
    }

    public function getIssueAgents()
    {
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
            'delete_others_posts'    => self::getCapDeleteOthersPosts(),
            'delete_posts'           => self::getCapDeletePosts(),
            'delete_private_posts'   => self::getCapDeletePrivatePosts(),
            'delete_published_posts' => self::getCapDeletePublishedPosts(),
            'edit_others_posts'      => self::getCapEditOthersPosts(),
            'edit_posts'             => self::getCapEditPosts(),
            'edit_private_posts'     => self::getCapEditPrivatePosts(),
            'edit_published_posts'   => self::getCapEditPublishedPosts(),
            'publish_posts'          => self::getCapPublishPosts(),
            'read_private_posts'     => self::getCapReadPrivatePosts(),
        ];
    }

    public static function getCapDeleteOthersPosts()
    {
        return 'delete_others_projects';
    }

    public static function getCapDeletePosts()
    {
        return 'delete_projects';
    }

    public static function getCapDeletePrivatePosts()
    {
        return 'delete_private_projects';
    }

    public static function getCapDeletePublishedPosts()
    {
        return 'delete_published_projects';
    }

    public static function getCapEditOthersPosts()
    {
        return 'edit_others_projects';
    }

    public static function getCapEditPosts()
    {
        return 'edit_projects';
    }

    public static function getCapEditPrivatePosts()
    {
        return 'edit_private_projects';
    }

    public static function getCapDeletePost()
    {
        return 'delete_project';
    }

    public static function getCapEditPublishedPosts()
    {
        return 'edit_published_projects';
    }

    public static function getCapPublishPosts()
    {
        return 'edit_publish_projects';
    }

    public static function getCapReadPrivatePosts()
    {
        return 'read_private_projects';
    }
}
