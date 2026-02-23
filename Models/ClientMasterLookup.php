<?php

namespace Modules\ClientMasterNew\Models;

use Illuminate\Database\Eloquent\Model;

class ClientMasterLookup extends Model
{
    protected $table = 'client_master_lookups';

    protected $fillable = [
        'category',
        'code',
        'value',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get lookup values by category
     */
    public static function getByCategory($category)
    {
        return static::where('category', $category)
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();
    }
}
