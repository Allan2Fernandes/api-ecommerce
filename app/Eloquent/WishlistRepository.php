<?php

namespace App\Eloquent;

use App\Contracts\WishlistRepositoryInterface;
use App\Data\CreateWishlistData;
use App\Models\Wishlist;
use App\Models\WishlistItem;
use \Illuminate\Support\Collection;
use Illuminate\Support\Str;

class WishlistRepository implements WishlistRepositoryInterface {

    public function GetWishlists(string $user_id): Collection {
        return Wishlist::query()->where('user_id', $user_id)->select(['id', 'title', 'user_id'])->with(['products:id,name,description,price', 'products.images:id,url,imageable_id'])->get();
    }

    public function DeleteWishlist(string $wishlist_id): void {
        WishlistItem::query()->where('wishlist_id', $wishlist_id)->delete();
        Wishlist::query()->where('id', $wishlist_id)->delete();
    }

    public function CreateWishlist(CreateWishlistData $data): Wishlist {
        $id = (string)Str::uuid();
        Wishlist::create(array_merge($data->toArray(), ['id' => $id]));
        $wishlist = Wishlist::query()->where('id', $id)->select(['id', 'title', 'user_id'])->with(['products:id,name,description,price', 'products.images:id,url,imageable_id'])->firstOrFail();
        return $wishlist;
    }
}