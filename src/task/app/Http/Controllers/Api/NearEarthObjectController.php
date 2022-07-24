<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NearEarthObjectResources;
use App\Models\NearEarthObject;
use Illuminate\Http\Request;
use PHPUnit\Util\Filter;

class NearEarthObjectController extends Controller
{
    /**
     * Display all DB entries which contain potentially hazardous asteroids.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function hazardous()
    {
        $objects = NearEarthObject::where('is_hazardous', 1)->get();
        return NearEarthObjectResources::collection($objects);
    }

    public function fastest(Request $request)
    {
        $hazardous = false;
        if($request->has('hazardous') && $request->input('hazardous')) {
            $hazardous = $request->boolean('hazardous');
        }
        $objects = NearEarthObject::where('is_hazardous', $hazardous)->get();
        return $objects->sortByDesc('speed');
    }

}
