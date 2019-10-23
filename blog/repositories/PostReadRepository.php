<?php


namespace app\blog\repositories;


use app\blog\entities\Post;

class PostReadRepository
{

    public function findPostById($id)
    {
        return $this->preparePostData(Post::find()->andWhere(['id'=>$id])->with('tags', 'user', 'category', 'attachments')->one());
    }

    public function preparePostData(Post $post)
    {
        $data=$post->getAttributes(['title', 'content', 'created_at']);
        $data['username']=$post['user']->getAttribute('username');
        $data['category']=$post['category']->getAttribute('name');

        foreach ($post['tags'] as $tag) {
            $data['tags'][]=$tag->getAttributes(['name', 'slug']);
        }

        foreach ($post['attachments'] as $attachment) {
            $data['attachments'][]=$attachment->getAttributes(['name', 'path']);
        }

        return $data;
    }




}