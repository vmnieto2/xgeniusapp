<?php namespace App\Models;

use CodeIgniter\Model;

class CamionesModel extends Model
{

    protected $table      = 'camiones';
    protected $primaryKey = 'camion_id';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['camion_id', 'camion_placa', 'camion_soat_vencimiento', 'camion_estado'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}