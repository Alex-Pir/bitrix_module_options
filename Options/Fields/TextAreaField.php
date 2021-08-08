<?php
namespace Polus\Options\Fields;

/**
 * Строковое поле
 *
 * Class StringField
 * @package Polus\Options\Fields
 */
class TextAreaField extends Fields
{
    public function __construct(string $code, string $label, array $size = [10, 45]) {
        parent::__construct($code, $label, $size);
    }

    /**
     * Получение атрибутов поля
     *
     * @return array
     */
    protected function getAttributes(): array {
        return array_merge([self::TEXTAREA_FIELD], $this->size);
    }
}