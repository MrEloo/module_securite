<?php

/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class Comment
{
    private ?int $id = null;
    private string $content;
    private User $user;
    private Post $post;

    public function __construct(string $content, User $user, Post $post)
    {
        $this->content = $content;
        $this->user = $user;
        $this->post = $post;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function settId(?int $id): void
    {
        $this->id = $id;
    }

    public function getContent(): string
    {
        return $this->content;
    }
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getUser(): User
    {
        return $this->user;
    }
    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    public function getPost(): Post
    {
        return $this->post;
    }
    public function setPost(Post $post): void
    {
        $this->post = $post;
    }
}
