<?php namespace App\Models;

use CodeIgniter\Model;

class EmpleadosModel extends Model
{

    protected $table      = 'empleados';
    protected $primaryKey = 'empleado_id';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['empleado_id', 'cedula', 'primer_apellido', 'segundo_apellido', 'primer_nombre', 'segundo_nombre', 'genero', 'estado_civil_id', 'fecha_nacimiento', 'direccion', 'barrio', 'ciudad_id', 'correo', 'telefono', 'cargo_id', 'arl_id', 'eps_id', 'fecha_contrato',  'foto_perfil_pdf', 'cedula_pdf',  'empleado_estado', 'empresa_id', 'fecha_salida', 'fecha_servidor'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}