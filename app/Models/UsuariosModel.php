<?php namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model
{

    protected $table      = 'usuarios';
    protected $primaryKey = 'usuario_id';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['usuario_nick', 'usuario_password', 'usuario_estado', 'empleado_id'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}