<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    /**
     * Display a paginated list of posts.
     *
     * @return Response
     */
    public function index()
    {
        $companies = Company::all();

        

        return view('company.index', compact('companies'));
    }


    public function companyList()
    {
        $data = Company::all();

        return response()->json(['data'=> $data]);
    }


    /**
     * Favorite a particular company
     *
     * @param  Company $company
     * @return Response
     */
    public function favoriteCompany(Company $company)
    {
        Auth::user()->favorites()->attach($company->id);

        return response()->json('ok');
    }

    /**
     * Unfavorite a particular Company
     *
     * @param  Company $company
     * @return Response
     */
    public function unFavoriteCompany(Company $company)
    {
        Auth::user()->favorites()->detach($company->id);

        return response()->json('ok');
    }


    /**
     * search company list by user
     *
     * @param Request $request
     * @return void
     */
    public function searchCompany(Request $request)
    {
        $search = $request->get('q');
        $data = Company::where('name','like','%'.$search.'%')->get();
        return response()->json(['data' => $data ],200);
    }
}
