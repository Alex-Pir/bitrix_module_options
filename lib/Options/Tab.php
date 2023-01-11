<?php
namespace Polus\Options;

use Polus\Options\Fields\Fields;

/**
 * Класс для объединения полей в один блок (таб)
 *
 * Class Tab
 * @package Polus\Options
 */
class Tab implements Drawn
{
    /** @var string код таба */
    protected $code;

    /** @var string название таба */
    protected $name;

    /** @var string заголовок таба */
    protected $title;

    /** @var array поля таба */
    protected $fields;

    /** @var array описание таба в виде массива */
    protected $tabDescription;

    public function __construct(string $code, string $name, string $title) {
        $this->code = $code;
        $this->name = $name;
        $this->title = $title;
        $this->fields = [];
        $this->tabDescription = null;

        $this->init();
    }

    /**
     * Инициализация таба
     */
    protected function init() {
        $this->tabDescription = [
                "DIV" => $this->code,
                "TAB" => $this->name,
                "TITLE" => $this->title,
          ];
    }

    /**
     * Добавление поля в таб
     *
     * @param Fields $field
     */
    public function addField(Fields $field) {
        $this->fields[] = $field;
    }

    /**
     * Получение описания таба
     *
     * @return array
     */
    public function getTabDescription(): array {
        return $this->tabDescription;
    }

    /**
     * Отрисовка всех полей таба
     */
    public function draw() {
        foreach ($this->fields as $field) {
            $field->draw();
        }
    }

    /**
     * Сохранение значений всех полей таба
     */
    public function save() {
        foreach ($this->fields as $field) {
            $field->save();
        }
    }
}