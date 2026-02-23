<?php

namespace Modules\ClientMasterNew\Models;

use Illuminate\Database\Eloquent\Model;

class ClientMasterDocument extends Model
{
    protected $table = 'client_master_documents';

    protected $fillable = [
        'client_id',
        'document_type',
        'document_category',
        'original_filename',
        'stored_filename',
        'file_path',
        'file_size',
        'mime_type',
        'version',
        'uploaded_by',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function client()
    {
        return $this->belongsTo(ClientMaster::class, 'client_id', 'client_id');
    }

    /**
     * Generate a unique stored filename
     */
    public static function generateStoredFilename($clientId, $documentType, $extension = 'pdf')
    {
        return $clientId . '_' . $documentType . '_' . time() . '.' . $extension;
    }
}
