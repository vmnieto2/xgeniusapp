<?php namespace App\Models;

use CodeIgniter\Model;

class EmpleadosModel extends Model
{

    protected $table      = 'empleados';
    protected $primaryKey = 'empleado_id';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['empleado_id', 'cedula', 'primer_apellido', 'segundo_apellido', 'primer_nombre', 'segundo_nombre', 'genero', 'estado_civil_id', 'fecha_nacimiento', 'direccion', 'barrio', 'ciudad_id', 'correo', 'telefono', 'cargo_id', 'arl_id', 'eps_id', 'fecha_contrato', 'fecha_vencimiento_super', 'tipo_curso', 'fecha_vencimiento_psicofisico', 'fecha_vencimiento_licencia', 'curso_manejo_defensivo', 'concepto_ocupacional', 'entrega_dotacion', 'finca_id', 'foto_perfil_pdf', 'cedula_pdf', 'ruaf_pdf', 'psicofisico_pdf', 'salud_ocupacional_pdf', 'prueba_alcohol_pdf', 'ult_desprendible_pdf', 'curso_entrenamiento_pdf', 'tratamiento_pdf', 'parafiscales_pdf', 'hoja_de_vida_pdf', 'covid_pdf', 'acreditacion_pdf', 'capacitacion_prim_pdf', 'dotacion_pdf', 'libreta_militar_pdf', 'capacitacion_pdf', 'estilo_vida_pdf', 'seguridad_vial_pdf', 'horas_extras_pdf', 'contrato_pdf', 'empleado_estado', 'empresa_id', 'fecha_salida', 'fecha_servidor'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}