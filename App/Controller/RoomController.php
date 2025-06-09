<?php
class RoomController {
    //id, p or d or o?, name, available and id of taker, floor maybe have another table?
    public function listRoom($requestdata = []){
        $r = new Room();
        $requestdata = array_merge($requestdata, $r->getAll());

        View::render("rooms", $requestdata);
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

    //Need this???
    public function updateRoom($requestdata){
        $r = new Room();
        $r->update($requestdata);

        header('Location: /room?id=' . $requestdata['id']);
        exit();
    }

    public function occupyRoom($requestdata){
        $r = new Room();
        $r->roomTake($requestdata['rid'], $requestdata['pid']);

        header('Location: /rooms');
        exit();
    }

    public function freeRoom($requestdata){
        $r = new Room();
        $r->roomFree($requestdata['rid']);

        header('Location: /rooms');
        exit();
    }

}