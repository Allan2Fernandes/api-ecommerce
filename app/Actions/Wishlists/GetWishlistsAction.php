<?php

namespace App\Actions\Wishlists;

use App\Contracts\WishlistRepositoryInterface;
use App\Models\Wishlist;
use Illuminate\Support\Collection;
use Lorisleiva\Actions\Concerns\AsAction;

class GetWishlistsAction
{
    use AsAction;

    protected WishlistRepositoryInterface $wishlistRepositoryInterface;

    public function __construct(WishlistRepositoryInterface $wishlistRepositoryInterface) {
        $this->wishlistRepositoryInterface = $wishlistRepositoryInterface;
    }

    /**
     * @return Collection<Wishlist>
     */
    public function handle(string $user_id): Collection
    {
        return $this->wishlistRepositoryInterface->GetWishlists($user_id);
    }
}
