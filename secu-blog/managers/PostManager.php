<?php

/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class PostManager extends AbstractManager
{
    public function __construct()
    {
        parent::__construct();
    }

    public function findLatest(): array
    {
        $selectLastestQuery = $this->db->prepare('SELECT posts.*, users.username, users.email, users.password, users.role, users.created_at AS user_created_at FROM posts JOIN users ON users.id = posts.author ORDER BY posts.created_at DESC LIMIT 4');
        $selectLastestQuery->execute();
        $posts = $selectLastestQuery->fetchAll(PDO::FETCH_ASSOC);

        $posts_array = [];

        foreach ($posts as $key => $post) {
            $newUserManager = new UserManager();
            $newUser = new User($post['username'], $post['email'], $post['password'], $post['role'], $post['user_created_at']);
            $newPost = new Post($post['title'], $post['excerpt'], $post['content'], $newUser, $post['created_at']);
            $newPost->settId($post['id']);
            $newUser->settId($post['id']);

            $posts_array[] = $newPost;
        }

        return $posts_array;
    }

    public function findOne(int $id): object
    {
        $selectOneQuery = $this->db->prepare('SELECT posts.*, users.username, users.email, users.password, users.role, users.created_at AS user_created_at FROM posts JOIN users ON users.id = posts.author WHERE posts.id = :id');
        $parameters = [
            'id' => $id
        ];
        $selectOneQuery->execute($parameters);
        $post = $selectOneQuery->fetch(PDO::FETCH_ASSOC);

        if (isset($post)) {
            $newUserManager = new UserManager();
            $newUser = new User($post['username'], $post['email'], $post['password'], $post['role'], $post['user_created_at']);
            $newPost = new Post($post['title'], $post['excerpt'], $post['content'], $newUser, $post['created_at']);
            $newPost->settId($post['id']);
            $newUser->settId($post['id']);
            return $newPost;
        } else {
            return null;
        }
    }

    public function findByCategory(int $categoryId): array
    {
        $selectByIdQuery = $this->db->prepare('SELECT posts.*, categories.description, categories.title AS category_title, users.id AS users_id, users.username, users.email, users.password, users.role, users.created_at AS user_created_at FROM posts 
        JOIN posts_categories ON posts.id = posts_categories.post_id 
        JOIN users ON users.id = posts.author 
        JOIN categories ON categories.id =  posts_categories.category_id
        WHERE posts_categories.category_id = :id');
        $parameters = [
            'id' => $categoryId
        ];
        $selectByIdQuery->execute($parameters);

        $posts = $selectByIdQuery->fetchAll(PDO::FETCH_ASSOC);


        $newCategoryManager = new CategoryManager();

        $posts_array = [];

        foreach ($posts as $key => $post) {
            $newUser = new User($post['username'], $post['email'], $post['password'], $post['role'], $post['user_created_at']);
            $newPost = new Post($post['title'], $post['excerpt'], $post['content'], $newUser, $post['created_at']);
            $newPost->settId($post['id']);
            $newUser->settId($post['users_id']);

            $newPost->setCategory($newCategoryManager->findByPost($newPost));
            $posts_array[] = $newPost;
        }

        return $posts_array;
    }
}
