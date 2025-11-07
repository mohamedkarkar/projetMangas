<?php

namespace App\Services;

use App\Models\Genre;
use Illuminate\Database\QueryException;
use App\Exceptions\UserException;

class GenreService
{
    public function getListGenres()
    {
        try{
            $Liste = Genre::all();
            return $Liste;
        }catch(QueryException $exception){
            $userMessage = "Impossible d'accéder à la base de données.";
            throw new UserException($userMessage,  $exception->getMessage(),  $exception->getCode());
        }
    }
}
