<?php

/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class UserManager extends AbstractManager
{
    public function findByEmail(string $email): ?object
    {
        $selectByEmail = $this->db->prepare('SELECT * FROM users WHERE email = :email');
        $parameters = [
            'email' => $email,
        ];
        $selectByEmail->execute($parameters);
        $user = $selectByEmail->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $newUser = new User($user['username'], $user['email'], $user['password'],  $user['created_at']);
            $newUser->settId($user['id']);
            $_SESSION['connecter'] = 'oui';
            return $newUser;
        } else {
            return null;
        }
    }

    public function create(User $user): void
    {
        $createQuery = $this->db->prepare('INSERT INTO users (username, email, password, created_at) VALUES (:username, :email, :password, :created_at)');
        $parameters = [
            'username' => $user->getusername(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'created_at' => date('Y-m-d H:i:s')
        ];
        $createQuery->execute($parameters);

        $user->settId($this->db->lastInsertId());
    }
}
