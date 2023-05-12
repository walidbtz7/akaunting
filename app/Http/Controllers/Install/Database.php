<?php

namespace App\Http\Controllers\Install;

use App\Http\Requests\Install\Database as Request;
use App\Utilities\Installer;
use Illuminate\Routing\Controller;

class Database extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('install.database.create', [
            'host'      => env('DB_HOST'    , 'localhost'),
            'username'  => env('DB_USERNAME', ''),
            'password'  => env('DB_PASSWORD', ''),
            'database'  => env('DB_DATABASE', ''),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $connection = config('database.default','mysql');

        $host     = $request['hostname'];
        $port     = config("database.connections.$connection.port", '3306');
        $database = $request['database'];
        $username = $request['username'];
        $password = $request['password'];

        $response['redirect'] = route('install.settings');

        return response()->json($response);
    }
}
