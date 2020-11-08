<?php namespace App\Models;

use CodeIgniter\Model;

class FincasModel extends Model
{

    protected $table      = 'fincas';
    protected $primaryKey = 'finca_id';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['finca_id', 'finca_nombre'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}