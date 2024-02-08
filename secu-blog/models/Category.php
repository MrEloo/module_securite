<?php

/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class Category
{
    private ?int $id = null;
    private string $title;
    private string $description;

    public function __construct(string $title, string $description)
    {
        $this->title = $title;
        $this->description = $description;
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

    public function getDescription(): string
    {
        return $this->description;
    }
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
}
