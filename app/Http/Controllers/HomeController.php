<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $animals = Animal::query()
            ->get();

        // $use_animals = [];
        // // dd(Cookie::get());
        // $cookie_god_id = Cookie::get('god_id');

        // if (empty($cookie_user_id)) {
        //     $cookie_god_id = uniqid();
        // }

        // Cookie::queue('god_id', $cookie_god_id, 10);
        Cookie::queue('animals', '[]', 10);

        return view(
            'home',
            [
                'menu_data' => [
                    'animals' => $animals
                ]
            ]
        );
    }
}
