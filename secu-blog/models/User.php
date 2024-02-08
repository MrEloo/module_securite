<?php

/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class User
{
    private ?int $id = null;
    private string $username;
    private string $email;
    private string $password;
    private string $role;
    private string $created_at;

    public function __construct(string $username, string $email, string $password, string $created_at)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->created_at = $created_at;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function settId(?int $id): void
    {
        $this->id = $id;
    }

    public function getusername(): string
    {
        return $this->username;
    }
    public function setusername(string $username): void
    {
        $this->username = $username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
    public function setPost(string $password): void
    {
        $this->password = $password;
    }

    public function getRole(): string
    {
        return $this->role;
    }
    public function setRole(string $role): void
    {
        $this->role = $role;
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
