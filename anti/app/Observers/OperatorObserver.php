<?php

namespace App\Observers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class OperatorObserver
{
    public function creating(Model $model)
    {
        $model->created_by = $this->user()->id;
    }

    public function updating(Model $model)
    {
        $model->updated_by = $this->user()->id;
    }

    public function saving(Model $model)
    {
        $model->updated_by = $this->user()->id;
    }

    private function user(): User
    {
        $user = Auth::user();

        assert($user instanceof User);

        return $user;
    }
}
