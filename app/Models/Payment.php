<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Payment
 * @package App\Models
 * @version August 10, 2020, 9:42 pm UTC
 *
 * @property string $payment_date
 * @property integer $company_id
 * @property string $amount
 * @property integer $payment_method_id
 * @property string $external_reference
 * @property integer $terminal
 * @property string $status
 * @property string $reference
 */
class Payment extends Model
{
    use SoftDeletes;

    public $table = 'payment';


    protected $dates = ['deleted_at'];


    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'payment_date' => 'date',
        'company_id' => 'integer',
        'amount' => 'string',
        'payment_method_id' => 'integer',
        'external_reference' => 'string',
        'terminal' => 'integer',
        'status' => 'string',
        'reference' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'payment_date' => 'required',
        'company' => 'required',
        'amount' => 'required',
        'payment_method' => 'required',
        'external_reference' => 'required|unique:payment',
        'terminal' => 'required',
        'status' => 'required|in:CONFIRMED,REVERSED,INITIALIZED'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

}
