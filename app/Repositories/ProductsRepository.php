<?php

namespace App\Repositories;

use App\Models\Product as Model;
use Illuminate\Database\Eloquent\Collection;

class ProductsRepository extends Repository {
  /**
   * @return string
   */
  protected function getModelClass() {
    return Model::class;
  }

  public function getProducts(){
    return $this->startConditions()->all();
  }

}
