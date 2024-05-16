<?php
include 'UserModel.php';

class UserController {
    private $model;

    public function __construct() {
        $this->model = new UserModel();
    }

    public function listUsers() {
        return $this->model->getAllUsers();
    }

    public function addHours($userId, $hours) {
        // Ajouter les heures supplémentaires dans la base de données
        return $this->model->addHoursToUser($userId, $hours);
    }
}
