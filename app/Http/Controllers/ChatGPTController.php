<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class ChatGPTController extends Controller
{
    public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        try {
            $client = new \GuzzleHttp\Client();
            $response = $client->post('https://api.openai.com/v1/chat/completions', [
                'headers' => [
                    'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'model' => 'gpt-3.5-turbo',
                    'messages' => [
                        [
                            'role' => 'user',
                            'content' => $request->message,
                        ],
                    ],
                    'max_tokens' => 2048,
                    'temperature' => 0.7,
                ],
            ]);

            $body = json_decode((string) $response->getBody(), true);

            return response()->json([
                'message' => $request->message,
                'response' => $body['choices'][0]['message']['content'],
            ]);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            return response()->json([
                'error' => 'Failed to communicate with OpenAI API',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
