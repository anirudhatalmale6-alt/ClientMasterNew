<?php

namespace Modules\ClientMasterNew\Models;

use Illuminate\Database\Eloquent\Model;

class ClientMasterDirector extends Model
{
    protected $table = 'client_master_directors';

    protected $fillable = [
        'client_id',
        'person_id',
        'director_type_id',
        'director_type_name',
        'director_status_id',
        'director_status_name',
        'number_of_director_shares',
        'date_engaged',
        'date_resigned',
        'director_profile_image',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'date_engaged' => 'date',
        'date_resigned' => 'date',
    ];

    public function client()
    {
        return $this->belongsTo(ClientMaster::class, 'client_id', 'client_id');
    }

    public function person()
    {
        return $this->belongsTo(\App\Models\Person::class, 'person_id');
    }
}
