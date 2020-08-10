<?php

namespace App\Repositories;

use App\Models\Payment;
use App\Repositories\BaseRepository;

/**
 * Class PaymentRepository
 * @package App\Repositories
 * @version August 10, 2020, 9:42 pm UTC
*/

class PaymentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'payment_date',
        'company_id',
        'amount',
        'payment_method_id',
        'external_reference',
        'terminal',
        'status',
        'reference'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Payment::class;
    }
}
