<?php

namespace App\Http\Controllers;
use App\Models\PolylinesModel;
use App\Models\PolygonsModel;
use App\Models\PointsModel;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function __construct(){
        $this->points = new PointsModel();
        $this->polygons = new PolygonsModel();
        $this->polylines = new PolylinesModel();
    }

    public function points()
    {
        $points = $this->points->geojson_points();
        return response()->json($points);
    }
    public function polylines()
    {
        $polylines = $this->polylines->geojson_polylines();
        return response()->json($polylines, 200, [], JSON_NUMERIC_CHECK);
    }
    public function polygons()
    {
        $polygons = $this->polygons->geojson_polygons();
        return response()->json($polygons, 200, [], JSON_NUMERIC_CHECK);
    }


}
