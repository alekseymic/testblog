<?php


namespace app\blog\services;


use app\blog\entities\Post;
use app\blog\forms\PostForm;
use app\blog\repositories\PostRepository;

class PostManageService
{
    private $repository;
    public function __construct(PostRepository $repository)
    {
        $this->repository=$repository;
    }

    public function create(PostForm $form)
    {
        $post=Post::create($form->title, $form->content, $form->status, $form->category_id);
        $this->repository->save($post);

    }

    public function edit($id, PostForm $form)
    {
        $post=$this->repository->findPostById($id);
        $post->edit($form->title, $form->content, $form->status, $form->category_id);
        $this->repository->save($post);
    }

    public function delete($id)
    {
        $post=$this->repository->findPostById($id);
        $post->changeStatus(Post::STATUS_DELETED);
        $this->repository->save($post);
    }


}