<?php

/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */

/* MODELS */
require "../models/Category.php";
require "../models/User.php";
require "../models/Post.php";
require "../models/Comment.php";

/* MANAGERS */
require "../managers/AbstractManager.php";
require "../managers/CategoryManager.php";
require "../managers/UserManager.php";
require "../managers/PostManager.php";
require "../managers/CommentManager.php";

/* CONTROLLERS */
require "../controllers/AbstractController.php";
require "../controllers/AuthController.php";
require "../controllers/BlogController.php";

/* SERVICES */
require "../services/CSRFTokenManager.php";
require "../services/Router.php";


// $newManager = new CategoryManager();
// $categories = $newManager->findAll();
// echo "<pre>";
// var_dump($categories);
// echo "</pre>";


// $newPostManager = new PostManager();
// $posts = $newPostManager->findLatest();
// foreach ($posts as $key => $post) {
//     var_dump($post->getTitle());
// }

// $newPostManager = new PostManager();
// $posts = $newPostManager->findOne(1);
// echo "<pre>";
// var_dump($posts);
// echo "</pre>";

// $newPostManager = new PostManager();
// $posts = $newPostManager->findByCategory(2);
// echo "<pre>";
// var_dump($posts);
// echo "</pre>";

// $newPostManager = new CommentManager();
// $posts = $newPostManager->findByPost(5);
// echo "<pre>";
// var_dump($posts);
// echo "</pre>";

// $newPostManager = new PostManager();
// $newUserManager = new UserManager();
// $newPostController = new CommentManager();

// $post = $newPostManager->findOne(1);
// $user = $newUserManager->findByEmail('admin@test.fr');
// $comment = new Comment('I think thats good now', $user, $post);


// $newPostController->create($comment);

// $newUser = new User('eloan', 'eloan@gmail.com', 'monmotdepasse', 'ADMIN', date('Y-m-d H:i:s'));

// $newUserManager = new UserManager();

// $newUserManager->create($newUser);

// echo "<pre>";
// var_dump($post->getId());
// echo "</pre>";

// echo "<pre>";
// var_dump($user->getId());
// echo "</pre>";

// echo "<pre>";
// var_dump($comment->getUser());
// echo "</pre>";



// $newPostManager = new PostManager();
// $post_array = $newPostManager->findByCategory(3);
// foreach ($post_array as $key => $post) {
//     var_dump($post->getId());
// }
