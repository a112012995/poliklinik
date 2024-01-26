<?php
require_once('config/conn.php');

class UserModel
{
    // Create user
    public function createUser($data)
    {
        global $conn;

        $username = $data['username'];
        $password = $data['password'];
        $nama = $data['nama'];

        $sql = "INSERT INTO user (username, password, nama, alamat, no_telp, role) VALUES ('$username', '$password', '$nama')";

        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // Read users
    public function readUsers()
    {
        global $conn;

        $sql = "SELECT * FROM user";

        $result = $conn->query($sql);

        $rows = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }

            return $rows;
        } else {
            return false;
        }
    }

    // Read user by id
    public function readUserById($id)
    {
        global $conn;

        $sql = "SELECT * FROM user WHERE id = $id";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    // Update user
    public function updateUser($data)
    {
        global $conn;

        $id = $data['id'];
        $username = $data['username'];
        $password = $data['password'];
        $nama = $data['nama'];

        $sql = "UPDATE user SET username = '$username', password = '$password', nama = '$nama' WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // Delete user
    public function deleteUser($id)
    {
        global $conn;

        $sql = "DELETE FROM user WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // isAdmin == true if nama == 'admin'
    public function isAdmin($nama)
    {
        if ($nama == 'admin') {
            return true;
        } else {
            return false;
        }
    }
}
