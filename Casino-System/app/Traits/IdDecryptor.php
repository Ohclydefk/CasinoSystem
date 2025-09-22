<?php

namespace App\Traits;

use Illuminate\Support\Facades\Crypt;

trait IdDecryptor
{
    /**
     * Decrypts the id_no attribute of a model instance.
     *
     * @param  mixed  $model
     * @return mixed
     */
    public function decryptIdNo($model)
    {
        if (!$model) {
            return $model;
        }

        try {
            $model->id_no = Crypt::decryptString($model->id_no);
        } catch (\Exception $e) {
            $model->id_no = null;
        }

        return $model;
    }

    /**
     * Decrypts id_no for a collection of models.
     *
     * @param  \Illuminate\Support\Collection|\Illuminate\Contracts\Pagination\Paginator  $collection
     * @return mixed
     */
    public function decryptIdNoCollection($collection)
    {
        if (!$collection) {
            return $collection;
        }

        $collection->getCollection()->transform(function ($item) {
            return $this->decryptIdNo($item);
        });

        return $collection;
    }
}
