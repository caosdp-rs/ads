<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Plan extends Entity
{

    private const INTERVAL_MONTHLY = 1; // MENSAL
    private const INTERVAL_QUARTERLY = 3; // TRIMESTRE
    private const INTERVAL_SEMESTER = 6; //
    private const INTERVAL_YEARLY = 12;

    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [
        'plan_id' => 'integer',
        'isHighlighted' => '?integer', // pode ou não estar null
        'is_highlighted' => 'boolean'
    ];

    public function setValue(string $value)
    {
        $this->attributes['value'] = str_replace(',', '', $value);
        return $this;
    }
    public function setAdverts(string $adverts)
    {
        $this->attributes['adverts'] = $adverts ? (int) $adverts : null;
        return $this;
    }
    public function setIsHighlighted(string $isHighlighted)
    {
        $this->attributes['is_highlighted'] = (bool) $isHighlighted;
        return $this;
    }

    public function setIntervalRepeats()
    {
        // GerenciaNet envia a cobrança para o anunciante  até que o plano seja cancelado
        $this->repeats = null;

        $this->attributes['interval'] = match ($this->attributes['recorrence']) {
            'monthly' => self::INTERVAL_MONTHLY,
            'quarterly' => self::INTERVAL_QUARTERLY,
            'semester' => self::INTERVAL_SEMESTER,
            'yearly' => self::INTERVAL_YEARLY,
            default => throw new \InvalidArgumentException("Unsupported {$this->attributes['recorrence']}")
        };
    }

    public function recover()
    {
        $this->attributes['deleted_at'] = null;
    }

    public function isHighlighted()
    {
        return $this->attributes['is_highlighted'] ? lang('Plans.text_is_highlighted') : lang('Plans.text_no_highlighted');
    }

    public function adverts()
    {
        return $this->attributes['adverts'] ??  lang('Plans.text_unlimited_adverts');
    }

    public function details()
    {
        /**
         * @todo alterar para exibir 
         */
        return number_to_currency($this->value,'BRL','pt-BR',2).' /'. $this->recorrence;
    }
}
