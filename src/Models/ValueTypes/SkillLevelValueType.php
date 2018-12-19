<?php

namespace Ivy\Maint\Models\ValueTypes;

use Ivy\Mu\Models\ValueTypes\BaseValueType;

class SkillLevelValueType extends BaseValueType
{
    public function getType()
    {
        return 'array';
    }

    public function sanitize($value)
    {
        $output = [];

        if (is_array($value)) {
            foreach ($value as $item) {
                $k = muFromAssoc($item, 'slug', '', 'sanitize_key');
                $v = muFromAssoc($item, 'label', '', 'sanitize_text_field');
                if ($k && $v) {
                    $output[$k] = $v;
                }
            }
        }

        return $output;
    }

    public function verify($value)
    {
        return [true, ''];
    }
}
