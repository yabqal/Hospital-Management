<?php
class RoomController extends Controller{
    //id, taken, pid
    public function listRoom($requestdata = []){
        $r = new Room();
        $requestdata = array_merge($requestdata, $r->getAll());

        View::render("list-room", $requestdata);
    }

    public function delRoom($requestdata = []){
        $r = new Room();
        $r->delete($requestdata['id']);

        header('Locatiion: /rooms');
        exit();
    }

    public function showRoomReg($requestdata = []){
        View::render('register-room');
    }

    public function recRoom($requestdata = []){
        $r = new Room();
        $r->insert($requestdata);
        
        header('Location: /rooms');
        exit();
    }

    public function updateRoom($requestdata){
        $r = new Room();
        $r->update($requestdata);

        header('Location: /room?id=' . $requestdata['id']);
        exit();
    }

    public function showRoomUpdate($requestdata = []){

        View::render("room-update");
    }

    public function detailRoom($requestdata) {
        $r = new Room();
        $requestdata = $r->searchByID($requestdata['id']);

        View::render('room-detail', $requestdata);
    }

}