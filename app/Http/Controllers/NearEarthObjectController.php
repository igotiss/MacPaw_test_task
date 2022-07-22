<?php

namespace App\Http\Controllers;

use App\Models\NearEarthObject;
use Illuminate\Http\Request;

class NearEarthObjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objects = NearEarthObject::where('is_hazardous', true)->get();
        return response()->json($objects);
    }

    /**
     * Show the objects with request values.
     *
     * @return \Illuminate\Http\Response
     */
    public function fastest(Request $request)
    {
        $check = $request->input('hazardous');
        if (!$check)
            return response()->json('not entered hazardous', 404);

        $fastestObjects = NearEarthObject::where('is_hazardous', $check === 'true')->get();
        return response()->json($fastestObjects);
    }

    public function getNasaData () {
        $start_date = date('Y-m-d', strtotime("-3 days"));
        $end_date = date('Y-m-d');
        $url = 'https://api.nasa.gov/neo/rest/v1/feed?start_date='.$start_date.'&end_date='.$end_date.'&api_key=DEMO_KEY';
        $response = file_get_contents($url);
        $newsData = json_decode($response);
        $arrFromNasa = (collect($newsData->near_earth_objects)->collapse());

        foreach ($arrFromNasa as $object) {
            $date = ($object->close_approach_data[0]->close_approach_date);
            $speed = ($object->close_approach_data[0]->relative_velocity->kilometers_per_hour);
            $isHazardous = $object->is_potentially_hazardous_asteroid;

            $nearEarthObj = new NearEarthObject([
                'date' => $date,
                'referenced' => $object->neo_reference_id,
                'name' => $object->name,
                'speed' => $speed,
                'is_hazardous' => $isHazardous
            ]);
            $nearEarthObj->save();
        }
        $objects = NearEarthObject::all();
        return response()->json($objects);
    }

}
