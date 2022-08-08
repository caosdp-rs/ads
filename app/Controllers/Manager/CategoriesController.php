<?php

namespace App\Controllers\Manager;

use App\Controllers\BaseController;
use App\Entities\Category;
use App\Requests\CategoryRequest;
use App\Services\CategoryService;
use CodeIgniter\Config\Factories;


class CategoriesController extends BaseController
{
    private $categoryService;

    public function __construct()
    {
        $this->categoryService = Factories::class(CategoryService::class);
        $this->categoryRequest = Factories::class(CategoryRequest::class);
    }
    public function index()
    {
        $data = [
            'title' => 'Categorias!',
        ];
        return view('Manager/Categories/index', $data);
    }
    public function archived()
    {
        $data = [
            'title' => 'Categorias Arquivadas',
        ];
        return view('Manager/Categories/archived', $data);
    }

    public function getAllCategories()
    {
        if (!$this->request->isAjax()) { 
            return redirect()->back();
        }
        return $this->response->setJSON(['data' => $this->categoryService->getAllCategories()]);
    }
    public function getAllArchivedCategories()
    {
        if (!$this->request->isAjax()) { 
            return redirect()->back();
        }
        return $this->response->setJSON(['data' => $this->categoryService->getAllArchivedCategories()]);
    }
    public function getCategoryInfo()
    {
        if (!$this->request->isAjax()) {
            return redirect()->back();
        }
        $category = $this->categoryService->getCategory($this->request->getGetPost('id'));

        $option =[
            'class' =>'form-control',
            'placeholder'=>'Escolha...',
            'selected' => !(empty($category->parent_id)) ? $category->parent_id : "",
        ];
        $response = [
            'category'=>$category,
            'parents' => $this->categoryService->getMultinivel('parent_id',$option,$category->id),
        ];
        return $this->response->setJSON($response);
    }

    public function create()
    {

        $this->categoryRequest->validateBeforeSave('category');

        $category = new Category($this->removeSpoofingFromRequest());
        $this->categoryService->trySaveCategory($category);
        return $this->response->setJSON($this->categoryRequest->responseWithMessage(message: 'Dados salvos com sucesso!'));
        
    }


    public function update()
    {

        $this->categoryRequest->validateBeforeSave('category');

        $category = $this->categoryService->getCategory($this->request->getGetPost('id'));
        $category->fill($this->removeSpoofingFromRequest());
        $this->categoryService->trySaveCategory($category);
        return $this->response->setJSON($this->categoryRequest->responseWithMessage(message: 'Dados salvos com sucesso!'));
        
    }

    public function archive()
    {

        $this->categoryService->tryArchiveCategory($this->request->getGetPost('id'));

        return $this->response->setJSON($this->categoryRequest->responseWithMessage(message: 'Categoria arquivada com sucesso!'));
        
    }

    public function getDropdownParents()
    {
        if (!$this->request->isAjax()) {
            return redirect()->back();
        }
        $option =[
            'class' =>'form-control',
            'placeholder'=>'Escolha...',
            'selected' => "",
        ];
        $response = [
            'parents' => $this->categoryService->getMultinivel('parent_id',$option),
        ];
        
        return $this->response->setJSON($response);

    }
    public function recover()
    {

        $this->categoryService->tryRecoverCategory($this->request->getGetPost('id'));

        return $this->response->setJSON($this->categoryRequest->responseWithMessage(message: 'Categoria recuperada com sucesso!'));
        
    }
    public function delete()
    {

        $this->categoryService->tryDeleteCategory($this->request->getGetPost('id'));

        return $this->response->setJSON($this->categoryRequest->responseWithMessage(message: 'Categoria excluída com sucesso!'));
        
    }

}
