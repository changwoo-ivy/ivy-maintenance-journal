<?php

namespace Ivy\Maint\Models;

use Ivy\Maint\Models\ValueObjects\SkillValueObject;
use Ivy\Mu\Models\SettingModel;
use Ivy\Mu\Models\ValueTypes\ArrayType;
use Ivy\Mu\Models\ValueTypes\ValueObjectValueType;
use function Ivy\Maint\Functions\prefixed;

class SettingsModel extends SettingModel
{
    public function setup($args = [])
    {
        $this->setOptionGroup(prefixed('settings'));
    }

    public function getFieldSkillLevels()
    {
        return $this->getOptionFieldModel(
            prefixed('skill_levels'),
            [
                'label'       => '기본 기술 등급',
                'shortLabel'  => '등급',
                'description' => '프로젝트 B/H 정산 체계를 위한 기술 등급을 설정합니다.',
                'valueType'   => new ArrayType(
                    new ValueObjectValueType(SkillValueObject::class),
                    ['preserveKeys' => false]
                ),
                'default'     => [],
                'autoload'    => false,
            ]
        );
    }

    public function activationSetup()
    {
    }

    public function deactivationCleanup()
    {
    }
}
