<?php

class Room extends Model
{
    public function getAllRooms()
    {
        $stmt = $this->db->query("SELECT * FROM rooms");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRoomById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM rooms WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addRoom($number, $type, $price)
    {
        $stmt = $this->db->prepare("INSERT INTO rooms (number, type, price) VALUES (?, ?, ?)");
        return $stmt->execute([$number, $type, $price]);
    }

    public function updateRoom($id, $number, $type, $price)
    {
        $stmt = $this->db->prepare("UPDATE rooms SET number = ?, type = ?, price = ? WHERE id = ?");
        return $stmt->execute([$number, $type, $price, $id]);
    }

    public function deleteRoom($id)
    {
        $stmt = $this->db->prepare("DELETE FROM rooms WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
