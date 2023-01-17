<?php

namespace App\Models;

use App\Entities\Advert;

class AdvertModel extends MyBaseModel
{

    private $user;

    public function __construct()
    {
        parent::__construct();

        $this->user = service('auth')->user();
    }
    protected $DBGroup          = 'default';
    protected $table            = 'adverts';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = Advert::class;
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'user_id',
        'category_id',
        'code',
        'title',
        'description',
        'price',
        //'is_published',
        'situation',
        'zipcode',
        'street',
        'number',
        'neighborhood',
        'city',
        'state',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['escapeDataXSS', 'generateCitySlug','generateCode','setUserID'];
    protected $beforeUpdate   = ['escapeDataXSS', 'generateCitySlug'];


    protected function generateCitySlug(array $data): array
    {
        if (isset($data['data']['city'])) {
            $data['data']['cityslug'] = mb_url_title($data['data']['name'], '-', lowercase:true);
        }
        return $data;
    }
    protected function generateCode(array $data): array
    {
        if (isset($data['data'])) {
            $data['data']['code'] = strtoupper(uniqid('AVERT_',true));
        }
        return $data;
    }
    protected function setUserID(array $data): array
    {
        if (isset($data['data'])) {
            $data['data']['user_id'] = $this->user->id;
        }
        return $data;
    }

    /**
     * Recupera todos os anúncios de acordo com o usuário logado
     * 
     * @param boolean $onlyDeleted
     * @return array
     */

    public function getAllAdverts(bool $onlyDeleted = false)
    {
        $this->setSQLMode();
        $builder = $this;
        if ($onlyDeleted){
            $builder->onlyDeleted();
        }

        $tableFields = [
            'adverts.*',
            'categories.name As category',
            'adverts_images.image AS image'
        ];

        $builder->select($tableFields);

        if(!$this->user->isSuperAdmin()){
            $builder->where('adverts.user_id',$this->user->id);
        }

        $builder->join('categories','categories.id=adverts.category_id');
        $builder->join('adverts_images','adverts_images.advert_id = adverts.id','LEFT');
        $builder->groupBy('adverts.id');
        $builder->orderBy('adverts.id');
        return $builder->findAll();
    }

    


}
