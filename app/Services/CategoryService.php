<?php

namespace App\Services;

use CodeIgniter\Config\Factories;

class CategoryService
{
    private $categoryModel;
    public function __construct()
    {
        $this->categoryModel = Factories::models(CategoryModel::class);
    }

    public function getAllCategories(): array
    {
        $categories = $this->categoryModel->asObject()->orderBy('id', 'DESC')->findAll();
        $data = [];

        foreach ($categories as $category) {
            $data[] = [
                'id' => $category->id,
                'name' => $category->name,
                'slug' => $category->slug,
                'actions' => '<button type="button" class="btn btn-primary">Ações</button>',
            ];
        }
        return $data;
    }
}
