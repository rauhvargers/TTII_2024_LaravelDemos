<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AutomobileController extends Controller
{
    function index(Request $request)
    {
        //classifier data from database
        $manufacturers = DB::select('select id, title from manufacturers order by title asc');
        $countries = DB::select('select id, title from countries order by title asc');

        if ($request->has('year') || $request->has('manufacturer') || $request->has('country')) {
            $selectedyear =  intval(request()->input('year'));
            $selectedmanufacturer = intval(request()->input('manufacturer'));
            $selectedcountry = intval(request()->input('country'));
            $filters = [
                'year' => $selectedyear,
                'manufacturer' => $selectedmanufacturer,
                'country' => $selectedcountry
            ];
        } else if ($request->session()->has('lastUsedFilters')) {
            $filters = $request->session()->get('lastUsedFilters');
            $selectedyear = $filters['year'];
            $selectedmanufacturer = $filters['manufacturer'];
            $selectedcountry = $filters['country'];
        } else {
            $selectedyear = 0;
            $selectedmanufacturer = 0;
            $selectedcountry = 0;
        }



        $results = array();
        if ($selectedyear > 0 && $selectedmanufacturer > 0 && $selectedcountry > 0) {
            

            $results = DB::select(
                "select
            manufacturers.title as manufacturer,
            carmodels.title as model,
            carmodels.id as model_id,
            colors.title as color,
            count(*) as count
           from
            manufacturers
            inner join carmodels on manufacturer_id = manufacturers.id
            inner join cars on cars.carmodel_id = carmodels.id
            inner join countries on cars.country_id = countries.id
            inner join colors on cars.color_id = colors.id
           where
            manufacturer_id = :manufacturer 
            and countries.id = :country
            and cars.registration_year = :year
           group by
            manufacturers.title,
            carmodels.title,
            carmodels.id,
            colors.title
           order by
            manufacturer,
            model,
            color,
            count desc",
                $filters
            );
        }


        $request->session()->put('lastUsedFilters', $filters);

        return view(
            'automobiles',
            compact(
                'manufacturers',
                'countries',
                'results',
                'selectedyear',
                'selectedmanufacturer',
                'selectedcountry'
            )
        );
    }
}
