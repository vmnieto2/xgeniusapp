<?php namespace App\Controllers;
use App\Models\UsuariosModel;
session_start();
class Main extends BaseController
{

    //Acá cargamos todas las tablas de la base de datos con las que vamos a interactuar.
    function __construct()
    {
        $db      = \Config\Database::connect();
        $this->builderEmpleados = $db->table('empleados');
        $this->builderEstadoCivil = $db->table('estado_civil');
        $this->builderCargos = $db->table('cargos');
        $this->builderArl = $db->table('arl');
        $this->builderEps = $db->table('eps');
        $this->builderDptos = $db->table('departamentos');
        $this->builderCiudades = $db->table('ciudades');
        $this->builderFincas = $db->table('fincas');
        $this->builderConductores = $db->table('conductores');
        $this->builderCamiones = $db->table('camiones');
    }

    //Esta función se trae de la BD todos los nombres de la tabla fincas
    public function getFinca(){
        $finca = $this->builderFincas->get();
        echo json_encode($finca->getResultArray());
    }

    //Esta función valida que no pongan una finca diferente al de la BD
    public function validarFinca(){
        $finca = $this->request->getVar('fincas');
        //$this->builderFincas->select('finca_id');
        $this->builderFincas->where('finca_nombre',$finca);
        $result = $this->builderFincas->get()->getResult();
        echo json_encode($result);
    }

    //Esta función valida que no pongan una finca diferente al de la BD
    public function validarFincaTbl(){
        $finca = $this->request->getVar('fincasTbl');
        $this->builderFincas->where('finca_nombre',$finca);
        $result = $this->builderFincas->get()->getResult()[0];
        if ($result == null){
            echo 0;
        }else{
            echo json_encode($result);
        }
    }

    public function getNombreFinca(){
        $idF = $this->request->getVar('idf');
        $this->builderFincas->where('finca_id',$idF);
        $result = $this->builderFincas->get()->getResult()[0];
        if ($result == null){
            echo 0;
        }else{
            echo json_encode($result);
        }
    }


}