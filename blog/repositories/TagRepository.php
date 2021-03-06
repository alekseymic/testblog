<?php


namespace app\blog\repositories;


use app\blog\entities\Tag;

class TagRepository
{
    public function findTagById($id): Tag
    {
        return Tag::find()->andWhere(['id' => $id])->one();
    }

    public function findTagByName($name): ?Tag
    {
        return Tag::findOne(['name' => $name]);
    }

    public function findTagBySlug($slug): Tag
    {
        return Tag::find()->andWhere(['slug' => $slug])->one();
    }

    public function isExistByName($name)
    {
        return Tag::find()->where(['name'=>$name])->exists();
    }

    public function save(Tag $tag)
    {
        if (!$tag->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }

    public function remove(Tag $tag)
    {
        if (!$tag->delete()) {
            throw new \RuntimeException('Removing error.');
        }
    }
}