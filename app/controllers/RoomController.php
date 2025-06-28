<?php

class RoomController extends Controller
{
    public function __construct()
    {
        session_start();
        if ($_SESSION['role'] !== 'admin') {
            header('Location: /Dashboard/index');
            exit;
        }
    }

    public function index()
    {
        $roomModel = $this->model('Room');
        $rooms = $roomModel->getAllRooms();
        $this->view('dashboard/rooms', ['rooms' => $rooms]);
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $roomModel = $this->model('Room');
            $roomModel->addRoom($_POST['number'], $_POST['type'], $_POST['price']);
            header('Location: /Room/index');
        } else {
            $this->view('dashboard/add_room');
        }
    }

    public function edit($id)
    {
        $roomModel = $this->model('Room');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $roomModel->updateRoom($id, $_POST['number'], $_POST['type'], $_POST['price']);
            header('Location: /Room/index');
        } else {
            $room = $roomModel->getRoomById($id);
            $this->view('dashboard/edit_room', ['room' => $room]);
        }
    }

    public function delete($id)
    {
        $roomModel = $this->model('Room');
        $roomModel->deleteRoom($id);
        header('Location: /Room/index');
    }
}
