<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Providers\RouteServiceProvider;
use App\Repositories\CompanyRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Response;

/**
 * Class CompanyController
 * @package App\Http\Controllers\
 */
class CompanyController extends AppBaseController
{
    private $companyRepository;

    public function __construct(CompanyRepository $companyRepository)
    {
//        $this->middleware('auth');
        $this->companyRepository = $companyRepository;
    }

    /**
     * Show the companies dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getCompanies()
    {
        $companies = $this->companyRepository->all();

        return view('companies.index')->with('companies', $companies);
    }
}