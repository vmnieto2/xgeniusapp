<?php namespace App\Controllers;
use App\Models\UsuariosModel;
session_start();
class Home extends BaseController
{


    public function index()
	{
	    if($_SESSION['usuario_nombre']){
            $data['title'] = 'Menú principal';
            echo view('estructura/header',$data);
            echo view('menufolder/menu');
            echo view('estructura/footer');
        }else{
            return view('loginfolder/login');
        }


	}


}
