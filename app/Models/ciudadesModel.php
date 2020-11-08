<?php namespace App\Models;

use CodeIgniter\Model;

class ciudadesModel extends Model
{

    protected $table      = 'ciudades';
    protected $primaryKey = 'ciudad_id';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['ciudad_id', 'ciudad_nombre', 'departamento_id'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}