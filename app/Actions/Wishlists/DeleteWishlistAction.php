<?php

namespace App\Actions\Wishlists;

use App\Contracts\WishlistRepositoryInterface;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteWishlistAction
{
    use AsAction;

    protected WishlistRepositoryInterface $wishlistRepositoryInterface;

    public function __construct(WishlistRepositoryInterface $wishlistRepositoryInterface) {
        $this->wishlistRepositoryInterface = $wishlistRepositoryInterface;
    }

    public function handle(string $wishlist_id)
    {
        $this->wishlistRepositoryInterface->DeleteWishlist($wishlist_id);
    }
}
