<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\SoftDeletes;

trait SoftDeletesCascade
{
    public static function bootSoftDeletesCascade()

    {
        static::deleting(function ($model) {
            foreach ($model->getCascadingDeletes() as $relation) {
                $relationObj = $model->$relation();

                if ($relationObj instanceof \Illuminate\Database\Eloquent\Relations\BelongsToMany) {
                    $relationObj->detach(); // para pivot
                } else {

                    $relationObj->withTrashed()->get()->each(function ($item) use ($model) {
                        if ($model->isForceDeleting()) {
                            $item->forceDelete();
                        } else {
                            $item->delete();
                        }
                    });
                }
            }
        });

        static::restoring(function ($model) {
            foreach ($model->getCascadingDeletes() as $relation) {
                $relationObj = $model->$relation();

                if ($relationObj instanceof \Illuminate\Database\Eloquent\Relations\BelongsToMany) {
                    $relationObj->withTrashed()->restore();
                } else {
                    $relationObj->withTrashed()->get()->each->restore();
                }
            }
        });
    }

    /**
     * Defina no model quais relacionamentos devem ter soft delete em cascata
     * Exemplo:
     * protected $cascadeDeletes = ['installments'];
     */
    public function getCascadingDeletes(): array
    {
        return property_exists($this, 'cascadeDeletes') ? $this->cascadeDeletes : [];
    }

}
