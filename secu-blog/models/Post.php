<?php

/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class Post
{
    private ?int $id = null;
    private string $title;
    private string $excerpt;
    private string $content;
    private User $user;
    private array $category = [];
    private string $created_at;

    public function __construct(string $title, string $excerpt, string $content, User $user)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->content = $content;
        $this->user = $user;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function settId(?int $id): void
    {
        $this->id = $id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getExcerpt(): string
    {
        return $this->excerpt;
    }
    public function setExcerpt(string $excerpt): void
    {
        $this->excerpt = $excerpt;
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

    public function getCategory(): array
    {
        return $this->category;
    }
    public function setCategory(array $category): void
    {
        $this->category = $category;
    }

    public function getCreatedAt(): string
    {
        return $this->created_at;
    }
    public function setCreatedAt(string $created_at): void
    {
        $this->created_at = $created_at;
    }
}
