<?php

namespace App\Controllers\Manager;

use App\Controllers\BaseController;
use CodeIgniter\Config\Factories;

class CategoriesController extends BaseController
{
    private $categoryService;

    public function __construct()
    {
        $this->categoryService = Factories::class(CategoryService::class);
    }
    public function index()
    {
        $data = [
            'title' => 'Categorias!',
        ];
        return view('Manager/Categories/index', $data);
    }

    public function getAllCategories()
    {
        if (!$this->request->isAjax()) {
            return redirect()->back();
        }
        return $this->response->setJSON(['data' => $this->categoryService->getAllCategories()]);
    }
}
