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

class ProspectsModel extends Model
{
    protected $table            = 'prospects';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'name',
        'email',
        'phone',
        'date',
        'state_id',
        'observations',
        'response',
        'landing_id',
    ];
    protected bool $allowEmptyInserts = true;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;

    /**
     * Origen del prospecto
     * INNER JOIN with landing table
     */
    public function landing()
    {
        $this->builder()->join('landings', 'landings.id = prospects.landing_id', 'inner');

        return $this;
    }

    /**
     * Estado donde se encuentra el prospecto
     * INNER JOIN with states table
     */
    public function service()
    {
        $this->builder()->join('services', 'services.id = prospects.service_id', 'inner');

        return $this;
    }

    public function state()
    {
        $this->builder()->join('estados', 'estados.id = prospects.state_id', 'inner');

        return $this;
    }
}
