<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function index()
    {
        return DB::table('FEED')->paginate(15);
    }

    public function between(Request $request)
    {

        return DB::table('FEED')->whereBetween('item_date', [$request->query('startDate'), $request->query('endDate')])->paginate(15);
    }
}
