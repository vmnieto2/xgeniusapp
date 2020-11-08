<?php namespace App\Models;

use CodeIgniter\Model;

class departamentosModel extends Model
{

    protected $table      = 'departamentos';
    protected $primaryKey = 'departamento_id';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['departamento_id', 'departamento_nombre'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}