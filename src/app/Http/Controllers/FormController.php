<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class FormController extends Controller
{
    public function index(Request $request)
    {
        $infoMessage = '';

        if ($request->isMethod("POST")) {
            $postBody = [
                'site_id' => 100,
                'type' => 'order',
                'data' => [
                    ['name'=>'Имя', 'value'=>'Маруся'],
                    ['name'=>'Дата заезда', 'value'=> $request->get('date_from')],
                    ['name'=>'Дата выезда', 'value'=> $request->get('date_to')],
                    ['name'=>'Телефон', 'value'=> $request->get('phone')],
                ]
            ];

            $client = new Client();

            $response = $client->post('https://ko.tour-shop.ru/siteLead', [
                'headers' => [
                    'KoSiteKey' => 'test198',
                ],
                'form_params' => $postBody
            ]);

            switch($response->getStatusCode()) {
                case 200:
                    $body = $response->getBody()->getContents();
                    $leadId = str_replace('lead_id=','', $body);

                    $infoMessage = 'Заявка зафиксирована под номером '.$leadId;
                    break;
                default:

                    $infoMessage = 'В процессе выполнения возникли ошибки';
            }

        }

        return view('form.index', ['infoMessage' => $infoMessage]);
    }
}