<?php

namespace Modules\ClientMasterNew\Models;

use Illuminate\Database\Eloquent\Model;

class ClientMasterBank extends Model
{
    protected $table = 'client_master_banks';

    protected $fillable = [
        'client_id',
        'bank_id',
        'bank_name',
        'bank_account_holder',
        'bank_account_number',
        'bank_account_type_id',
        'bank_account_type_name',
        'bank_account_status_id',
        'bank_account_status_name',
        'bank_statement_frequency_id',
        'bank_statement_frequency_name',
        'bank_branch_name',
        'bank_branch_code',
        'bank_swift_code',
        'bank_logo',
        'bank_account_date_opened',
        'bank_statement_cut_off_date',
        'is_default',
        'document',
        'is_active',
    ];

    protected $casts = [
        'is_default' => 'boolean',
        'is_active' => 'boolean',
        'bank_account_date_opened' => 'date',
        'bank_statement_cut_off_date' => 'date',
    ];

    public function client()
    {
        return $this->belongsTo(ClientMaster::class, 'client_id', 'client_id');
    }
}
