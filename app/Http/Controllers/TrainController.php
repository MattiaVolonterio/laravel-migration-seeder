<?php

namespace App\Http\Controllers;

use App\Models\Train;
use Illuminate\Http\Request;

class TrainController extends Controller
{
    public function index()
    {
        $trains = Train::paginate();
        // $trains = Train::whereDate('departure_time', now())->get();
        return view('train', compact('trains'));
    }
}
