<?php

/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class CategoryManager extends AbstractManager
{
    private string $lang = 'fr';

    public function __construct()
    {

        $this->lang = $_SESSION["lang"];

        parent::__construct();
    }

    public function findAll(): array
    {
        $selectAllQuery = $this->db->prepare('SELECT * FROM categories');
        $selectAllQuery->execute();
        $categories = $selectAllQuery->fetchAll(PDO::FETCH_ASSOC);

        $categories_array = [];

        foreach ($categories as $key => $category) {
            $newCategoryModel = new Category($category["title_" . $this->lang], $category["description_" . $this->lang]);
            $newCategoryModel->settId($category['id']);
            $categories_array[] = $newCategoryModel;
        }

        return $categories_array;
    }

    public function findOne(int $id): object
    {
        $selectOneQuery = $this->db->prepare('SELECT * FROM categories WHERE id =:id');
        $parameters = [
            'id' => $id
        ];
        $selectOneQuery->execute($parameters);
        $category = $selectOneQuery->fetch(PDO::FETCH_ASSOC);

        if ($category) {
            $newCategoryModel = new Category($category["title_" . $this->lang], $category["description_" . $this->lang]);
            $newCategoryModel->settId($category['id']);
            return $newCategoryModel;
        } else {
            return null;
        }
    }

    public function findByPost(Post $post): array
    {
        $selectByPostQuery = $this->db->prepare('SELECT * FROM categories JOIN posts_categories ON categories.id = posts_categories.category_id WHERE posts_categories.post_id  = :id');
        $parameters = [
            'id' => $post->getId()
        ];
        $selectByPostQuery->execute($parameters);
        $categories = $selectByPostQuery->fetchAll(PDO::FETCH_ASSOC);

        $categories_array = [];

        foreach ($categories as $key => $category) {
            $newCategoryModel = new Category($category["title_" . $this->lang], $category["description_" . $this->lang]);
            $newCategoryModel->settId($category['id']);
            $categories_array[] = $newCategoryModel;
        }

        return $categories_array;
    }
}
