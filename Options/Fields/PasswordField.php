<?php
namespace Polus\Options\Fields;

/**
 * Поле для пароля
 *
 * Class PasswordField
 * @package Polus\Options\Fields
 */
class PasswordField extends StringField
{
    /**
     * Получение атрибутов поля
     *
     * @return array
     */
    protected function getAttributes(): array {
        return [self::PASSWORD_FIELD, $this->size];
    }
}