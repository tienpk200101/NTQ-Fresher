<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;

class DemoRepository extends BaseRepository {
    public function getModel() {
        return App\Models\User::class;
    }


}