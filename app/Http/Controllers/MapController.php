<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Http\Requests;
    use DB;

    class MapController extends Controller
    {
      public function index()
        {
          $adresses = DB::table('users')->select('adresse')->get();
          return view('map', ['adresses' => $adresses]);
        }
      }
