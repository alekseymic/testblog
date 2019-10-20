<?php


namespace app\blog\services;


use app\blog\repositories\PostRepository;

class PostViewService
{
    private $repository;
    public function __construct(PostRepository $repository)
    {
        $this->repository=$repository;
    }

    public function load($id)
    {
        $post=$this->repository->findPostById($id);
        $data=$post->getAttributes(['title', 'content', 'created_at']);
        foreach ($post->getTags()->all() as $tag) {
            $data['tags'][]=$tag->getAttributes(['name', 'slug']);
        }
        $data['username']=$post->getUser()->one()->getAttribute('username');
        $data['category']=$post->getCategory()->select(['name'])->one()->getAttribute('name');
        foreach ($post->getAttachments()->all() as $attachment) {
            $data['attachments'][]=$attachment->getAttributes(['name', 'path']);
        }
        return $data;
    }
}