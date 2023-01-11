<?php
namespace Polus\Options\Fields;

class CheckboxField extends Fields
{
    public function __construct(string $code, string $label) {
        parent::__construct($code, $label);
    }

    /**
     * Получение атрибутов поля
     *
     * @return array
     */
    protected function getAttributes(): array {
       return [self::CHECKBOX_FIELD];
    }
}