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
        $polygons = $this->select(DB::raw('polygons.id, st_asgeojson(geom) as geom, polygons.name, polygons.description, st_area(geom, true) as area_m2, st_area(geom, true)/1000000 as area_km, polygons.created_at, polygons.updated_at, polygons.image, polygons.user_id, users.name as user_created'))
            ->join('users', 'polygons.user_id', '=', 'users.id')
            ->get();

        $geojson = [
            'type' => 'FeatureCollection',
            'features' => []
        ];

        foreach ($polygons as $polygons) {
            $feature = [
                'type' => 'Feature',
                'geometry' => json_decode($polygons->geom),
                'properties' => [
                    'id' => $polygons->id,
                    'name' => $polygons->name,
                    'description' => $polygons->description,
                    'area_m2' => $polygons->area_m2,
                    'area_km' => $polygons->area_km,
                    'created_at' => $polygons->created_at,
                    'updated_at' => $polygons->updated_at,
                    'image' => $polygons->image,
                    'user_created' => $polygons->user_created,
                    'user_id' => $polygons->user_id,
                ]
            ];

            array_push($geojson['features'], $feature);
        }

        return $geojson;

    }
    public function geojson_polygon($id)
    {
        $polygons = $this->select(DB::raw('id, st_asgeojson(geom) as geom, name, description, st_area(geom, true) as area_m2, st_area(geom, true)/1000000 as area_km, created_at, updated_at, image'))
        ->where('id', $id)
        ->get();

        $geojson = [
            'type' => 'FeatureCollection',
            'features' => []
        ];

        foreach ($polygons as $polygons) {
            $feature = [
                'type' => 'Feature',
                'geometry' => json_decode($polygons->geom),
                'properties' => [
                    'id' => $polygons->id,
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
