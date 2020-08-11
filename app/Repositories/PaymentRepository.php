<?php

namespace App\Repositories;

use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Container\Container;
use Illuminate\Support\Arr;

/**
 * Class PaymentRepository
 * @package App\Repositories
 * @version August 10, 2020, 9:42 pm UTC
*/

class PaymentRepository extends BaseRepository
{
     protected $companyRepository;
     protected $payMethodRepository;

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

    public function __construct(CompanyRepository $companyRepository, PaymentMethodRepository $payMethodRepository)
    {
        parent::__construct(Container::getInstance());
        $this->companyRepository = $companyRepository;
        $this->payMethodRepository = $payMethodRepository;
    }

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

    public function store($input)
    {
        $payment_date = Carbon::parse(Arr::pull($input, 'payment_date'));
        Arr::set($input, 'payment_date', $payment_date);

        $company = $this->companyRepository->getCompanyByName(Arr::pull($input, 'company'));
        Arr::set($input, 'company_id', $company->id);

        $payment_method = $this->payMethodRepository->getPaymentMethodByName(Arr::pull($input, 'payment_method'));
        Arr::set($input, 'payment_method_id', $payment_method->id);

        return $this->create($input);
    }

    public function getPaymentCompanyRange($company, $from, $until)
    {
        $payQuery = $this->model()::query();

        $payQuery = $payQuery->whereHas('company', function ($query) use ($company) {
            $query->where('name', $company);
        });

        if (!empty($from)) {
            $date_from = Carbon::parse($from);
            $payment_date_from = $date_from->toDateString();
            $payQuery = $payQuery->whereDate('payment_date', '>=', $payment_date_from);
        }

        if (!empty($until)) {
            $date_until = Carbon::parse($until);
            $payment_date_until = $date_until->toDateString();
            $payQuery = $payQuery->whereDate('payment_date', '<=', $payment_date_until);
        }

        $pays = $payQuery->get();

        return $pays;
    }
}
