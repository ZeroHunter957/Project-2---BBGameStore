<?php

namespace App\Http\Controllers;

use App\Models\Accessory;
use App\Models\AccessoryCategory;
use App\Models\Game;
use App\Models\GameCategory;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function dashboard(){
        $games = Game::all();
        $gamecates = GameCategory::all();
        $accessories = Accessory::all();
        $accessorycates = AccessoryCategory::all();
        return view("menu.dashboard", compact("games", "accessories"));
    }

    public function menu(){
        $games = Game::all();
        $gamecates = GameCategory::all();
        $accessories = Accessory::all();
        $accessorycates = AccessoryCategory::all();
        return view("menu.index", compact("games", "accessories"));
    }

    public function contact(){
        $games = Game::all();
        $gamecates = GameCategory::all();
        $accessories = Accessory::all();
        $accessorycates = AccessoryCategory::all();
        return view("menu.contact",compact("games"));
    }

    public function gameshop(){
        $games = Game::all();
        $gamecates = GameCategory::all();
        return view("menu.gameshop",compact("games", "gamecates"));
    }

    public function accessoryshop(){
        $accessories = Accessory::all();
        $accessorycates = AccessoryCategory::all();
        return view("menu.accessoryshop",compact("accessories", "accessorycates"));
    }

    public function gamedetails($id) {
        $game = Game::findOrFail($id); // Find the game by ID or return 404
        return view("menu.gamedetails", compact("game"));
    }

    public function accessorydetails($id){
        $accessory = Accessory::findOrFail($id); // Find the game by ID or return 404
        return view("menu.accessorydetails", compact("accessory"));
    }
}