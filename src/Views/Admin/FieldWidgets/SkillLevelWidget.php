<?php

namespace Ivy\Maint\Views\Admin\FieldWidgets;

use Ivy\Mu\Views\Admin\FieldWidgets\BaseFieldWidget;
use function Ivy\Maint\Functions\prefixed;

class SkillLevelWidget extends BaseFieldWidget
{
    static $idx = 1;

    public function renderWidget()
    {
        $widgetId = $this->getId() . '-' . self::$idx;

        $this->render(
            'admin/field-widgets/skill-level.php',
            [
                'widget_id'       => $widgetId,
                'meta_key'        => $this->getId(),
                'output_template' => self::$idx == 1,
            ]
        );

        if (!wp_script_is('mu-repeatable')) {
            $this->enqueueJs(
                'mu-repeatable',
                'mu-repeatable.js',
                ['jquery', 'jquery-ui-sortable', 'wp-util'],
                IVY_MU_VERSION,
                true, '', [], '', 'after', false, true
            );
        }

        if (!wp_script_is(prefixed('skill-level', 1))) {
            $this->enqueueJs(
                prefixed('skill-level', 1),
                'admin/field-widgets/skill-level.js',
                ['mu-repeatable'],
                $this->getLauncher()->getVersion(),
                true
            );
        }

        $value = $this->getValue();
        $items = [];

        foreach ($value as $slug => $label) {
            $items[] = [
                'slug'  => $slug,
                'label' => $label,
            ];
        }

        wp_localize_script(
            prefixed('skill-level', 1),
            'skillLevel_' . static::$idx,
            [
                'template'             => 'skill-level',
                'repeatedNodeSelector' => '.skill-level-item',
                'items'                => &$items,
            ]
        );

        wp_add_inline_script(
            prefixed('skill-level', 1),
            "initSkillLevel('{$widgetId}', skillLevel_" . static::$idx . ");"
        );

        ++static::$idx;
    }
}
