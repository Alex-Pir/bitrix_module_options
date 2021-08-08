<?php
namespace Polus\Options\Fields;

use Bitrix\Main\SystemException;
use Polus\Options\Drawn;
use Polus\Options\ModuleSettings;

/**
 * Класс для создания полей и работы с ними
 *
 * Class Fields
 * @package Polus\Options\Fields
 */
abstract class Fields implements Drawn
{
    /** @var string допустимые поля */
    const TEXT_FIELD = "text";
    const PASSWORD_FIELD = "password";
    const TEXTAREA_FIELD = "textarea";
    const CHECKBOX_FIELD = "checkbox";
    const SELECTBOX_FIELD = "selectbox";
    const HTML_FIELD = "statichtml";

    /** @var string код поля */
    protected $code;

    /** @var string описание поля */
    protected $label;

    /** @var int|array|null размер поля */
    protected $size;

    /** @var array описание поля в виде массива вида [code, label, default_value, [type, size]] */
    protected $optionDescription;

    public function __construct(string $code, string $label, $size = null) {
        $this->code = $code;
        $this->label = $label;
        $this->size = $size;
        $this->optionDescription = [];

        $this->init();
    }

    /**
     * Отрисовка поля
     */
    public function draw() {
        try {
            __AdmSettingsDrawRow(ModuleSettings::getInstance()->getModuleId(), $this->optionDescription);
        } catch(SystemException $ex) {
            AddMessage2Log($ex->getMessage());
        }
    }

    /**
     * Сохранение поля
     */
    public function save() {
        try {
            __AdmSettingsSaveOption(ModuleSettings::getInstance()->getModuleId(), $this->optionDescription);
        } catch(SystemException $ex) {
            AddMessage2Log($ex->getMessage());
        }
    }

    /**
     * Инициализация поля, заполнение массива
     * $this->optionDescription
     */
    protected function init() {
        $this->optionDescription = [$this->code, $this->label, "", $this->getAttributes()];
    }

    /**
     * Получение атрибутов поля
     *
     * @return mixed
     */
    protected abstract function getAttributes(): array;
}