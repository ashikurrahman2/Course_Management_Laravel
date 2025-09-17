@extends('layouts.app')

@section('title','Cart')

@section('content')
<!-- Promo Section Start -->
<section class="promo-sec" style="background: url('{{ asset("frontend/assets/images/promo-bg.jpg") }}') no-repeat center center / cover;">
    <img src="{{ asset('frontend/assets/images/promo-left.png') }}" alt="" class="anim-img">
    <img src="{{ asset('frontend/assets/images/promo-right.png') }}" alt="" class="anim-img anim-right">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="display-2 text-white">Cart</h1>
                <nav aria-label="breadcrumb mt-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cart</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- Promo Section End -->

<!-- Cart Section Start -->
<div class="cart-section sec-padding">
    <div class="container">
        <div class="row">
            <!-- Cart Items -->
            <div class="col-lg-8 wow fadeInLeft">
                <div class="entry-content">
                    <div class="woocommerce rounded bg-shade border">
                        <div class="woocommerce-notices-wrapper"></div>
                        <form class="woocommerce-cart-form" action="#" method="post">
                            <table class="table shop_table shop_table_responsive cart woocommerce-cart-form__contents">
                                <thead class="shadow-sm">
                                    <tr>
                                        <th class="product-thumbnail">Image</th>
                                        <th class="product-name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                        <th class="product-remove">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse(Cart::content() as $item)
                                    <tr class="woocommerce-cart-form__cart-item cart_item">
                                        <td class="product-thumbnail">
                                            <img width="80" src="{{ $item->options->thumbnail ?? asset('frontend/assets/images/default.png') }}" alt="{{ $item->name }}">
                                        </td>
                                        <td class="product-name" data-title="Product">
                                            {{ $item->name }}
                                        </td>
                                        <td class="product-price" data-title="Price">
                                            ${{ number_format($item->course_price, 2) }}
                                        </td>
                                        <td class="product-quantity" data-title="Quantity">
                                            <div class="cart-quanty">
                                                <input class="qty-count" type="text" value="{{ $item->qty }}" readonly>
                                            </div>
                                        </td>
                                        <td class="product-subtotal" data-title="Total">
                                            ${{ number_format($item->subtotal, 2) }}
                                        </td>
                                        <td class="product-remove">
                                            <a href="{{ route('carts.remove', $item->rowId) }}" class="remove">
                                                <i class="feather-icon icon-x"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Your cart is empty!</td>
                                    </tr>
                                    @endforelse

                                    <tr>
                                        <td colspan="6" class="actions cart-form-footer mt-3 p-3">
                                            <div class="bottom-cart d-flex justify-content-between align-items-center flex-wrap">
                                                <a href="{{ route('course') }}" class="btn btn-primary">Continue Shopping</a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Cart Totals -->
            <div class="col-lg-4">
                <aside class="cart-totals ms-lg-4 rounded bg-shade border">
                    <table>
                        <tbody>
                            <tr class="subtotal">
                                <th>Subtotal</th>
                                <td><span class="amount">${{ Cart::subtotal() }}</span></td>
                            </tr>
                            <tr class="shipping-cost">
                                <th>Shipping Cost</th>
                                <td><span class="amount">$0.00</span></td>
                            </tr>
                            <tr class="total">
                                <th>Total</th>
                                <td><strong><span class="amount">${{ Cart::total() }}</span></strong></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-center mt-4">
                        <a href="{{ route('checkout', ['id' => auth()->id() ?? 1]) }}" class="btn btn-primary">
                            Proceed to checkout
                        </a>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>
<!-- Cart Section End -->
@endsection
