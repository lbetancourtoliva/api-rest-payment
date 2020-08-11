<?php

namespace App\Repositories;

use App\Models\PaymentMethod;
use App\Repositories\BaseRepository;

/**
 * Class PaymentMethodRepository
 * @package App\Repositories
 * @version August 7, 2020, 4:40 pm UTC
*/

class PaymentMethodRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return PaymentMethod::class;
    }

    public function getPaymentMethodByName($payment_method_name)
    {
        return $this->model()::updateOrCreate(['name' => $payment_method_name]);
    }
}
