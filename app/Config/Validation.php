<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation extends BaseConfig
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------

     // Categories 
    public $category = [
        'name' => 'required|min_length[3]|max_length[90]|is_unique[categories.name,id,{id}]',
    ];
    public $category_errors = [
        'name' => [
            'required' => 'O nome é obrigatório',
            'min_length' => 'Informe pelo menos 3 caracteres',
            'max_length' => 'O tamanho máximo é de 90 caracteres',
            'is_unique'=> 'O nome da categoria já existe!',
        ]
        ];
    

}
