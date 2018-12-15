<?php

namespace Ivy\Maint\Models\ValueObjects;

use Ivy\Mu\Interfaces\Models\ValueObjectInterface;

class BillableHour implements ValueObjectInterface
{
    private $costs = [];

    public function getAllCosts()
    {
        return $this->costs;
    }

    public function getCost($grade)
    {
        return muFromAssoc(
            $this->costs,
            $grade,
            false,
            function ($v) {
                if ($v !== false) {
                    // NOTE: 한국 통화 설정상, 정수로도 충분.
                    $v = intval($v);
                }
                return $v;
            }
        );
    }

    public function setCost($grade, $cost)
    {
        $grade = sanitize_key($grade);
        $cost  = intval($cost);

        $this->costs[$grade] = $cost;
    }

    public static function fromArray($array)
    {
        $instance = new static();

        if (is_array($array)) {
            foreach ($array as $grade => $cost) {
                $instance->setCost($grade, $cost);
            }
        }

        return $instance;
    }

    public function toArray()
    {
        return $this->costs;
    }
}
