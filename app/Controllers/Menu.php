<?php namespace App\Controllers;

class Menu extends BaseController
{
    public function index()
    {
        return view('estructura/header').view('estructura/body').view('menufolder/menu').view('estructura/footer');
    }



    //--------------------------------------------------------------------

}