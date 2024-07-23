<?php

namespace src;
use DB;
class User {
    private $pdo;

    public function __construct()
    {
        $this->pdo  = DB::connect();
    }
    public function  setStatus(int $chatId, $status='add') {
        $query  = "INSERT INTO users (chat_id, status, created_at)
                  VALUES (:chat_id, :status, NOW())
                  ON DUPLICATE KEY UPDATE status = :status, created_at = NOW()";
        $stmt   = $this->pdo->prepare($query);
        $stmt->bindParam(':chat_id', $chatId);
        $stmt->bindParam(':status', $status);
        $stmt->execute();
    }

    public function getUserInfo (int $chatId) {
        $stmt = $this->pdo->prepare("SELECT * FROM users where chat_id = :chat_id LIMIT 1");
        $stmt->execute(['chat_id' => $chatId]);
        return $stmt->fetchObject();
    }
}