<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GiphyController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $limit = $request->input('limit', 25);
        $offset = $request->input('offset', 0);

        $url = env('GIPHY_API_URL');
        $response = Http::get($url.'/gifs/search', [
            'api_key' => env('GIPHY_API_KEY'),
            'q' => $query,
            'limit' => $limit,
            'offset' => $offset,
            'rating' => env('GIPHY_API_RATING', 'g'),
            'lang' => env('GIPHY_API_LANG', 'es'),
            'bundle' => env('GIPHY_API_BUNDLE', 'messaging_non_clips'),
        ]);

        if (!empty($response['meta']) && !empty($response['meta']['status'])) {
            $status = $response['meta']['status'];
        }

        return response()->json($response->json(), $status ?? 500);
    }

    public function getById(String $id)
    {
        $url = env('GIPHY_API_URL');
        $response = Http::get($url.'/gifs/'.$id, [
            'api_key' => env('GIPHY_API_KEY'),
            'rating' => env('GIPHY_API_RATING', 'g'),
        ]);

        if (!empty($response['meta']) && !empty($response['meta']['status'])) {
            $status = $response['meta']['status'];
        }

        return response()->json($response->json(), $status ?? 500);
    }
}
