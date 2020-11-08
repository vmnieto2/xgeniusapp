<?php namespace App\Controllers;

session_start();
use CodeIgniter\Controller;
use App\Models\UsuariosModel;

class Login extends Controller
{

    function __construct()
    {
        $db      = \Config\Database::connect();
        $this->builder = $db->table('usuarios');
    }



    public function create()
    {
        return view('create-user');
    }

    public function store()
    {

        helper(['form', 'url']);

        $model = new UserModel();

        $data = [

            'name' => $this->request->getVar('name'),
            'email'  => $this->request->getVar('email'),
        ];

        $save = $model->insert($data);

        return redirect()->to( base_url('public/index.php/users') );
    }

    public function edit($id = null)
    {

        $model = new UserModel();

        $data['user'] = $model->where('id', $id)->first();

        return view('public/index.php/edit-user', $data);
    }

    public function update()
    {

        helper(['form', 'url']);

        $model = new UserModel();

        $id = $this->request->getVar('id');

        $data = [

            'name' => $this->request->getVar('name'),
            'email'  => $this->request->getVar('email'),
        ];

        $save = $model->update($id,$data);

        return redirect()->to( base_url('public/index.php/users') );
    }

    public function delete($id = null)
    {

        $model = new UserModel();

        $data['user'] = $model->where('id', $id)->delete();

        return redirect()->to( base_url('public/index.php/users') );
    }

    //Funciones JhonBarc

    public function index()
    {
        $model = new UserModel();
        if($_SESSION['usuario_id']){
            $data['title'] = 'Menú principal';
            echo view('estructura/header',$data);
            echo view('menufolder/menu');
            echo view('estructura/footer');
        }
        else{
            return view('loginfolder/login');
        }
    }
    public function Ingresar(){
        $user = $this->request->getVar('user');
        $pass = $this->request->getVar('pass');

        $this->builder->join('empleados', 'empleado_id');
        $this->builder->join('empresas', 'empresa_id');
        $this->builder->join('cargos', 'cargo_id');

        $query = $this->builder->getWhere(['usuario_nick' => $user]);
        $query = $query->getResult()[0];

        $validar = password_verify($pass, $query->usuario_password);
        if($validar){
            if($query->usuario_estado == 0){
                echo json_encode(1);
            }
            else{
                $_SESSION['usuario_nombre'] = $query->primer_nombre . ' ' . $query->primer_apellido;
                $_SESSION['usuario_id'] = $query->usuario_id;
                $_SESSION['usuario_rol'] = $query->cargo_id;
                $_SESSION['usuario_email'] = $query->correo;
                $_SESSION['empresa_nombre'] = $query->empresa_nombre;
                $_SESSION['empresa_id'] = $query->empresa_id;
                echo json_encode($_SESSION['usuario_nombre']);
            }
        }else{
            echo json_encode(0);
        }
    }

    public function salir(){
        session_destroy();
        echo json_encode(1);
    }

    public function cambioclave(){
        echo password_hash("sunshine", PASSWORD_DEFAULT)."\n";
    }





}