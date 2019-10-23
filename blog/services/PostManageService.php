<?php


namespace app\blog\services;


use app\blog\entities\Category;
use app\blog\entities\Post;
use app\blog\entities\Tag;
use app\blog\forms\PostForm;
use app\blog\repositories\AttachmentRepository;
use app\blog\repositories\CategoryRepository;
use app\blog\repositories\PostRepository;
use app\blog\repositories\TagRepository;

class PostManageService
{
    private $postsRepo;
    private $tagsRepo;
    private $catsRepo;
    private $attachmentsRepo;

    public function __construct(PostRepository $postsRepo, TagRepository $tagsRepo, CategoryRepository $catsRepo, AttachmentRepository $attachmentsRepo)
    {
        $this->postsRepo=$postsRepo;
        $this->tagsRepo=$tagsRepo;
        $this->catsRepo=$catsRepo;
        $this->attachmentsRepo=$attachmentsRepo;
    }

    public function create(PostForm $form)
    {
        $post=Post::create($form->title, $form->content, $form->status, $form->category_name);
        foreach ($form->tags as $tagName) {
            if (!$this->tagsRepo->isExistByName($tagName)) {
                $tag = Tag::create($tagName);
                $this->tagsRepo->save($tag);
            } else {
                $tag = $this->tagsRepo->findTagByName($tagName);
            }
            $post->assignTag($tag);
        }
        foreach ($form->uploadFiles() as $file=>$path) {
            $post->addAttachment($file,$path);
        }
        $this->postsRepo->save($post);
    }



    public function edit($id, PostForm $form)
    {
        $post=$this->postsRepo->findPostById($id);
        $post->edit($form->title, $form->content, $form->status, $form->category_id);
        $this->postsRepo->save($post);
    }

    public function delete($id)
    {
        $post=$this->postsRepo->findPostById($id);
        $post->changeStatus(Post::STATUS_DELETED);
        $this->postsRepo->save($post);
    }


}