<?php

class Booking extends Model
{
    public function bookRoom($userId, $roomId, $date)
    {
        $stmt = $this->db->prepare("INSERT INTO bookings (user_id, room_id, booking_date) VALUES (?, ?, ?)");
        return $stmt->execute([$userId, $roomId, $date]);
    }

    public function getUserBookings($userId)
    {
        $stmt = $this->db->prepare("SELECT b.*, r.number, r.type FROM bookings b JOIN rooms r ON b.room_id = r.id WHERE b.user_id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
