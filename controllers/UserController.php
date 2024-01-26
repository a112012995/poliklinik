<?php
require_once('models/UserModel.php');

class UserController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    // Get all users
    public function getUsers()
    {
        $users = $this->userModel->readUsers();
        include('views/users.php');
    }

    // Get user by id
    public function getUserById($id)
    {
        $user = $this->userModel->readUserById($id);
        include('views/user.php');
    }

    // Add user
    public function addUser($data)
    {
        $this->userModel->createUser($data);
        // Redirect or perform any other actions after adding user
    }

    // Update user
    public function updateUser($id, $data)
    {
        $this->userModel->updateUser($id, $data);
        // Redirect or perform any other actions after updating user
    }

    // Delete user
    public function deleteUser($id)
    {
        $this->userModel->deleteUser($id);
        // Redirect or perform any other actions after deleting user
    }
}
