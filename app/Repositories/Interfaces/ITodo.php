<?php
namespace App\Repositories\Interfaces;


use App\Models\User;
use Illuminate\Support\Collection;

interface ITodo extends IEloquent
{
    /**
     * @param User $user
     * @param array $extraFilter
     * @return Collection
     */
    public function allByUser(User $user, array $extraFilter = []): Collection;

}
