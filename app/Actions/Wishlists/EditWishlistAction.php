<?php

namespace App\Actions\Wishlists;

use App\Contracts\WishlistRepositoryInterface;
use App\Data\EditWishlistData;
use App\Models\Wishlist;
use Lorisleiva\Actions\Concerns\AsAction;

class EditWishlistAction
{
    use AsAction;

    protected WishlistRepositoryInterface $wishlistRepositoryInterface;

    public function __construct(WishlistRepositoryInterface $wishlistRepositoryInterface) {
        $this->wishlistRepositoryInterface = $wishlistRepositoryInterface;
    }

    public function handle(string $id, EditWishlistData $data): Wishlist
    {
        $wishlist = $this->wishlistRepositoryInterface->EditWishlist($id, $data);
        return $wishlist;
    }
}
