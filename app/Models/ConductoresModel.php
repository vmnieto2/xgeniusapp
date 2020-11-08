<?php namespace App\Models;

use CodeIgniter\Model;

class ConductoresModel extends Model
{

    protected $table      = 'conductores';
    protected $primaryKey = 'conductor_id';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['conductor_id','conductor_nombre','conductor_cedula','conductor_vencimiento_licencia','conductor_estado'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
