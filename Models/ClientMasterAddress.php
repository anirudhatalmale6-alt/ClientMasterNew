<?php

namespace Modules\ClientMasterNew\Models;

use Illuminate\Database\Eloquent\Model;

class ClientMasterAddress extends Model
{
    protected $table = 'client_master_addresses';

    protected $fillable = [
        'client_id',
        'address_id',
        'address_type_id',
        'is_default',
    ];

    protected $casts = [
        'is_default' => 'boolean',
    ];

    public function client()
    {
        return $this->belongsTo(ClientMaster::class, 'client_id', 'client_id');
    }

    public function address()
    {
        return $this->belongsTo(\App\Models\Address::class, 'address_id');
    }
}
