<?php
class RoomController {
    
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

}