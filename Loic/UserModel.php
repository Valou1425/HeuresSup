<?php
include 'db.php';

class UserModel {
    public function getAllUsers() {
        global $conn;
        $sql = "SELECT id, firstname, lastname FROM user";
        $result = $conn->query($sql);
        $users = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
        }
        return $users;
    }

    public function addHoursToUser($userId, $hours) {
        global $conn;
        $sql = "INSERT INTO heure_sup (user_id, heures_sup, date) VALUES (?, ?, CURDATE())";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $userId, $hours);
        return $stmt->execute();
    }
}
