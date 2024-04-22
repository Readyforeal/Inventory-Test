<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Builder::macro('search', function ($fields, $string) {
        //     return $string ? $this->where(function ($query) use ($fields, $string) {
        //         foreach ($fields as $field) {
        //             $query->orWhere($field, 'like', '%' . $string . '%');
        //         }
        //     }) : $this;
        // });

        Builder::macro('search', function ($fields, $string) {
            return $string ? $this->where(function ($query) use ($fields, $string) {
                foreach ($fields as $field) {
                    // If the field contains a dot, it indicates a relationship
                    if (strpos($field, '.') !== false) {
                        [$relation, $relatedField] = explode('.', $field);
                        $query->orWhereHas($relation, function ($query) use ($relatedField, $string) {
                            $query->where($relatedField, 'like', '%' . $string . '%');
                        });
                    } else {
                        $query->orWhere($field, 'like', '%' . $string . '%');
                    }
                }
            }) : $this;
        });
    }
}
