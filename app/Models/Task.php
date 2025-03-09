<?php

namespace App\Models;

use App\Enums\TaskCategory;
use App\Enums\TaskStatus;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',
        'description',
        'status',
        'category',
        'due_at',
        'created_at'
    ];

    protected function casts(): array
    {
        return [
            'status'   => TaskStatus::class,
            'category' => TaskCategory::class,
            'due_at'   => 'datetime',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query)
    {
        foreach (request('filter', []) as $field => $value) {
            if ($value && in_array($field, $this->fillable)) {
                $query->where($field, $value);
            }
        }

        $query->when($sort = request('sort'), function ($query) use ($sort) {
            $field = data_get($sort, 'field');
            if ($field && in_array($field, $this->fillable)) {
                $direction = data_get($sort, 'direction', 'desc');
                if ($direction) {
                    $query->orderBy($field, $direction);
                }
            }
        });

        return $query;
    }
}

