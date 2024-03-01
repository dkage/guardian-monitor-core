<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        return view('running');
    }

    public function todoist()
    {
        $client_id = config('ext_api.todoist.client');
        $generated_token_state = config('ext_api.state_token');

        $scope = "data:read_write,data:delete";

        $login = "https://todoist.com/oauth/authorize?client_id={$client_id}&scope={$scope}&state={$generated_token_state}";
        return view('todoist', ['login' => $login]);
    }

    public function todoistReturn(Request $request)
    {

        $token = $request->code;
        $state = $request->state;

        if($state != config('ext_api.state_token')) {
            return redirect('/todoist');
        }

        $client_id = config('ext_api.todoist.client');
        $secret_id = config('ext_api.todoist.secret');
        $verification = config('ext_api.todoist.verify');

        // make a php post request with the token

        $response = Http::POST('https://todoist.com/oauth/access_token', [
            'client_id' => $client_id,
            'client_secret' => $secret_id,
            'code' => $token,
            'redirect_uri' => route('todoist_return'),
        ]);

        $response = $response->json();
        Log::info($response);

        return redirect('/todoist');
    }
}
