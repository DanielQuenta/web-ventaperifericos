<?php
class Welcome {
    public $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Método para obtener todos los mensajes de bienvenida
    public function getAllMessages() {
        $stmt = $this->db->prepare("SELECT * FROM welcome_messages");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC); // Devuelve un array asociativo
    }

    // Método para obtener un mensaje por su ID
    public function getMessageById($id) {
        $stmt = $this->db->prepare("SELECT * FROM welcome_messages WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Método para crear un nuevo mensaje
    public function createMessage($title, $message, $author, $date) {
        $stmt = $this->db->prepare("INSERT INTO welcome_messages (title, message, author, date) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $title, $message, $author, $date);
        return $stmt->execute();
    }

    // Método para actualizar un mensaje existente
    public function updateMessage($id, $title, $message, $author, $date) {
        $stmt = $this->db->prepare("UPDATE welcome_messages SET title = ?, message = ?, author = ?, date = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $title, $message, $author, $date, $id);
        return $stmt->execute();
    }

    // Método para eliminar un mensaje
    public function deleteMessage($id) {
        $stmt = $this->db->prepare("DELETE FROM welcome_messages WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}

