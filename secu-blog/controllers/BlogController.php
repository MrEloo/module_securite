<?php

/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class BlogController extends AbstractController
{
    public function home(): void
    {
        $newPostManager = new PostManager();
        $newCategoryManager = new CategoryManager();
        $posts = $newPostManager->findLatest();
        $posts_array = [];
        foreach ($posts as $key => $post) {
            $categories_array = $newCategoryManager->findByPost($post);
            $post->setCategory($categories_array);
            $posts_array[] = $post;
        }

        $this->render("home", ['items' => $posts_array]);
    }

    public function category(string $categoryId): void
    {

        $newPostManager = new PostManager();
        $post_array = $newPostManager->findByCategory($categoryId);
        if ($post_array) {
            // si la catégorie existe
            $this->render("category", ['post' => $post_array]);
        } else {
            // sinon
            $this->redirect("index.php");
        }
    }

    public function post(string $postId): void
    {
        // si le post existe
        $newPostManager = new PostManager();
        $posts = $newPostManager->findOne($postId);
        if ($posts) {
            $this->render("post", ['post' => $posts]);
        } else {
            // sinon
            $this->redirect("index.php");
        }
    }

    public function checkComment(): void
    {
        $this->redirect("index.php?route=post&post_id={$_POST["post_id"]}");
    }
}
