<?php

namespace Ivy\Maint\Models\ValueObjects;

use Ivy\Mu\Interfaces\Models\ValueObjectInterface;

class SkillValueObject implements ValueObjectInterface
{
    /** @var string skill's slug */
    private $slug = '';

    /** @var string skill's human-readable text */
    private $name = '';

    /** @var int skills price per hour */
    private $price = 0;

    public static function fromArray($array)
    {
        $instance = new static();

        $instance->setSlug(muFromAssoc($array, 'slug'));
        $instance->setName(muFromAssoc($array, 'name'));
        $instance->setPrice(muFromAssoc($array, 'price'));

        return $instance;
    }

    public function toArray()
    {
        return [
            'slug'  => $this->getSlug(),
            'name'  => $this->getName(),
            'price' => $this->getPrice(),
        ];
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->slug = sanitize_key($slug);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = sanitize_text_field($name);
    }

    /**
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice($price)
    {
        $this->price = intval($price);
    }
}
