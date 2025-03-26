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
        $polylines = $this->select(DB::raw('st_asgeojson(geom) as geom, name, description, st_length(geom, true) as length_m, st_length(geom, true)/1000 as length_km, created_at, updated_at'))->get();

        $geojson = [
            'type' => 'FeatureCollection',
            'features' => []
        ];

        foreach ($polylines as $polylines) {
            $feature = [
                'type' => 'Feature',
                'geometry' => json_decode($polylines->geom),
                'properties' => [
                    'name' => $polylines->name,
                    'description' => $polylines->description,
                    'length_m' => $polylines->length_m,
                    'length_km' => $polylines->length_km,
                    'created_at' => $polylines->created_at,
                    'updated_at' => $polylines->updated_at,
                ]
            ];

            array_push($geojson['features'], $feature);
        }

        return $geojson;

    }
}
