<?php

class AuthController extends Controller
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('User');
        session_start();
    }

    public function index()
    {
        $this->view('auth/login');
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->userModel->getUserByEmail($email);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['role'] = $user['role'];
                header('Location: /Dashboard/index');
            } else {
                $error = "Invalid credentials!";
                $this->view('auth/login', ['error' => $error]);
            }
        }
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $this->userModel->createUser($name, $email, $password);
            header('Location: /Auth/index');
        } else {
            $this->view('auth/register');
        }
    }

    public function logout()
    {
        session_destroy();
        header('Location: /Auth/index');
    }
}
