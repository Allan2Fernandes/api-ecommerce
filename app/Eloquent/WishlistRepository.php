<?php

namespace App\Eloquent;

use App\Contracts\WishlistRepositoryInterface;
use App\Models\Wishlist;
use \Illuminate\Support\Collection;

class WishlistRepository implements WishlistRepositoryInterface {

    public function GetWishlists(string $user_id): Collection {
        return Wishlist::query()->where('user_id', $user_id)->select(['id', 'title', 'user_id'])->with(['products:id,name,description,price', 'products.images:id,url,imageable_id'])->get();
    }
}