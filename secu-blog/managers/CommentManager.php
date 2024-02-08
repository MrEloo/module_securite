<?php

/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class CommentManager extends AbstractManager
{

    public function __construct()
    {
        $lang = $_SESSION["lang"];
        parent::__construct();
    }

    public function findByPost(int $postId): array
    {
        $selectByPostQuery = $this->db->prepare('SELECT * FROM comments WHERE comments.post_id = :id');
        $parameters = [
            'id' => $postId
        ];
        $selectByPostQuery->execute($parameters);
        $comments = $selectByPostQuery->fetchAll(PDO::FETCH_ASSOC);
        return $comments;
    }

    public function create(Comment $comment)
    {
        $createQuery = $this->db->prepare('INSERT INTO comments (content, user_id, post_id) VALUES (:content, :user_id, :post_id)');
        $parameters = [
            'content' => $comment->getContent(),
            'user_id' => $comment->getUser()->getId(),
            'post_id' => $comment->getPost()->getId()
        ];
        $createQuery->execute($parameters);

        $comment->settId($this->db->lastInsertId());
    }
}
