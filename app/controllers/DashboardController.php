<?php

class DashboardController extends Controller
{
    public function __construct()
    {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header('Location: /Auth/index');
            exit;
        }
    }

    public function index()
    {
        $roomModel = $this->model('Room');
        $rooms = $roomModel->getAllRooms();
        $this->view('dashboard/index', ['rooms' => $rooms]);
    }
}
