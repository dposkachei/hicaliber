<?php

declare(strict_types=1);

namespace App\Http\Transformers;

use App\Models\Listing;

class ListingTransformer
{
    /**
     * @param Listing $oListing
     * @return array
     */
    public function transform(Listing $oListing)
    {
        return [
            'id' => $oListing->id,
            'title' => $oListing->title,
            'price' => $oListing->price,
            'bedrooms' => $oListing->bedrooms,
            'bathrooms' => $oListing->bathrooms,
            'storeys' => $oListing->storeys,
            'garages' => $oListing->garages,
        ];
    }
}
