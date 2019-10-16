<?php


namespace app\blog\services;


use app\blog\entities\Category;
use app\blog\entities\Tag;
use app\blog\forms\TagForm;
use app\blog\repositories\CategoryRepository;
use app\blog\repositories\TagRepository;

class CategoryService
{
    private $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository=$repository;
    }

    public function create(CategoryForm $form)
    {
        $category=Category::create($form->name, $form->description, $form->slug);
        $this->repository->save($category);
    }

    public function edit($id, CategoryForm $form)
    {
        $category=$this->repository->findCategoryById($id);
        $category->edit($form->name, $form->description, $form->slug);
        $this->repository->save($category);
    }

    public function delete($id)
    {
        $this->repository->remove($id);
    }
}