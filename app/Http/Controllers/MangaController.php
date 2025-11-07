<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Services\GenreService;
use App\Models\Manga;
use App\Services\MangaService;

class MangaController extends Controller
{
    public function listMangas()
    {
        try{
            $service = new MangaService();
            $mangas = $service->getListMangas();
            foreach ($mangas as $manga) {
                if (!file_exists('assets\\images\\'. $manga->couverture)) {
                    $manga->couverture = 'erreur.png';
                }
            }
            return view('listMangas', compact('mangas'));
        } catch(Exception $exception) {
            return view('error', compact('exception'));
        }
    }

    public function addManga()
    {
        try{
            $service = new GenreService();
            $genres = $service->getListGenres();
            $manga = new Manga();
            return view('formManga', compact('genres', 'manga'));
        }catch (Exception  $exception){
            return view('error', compact('exception'));
        }
    }
}
