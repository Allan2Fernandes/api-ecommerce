<?php

namespace App\Actions\Wishlists;

use App\Contracts\WishlistRepositoryInterface;
use App\Data\CreateWishlistData;
use App\Models\Wishlist;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateWishlistAction
{
    use AsAction;

    protected WishlistRepositoryInterface $wishlistRepositoryInterface;

    public function __construct(WishlistRepositoryInterface $wishlistRepositoryInterface) {
        $this->wishlistRepositoryInterface = $wishlistRepositoryInterface;
    }

    public function handle(CreateWishlistData $data): Wishlist
    {
        return $this->wishlistRepositoryInterface->CreateWishlist($data);
    }
}
