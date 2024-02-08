<?php

/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class AuthController extends AbstractController
{
    public function login(): void
    {
        $this->render("login", []);
    }

    public function checkLogin(): void
    {
        $newUserManager = new UserManager();
        $newTokenManager = new CSRFTokenManager();

        if ($newTokenManager->validateCSRFToken($_SESSION['csrf_token'])) {
            // Validation du mot de passe

            if (isset($_POST['email'], $_POST['password'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];

                $user = $newUserManager->findByEmail($email);

                if ($user && $_SESSION['connecter'] === 'oui' && password_verify($password, $user->getPassword())) {
                    $this->redirect("index.php");
                } else {
                    $this->redirect("index.php?route=login");
                }
            }
        }

        // Gérer les autres cas, par exemple, rediriger vers une page d'erreur
    }

    public function register(): void
    {
        $this->render("register", []);
    }

    public function checkRegister(): void
    {
        $newUserManager = new UserManager();
        $newTokenManager = new CSRFTokenManager();
        $passwordRegex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()-_+=])[A-Za-z\d!@#$%^&*()-_+=]{8,}$/';

        if ($newTokenManager->validateCSRFToken($_SESSION['csrf_token'])) {
            if (isset($_POST['username'], $_POST['email'], $_POST['password'], $_POST['confirm-password']) && preg_match($passwordRegex, $_POST['password'])) {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $confirmPassword = $_POST['confirm-password'];



                if ($confirmPassword === $_POST['password']) {
                    $_SESSION['connecter'] = 'oui';

                    // Créer l'utilisateur
                    $newUser = new User($username, $email, $password, date("Y-m-d H:i:s"));
                    $newUserManager->create($newUser);

                    $this->redirect("index.php");
                } else {
                    $this->redirect("index.php?route=register");
                    $_SESSION['confirm'] = 'Les mots de passe ne correspondent pas';
                }
            } else {
                $this->redirect("index.php?route=register");
                $_SESSION['reg'] = 'Les mots de passe doivent faire 8 caractères au minimum, avec au moins une majuscule, une minuscule, un chiffre et un caractère spécial.';
            }
        }

        // Gérer les autres cas, par exemple, rediriger vers une page d'erreur
    }

    public function logout(): void
    {
        session_destroy();

        $this->redirect("index.php");
    }
}
