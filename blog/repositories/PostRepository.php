<?php


namespace app\blog\repositories;


use app\blog\entities\Post;

class PostRepository
{
    public function findPostById($id): ?Post
    {
        return Post::find()->andWhere(['id' => $id])->one();
    }

    public function findPostByName($name): Post
    {
        return Post::find()->andWhere(['name' => $name])->one();
    }

    public function findPostBySlug($slug): Post
    {
        return Post::find()->andWhere(['slug' => $slug])->one();
    }

    public function save(Post $post)
    {
        if (!$post->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }

    public function remove(Post $post)
    {
        if (!$post->delete()) {
            throw new \RuntimeException('Removing error.');
        }
    }
}