<?php

/**
 * This file is part of CodeIgniter 4 Framework.
 *
 * (c) 2023 Powered by Develogy™ <soporte@develogy.mx>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace App\Models;

use CodeIgniter\Model;
use Kodus\Helpers\UUID;

class LandingsModel extends Model
{
    protected $table      = 'landings';
    protected $primaryKey = 'id';

    // protected $useAutoIncrement = false;
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields  = true;
    protected $allowedFields  = [
        'id',
        'slug',
        'name',
        'title',
        'subtitle',
        'other',
        'cover',
        'images',
        'active',
        'user_id',
    ];
    protected bool $allowEmptyInserts = true;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $skipValidation       = true;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $afterInsert    = ['getInsertedID'];

    /**
     * Establece el UUID de la autenticación.
     */
    public function insertAndReturnUUID(array $data): string
    {
        // Generar UUID
        $uuid = UUID::create();

        // Asignar UUID al campo 'id' en $data
        $data['id'] = $uuid;

        // Insertar datos en la base de datos
        $this->insert($data);

        // Devolver el UUID generado
        return $uuid;
    }

    protected function getInsertedID(array $data)
    {
        // Aquí puedes realizar acciones después de la inserción, como obtener el ID insertado
        return $this->db->insertID();
        // Puedes devolver el ID o realizar alguna otra acción con él si lo necesitas
    }
}
