<?php


namespace app\blog\repositories;


use app\blog\entities\Category;

class CategoryRepository
{
  public function findCategoryById($id): Category
    {
        return Category::find()->andWhere(['id' => $id])->one();
    }

    public function findCategoryByName($name): Category
    {
        return Category::find()->andWhere(['name' => $name])->one();
    }

    public function findCategoryBySlug($slug): Category
    {
        return Category::find()->andWhere(['slug' => $slug])->one();
    }

    public function save(Category $category)
    {
        if (!$category->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }

    public function remove(Category $category)
    {
        if (!$category->delete()) {
            throw new \RuntimeException('Removing error.');
        }
    }
}