<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class PolygonsModel extends Model
{
    protected $table = 'polygons';

    protected $guarded = ['id'];

    public function geojson_polygons()
    {
        $polygons = $this->select(DB::raw('st_asgeojson(geom) as geom, name, description, st_area(geom, true) as area_m2, st_area(geom, true)/1000000 as area_km, created_at, updated_at, image'))->get();

        $geojson = [
            'type' => 'FeatureCollection',
            'features' => []
        ];

        foreach ($polygons as $polygons) {
            $feature = [
                'type' => 'Feature',
                'geometry' => json_decode($polygons->geom),
                'properties' => [
                    'name' => $polygons->name,
                    'description' => $polygons->description,
                    'area_m2' => $polygons->area_m2,
                    'area_km' => $polygons->area_km,
                    'created_at' => $polygons->created_at,
                    'updated_at' => $polygons->updated_at,
                    'image' => $polygons->image,
                ]
            ];

            array_push($geojson['features'], $feature);
        }

        return $geojson;

    }


}
