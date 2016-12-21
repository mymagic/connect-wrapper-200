<?php

namespace MyMagic\Connect;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client as BaseClient;
use GuzzleHttp\Exception\ClientException as Exception;

class Client extends Controller
{
    private $information = NULL;

    public function connector($request){

        $http = new BaseClient;

        try {

            $response = $http->post(env('CONNECT_SERVER') . '/oauth/token', [
                'form_params' => [
                    'grant_type' => 'authorization_code',
                    'client_id' => env('CONNECT_CLIENT_ID'),
                    'client_secret' => env('CONNECT_CLIENT_SECRET'),
                    'redirect_uri' => env('CONNECT_CLIENT') . '/callback',
                    'code' => $request->code
                ]
            ]);

        } catch (Exception $e) {
            $response = $e->getResponse();
            if ($response && $response->getStatusCode() === 401) {
                return \Redirect::to('login')->with('alert-fail', 'These credentials do not match our records.');
            }
        }

        try {
            $grab = json_decode((string)$response->getBody(), true)['access_token'];
        } catch (\Exception $e) {
            return \Redirect::to('/error')->with('alert-fail', 'Permission Denied.');
        }

        $apiresponse = $http->get(env('CONNECT_SERVER') . '/api/user', [
            'headers' => [
                'Authorization' => 'Bearer ' . $grab,
                'Content-Type' => 'application/json',
            ],
        ]);

        return json_decode((string)$apiresponse->getBody(), true);
    }

    public function init(Request $request){
        $this->information = $this->connector($request);
        return 0;
    }

    public function getFirstName(){
       return $this->information['firstname'];
    }
    public function getLastName(){
        return $this->information['lastname'];
    }
    public function getCountry(){
        return $this->information['country'];
    }
    public function getEmail(){
        return $this->information['email'];
    }
    public function getAvatar(){
        return $this->information['avatar'];
    }
    public function getGender(){
        return $this->information['gender'];
    }
}