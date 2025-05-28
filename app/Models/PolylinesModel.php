<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class PolylinesModel extends Model
{
    protected $table = 'polylines';

    protected $guarded = ['id'];

    public function geojson_polylines()
    {
        $polylines = $this->select(DB::raw('polylines.id, st_asgeojson(geom) as geom, polylines.name, polylines.description, st_length(geom, true) as length_m, st_length(geom, true)/1000 as length_km, polylines.created_at, polylines.updated_at, polylines.image, polylines.user_id, users.name as user_created'))
            ->join('users', 'polylines.user_id', '=', 'users.id')
            ->get();

        $geojson = [
            'type' => 'FeatureCollection',
            'features' => []
        ];

        foreach ($polylines as $polylines) {
            $feature = [
                'type' => 'Feature',
                'geometry' => json_decode($polylines->geom),
                'properties' => [
                    'id' => $polylines->id,
                    'name' => $polylines->name,
                    'description' => $polylines->description,
                    'length_m' => $polylines->length_m,
                    'length_km' => $polylines->length_km,
                    'created_at' => $polylines->created_at,
                    'updated_at' => $polylines->updated_at,
                    'image' => $polylines->image,
                    'user_created' => $polylines->user_created,
                    'user_id' => $polylines->user_id,
                ]
            ];

            array_push($geojson['features'], $feature);
        }

        return $geojson;

    }
    public function geojson_polyline($id)
    {
        $polylines = $this->select(DB::raw('id, st_asgeojson(geom) as geom, name, description, st_length(geom, true) as length_m, st_length(geom, true)/1000 as length_km, created_at, updated_at, image'))
        ->where('id', $id)
        ->get();

        $geojson = [
            'type' => 'FeatureCollection',
            'features' => []
        ];

        foreach ($polylines as $polylines) {
            $feature = [
                'type' => 'Feature',
                'geometry' => json_decode($polylines->geom),
                'properties' => [
                    'id' => $polylines->id,
                    'name' => $polylines->name,
                    'description' => $polylines->description,
                    'length_m' => $polylines->length_m,
                    'length_km' => $polylines->length_km,
                    'created_at' => $polylines->created_at,
                    'updated_at' => $polylines->updated_at,
                    'image' => $polylines->image,
                ]
            ];

            array_push($geojson['features'], $feature);
        }

        return $geojson;

    }
}
