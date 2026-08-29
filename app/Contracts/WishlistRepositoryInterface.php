<?php

namespace App\Contracts;

use App\Data\CreateWishlistData;
use Illuminate\Support\Collection;
use App\Models\Wishlist;

interface WishlistRepositoryInterface {

    /**
     * Summary of GetWishlists
     * @return Collection<Wishlist>
     */
    public function GetWishlists(string $user_id): Collection;

    public function DeleteWishlist(string $wishlist_id): void;

    public function CreateWishlist(CreateWishlistData $data): Wishlist;
}