<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class AutomobileController extends Controller
{
    function index()
    {
        //classifier data from database
        $manufacturers = DB::select('select id, title from manufacturers order by title asc');
        $countries = DB::select('select id, title from countries order by title asc');

        $selectedyear =  intval(request()->input('year'));
        $selectedmanufacturer = intval(request()->input('manufacturer'));
        $selectedcountry = intval(request()->input('country'));


        $results = array();
        if ($selectedyear > 0 && $selectedmanufacturer > 0 && $selectedcountry > 0) {
            $results = DB::select(
                "select
            manufacturers.title as manufacturer,
            models.title as model,
            colors.title as color,
            count(*) as count
           from
            manufacturers
            inner join models on manufacturer_id = manufacturers.id
            inner join cars on cars.model_id = models.id
            inner join countries on cars.source_country_id = countries.id
            inner join colors on cars.color_id = colors.id
           where
            manufacturer_id = :manufacturer 
            and countries.id = :country
            and cars.registration_year = :year
           group by
            manufacturers.title,
            models.title,
            colors.title
           order by
            manufacturer,
            model,
            color,
            count desc",
                [
                    "manufacturer" => $selectedmanufacturer,
                    "country" => $selectedcountry,
                    "year" => $selectedyear
                ]
            );
        }


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
