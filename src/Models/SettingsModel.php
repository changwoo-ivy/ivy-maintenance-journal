<?php

namespace Ivy\Maint\Models;

use Ivy\Maint\Models\ValueTypes\SkillLevelValueType;
use Ivy\Mu\Models\SettingModel;
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
                'label'       => '기술등급',
                'shortLabel'  => '등급',
                'description' => '프로젝트 B/H 정산 체계를 위한 기술 등급을 설정합니다.',
                'valueType'   => new SkillLevelValueType(),
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
