<?php


namespace app\blog\services;


use app\blog\entities\Tag;
use app\blog\forms\TagForm;
use app\blog\repositories\TagRepository;
use app\blog\repositories\UserRepository;

class TagService
{
    private $repository;

    public function __construct(TagRepository $repository)
    {
        $this->repository=$repository;
    }

    public function create(TagForm $form)
    {
        $tag=Tag::create($form->name, $form->slug);
        $this->repository->save($tag);
    }

    public function edit($id, TagForm $form)
    {
        $tag=$this->repository->findTagById($id);
        $tag->edit($form->name, $form->slug);
        $this->repository->save($tag);
    }

    public function delete($id)
    {
        $this->repository->remove($id);
    }
}