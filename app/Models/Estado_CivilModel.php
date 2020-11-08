<?php namespace App\Models;

use CodeIgniter\Model;

class Estado_CivilModel extends Model
{

    protected $table      = 'estado_civil';
    protected $primaryKey = 'estado_civil_id';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['estado_civil_id', 'estado_civil_nombre'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}