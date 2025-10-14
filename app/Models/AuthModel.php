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

class AuthModel extends Model
{
    protected $table      = 'auth';
    protected $primaryKey = 'id';

    // protected $useAutoIncrement = false;
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields  = true;
    protected $allowedFields  = [
        'secret',
        'user_id',
        'expires_at',
    ];
    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $skipValidation       = true;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks    = true;
    protected $beforeInsert      = ['setID'];
    protected $beforeInsertBatch = ['setIDGroup'];

    /**
     * Establece el UUID de la autenticación.
     */
    protected function setID(array $data)
    {
        $data['data']['id'] = UUID::create();

        return $data;
    }

    /**
     * Establece el UUID de un grupo de autenticaciones.
     */
    protected function setIDGroup(array $data)
    {
        foreach ($data['data'] as $itr => $value) {
            $data['data'][$itr]['id'] = UUID::create();
        }

        return $data;
    }
}
