<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Search;

use Illuminate\Http\Request;

class Index
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        $query = \App\Models\Listing::active();

        $data = $request->all();

        if (isset($data['title'])) {
            $query->where('title', 'like', '%' . $data['title'] . '%');
        }
        if (isset($data['bedrooms'])) {
            $query->where('bedrooms', $data['bedrooms']);
        }
        if (isset($data['bathrooms'])) {
            $query->where('bathrooms', $data['bathrooms']);
        }
        if (isset($data['storeys'])) {
            $query->where('storeys', $data['storeys']);
        }
        if (isset($data['garages'])) {
            $query->where('garages', $data['garages']);
        }
        if (isset($data['price_from'])) {
            $query->where('price', '>=', $data['price_from']);
        }
        if (isset($data['price_to'])) {
            $query->where('price', '<=', $data['price_to']);
        }

        $oListings = $query->get();
        $aListings = $oListings->transform(function (\App\Models\Listing $item) {
            return (new \App\Http\Transformers\ListingTransformer())->transform($item);
        })->toArray();

        return response()->json([
            'data' => $aListings
        ]);
    }
}
