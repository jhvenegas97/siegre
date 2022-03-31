<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    public function getListaPublicaciones(){
        $publicaciones = Publication::all();
        return view('client.feed')->with(array('publicaciones'=>$publicaciones));
    }
}
