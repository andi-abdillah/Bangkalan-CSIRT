<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regulation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['regulationCategory'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            });
        });

        $query->when($filters['regulationCategory'] ?? false, function ($query, $regulationCategory) {
            return $query->whereHas('regulationCategory', function ($query) use ($regulationCategory) {
                $query->where('slug', $regulationCategory);
            });
        });

        $query->when($filters['searchRegulationsBy'] ?? false, function ($query, $value) {
            return $query->where(function ($query) use ($value) {
                $query->where('name', 'like', '%' . $value . '%')->orWhereHas('regulationCategory', function ($query) use ($value) {
                    $query->where('name', 'like', '%' . $value . '%');
                });
            });
        });
    }

    public function regulationCategory()
    {
        return $this->belongsTo(RegulationCategory::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
