<?php

namespace Ivy\Maint\Views\Admin\FieldWidgets;

use Ivy\Mu\Interfaces\Models\FieldModelInterface;
use Ivy\Mu\Views\Admin\FieldWidgets\BaseFieldWidget;
use function Ivy\Maint\Functions\prefixed;

class Select2Widget extends BaseFieldWidget
{
    protected $select2Handle = '';

    protected $widgetHandle = '';

    /**
     * Select2Widget constructor.
     *
     * @param FieldModelInterface|null $field
     * @param array                    $args
     */
    public function __construct($field = null, array $args = array())
    {
        parent::__construct($field, $args);

        $this->select2Handle = prefixed('select2', 1);
        $this->widgetHandle  = prefixed('select2-widget', 1);

        if (empty($this->args['choice'])) {
            $this->args['choice'] = muFromAssoc($field->getValueType()->getArgs(), 'choice', array());
        }
    }

    public function renderWidget()
    {
        $this->enqueueScripts();

        $options = $this->args['choice'];

        if (is_callable($options)) {
            $options = call_user_func($options, $this);
        }

        $this->render(
            'admin/field-widgets/select2-cg.php',
            array(
                'options'  => &$options,
                'selected' => $this->getValue(),
                'attrs'    => array_merge(
                    $this->args['selectAttrs'],
                    array(
                        'id'   => $this->getId(),
                        'name' => $this->getName(),
                    )
                ),
            )
        );
    }

    public function getDefaultArgs()
    {
        return array_merge(
            parent::getDefaultArgs(),
            array(
                // array         key-value 로 select 로 들어갈 옵션. 빈 값이면 valueType 의 choices 에서 가져온다.
                'choice'      => array(),

                // array         select2 에게로 전달되는 옵션값
                'select2Opts' => array('language' => 'ko'),

                // array         select 태그의 속성으로 전달
                'selectAttrs' => array(),
            )
        );
    }

    protected function enqueueScripts()
    {
        if (!wp_script_is($this->select2Handle)) {
            wp_enqueue_script(
                $this->select2Handle,
                muFilterScriptUrl('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js', true),
                array('jquery'),
                null,
                true
            );
            wp_enqueue_script(
                $this->select2Handle . '-ko',
                'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/i18n/ko.js',
                array($this->select2Handle),
                null,
                true
            );
        }
        if (!wp_style_is($this->select2Handle)) {
            wp_enqueue_style(
                $this->select2Handle,
                muFilterScriptUrl('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css', true),
                array(),
                null
            );
        }

        if (!wp_script_is($this->widgetHandle)) {
            wp_enqueue_script(
                $this->widgetHandle,
                $this->getJsUrl('admin/field-widgets/select2.js'),
                array($this->select2Handle),
                $this->getLauncher()->getVersion(),
                true
            );
        }

        wp_localize_script(
            $this->widgetHandle,
            'select2Widget_' . $this->getId(),
            array(
                'targetSelector' => '#' . $this->getId(),
                'select2'        => $this->args['select2Opts'],
            )
        );

        wp_add_inline_script(
            $this->widgetHandle,
            "initSelect2Widget(select2Widget_{$this->getId()});"
        );
    }
}
