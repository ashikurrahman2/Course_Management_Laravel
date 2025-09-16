@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
 <!-- Promo Section Start -->
   <section class="promo-sec" style="background: url('images/promo-bg.jpg')no-repeat center center / cover;">
      <img src="images/promo-left.png" alt="" class="anim-img">
      <img src="images/promo-right.png" alt="" class="anim-img anim-right">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 text-center">
               <h1 class="display-2 text-white">Checkout</h1>
               <nav aria-label="breadcrumb mt-0">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="/">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                  </ol>
               </nav>
            </div>
         </div>
      </div>
   </section>
   <!-- Promo Section End -->

   <!-- Checkout Section Start -->
   <section class="checkout-section sec-padding">
      <div class="container">
         <div class="row checkout-coupon mb-5 pb-4">
            <div class="col-lg-7 mb-2 mb-lg-0">
               <div class="bg-shade p-4 rounded-4 me-lg-2 coupon-wrap">
                  <h6> Have a coupon?
                     <button type="button" data-bs-toggle="collapse" data-bs-target="#checkoutCouponform"
                        aria-expanded="false" aria-controls="checkoutCouponform">Click
                        here and enter your code.</button>
                  </h6>

                  <div class="collapse mt-4" id="checkoutCouponform">
                     <form action="#" class="checkout-couponform d-sm-flex justify-content-between">
                        <input class="ps-4 form-control" type="text" id="coupon-field" placeholder="Enter coupon code"
                           required="required">
                        <button type="submit" class="btn btn-primary mt-2 mt-sm-0">Apply Coupon </button>
                     </form>
                  </div>
               </div>
            </div>
            <div class="col-lg-5">
               <div class="bg-shade p-4 rounded-4 ms-xl-5">
                  <h6> Returning Customer?
                     <button type="button" data-bs-toggle="collapse" data-bs-target="#checkout-login"
                        aria-expanded="false" aria-controls="checkout-login">Click
                        here to login</button>
                  </h6>
                  <div class="collapse mt-4" id="checkout-login">
                     <form action="#">
                        <div class="col-12 mb-2">
                           <input type="text" placeholder="Username or Email">
                        </div>
                        <div class="col-12">
                           <input type="password" placeholder="Password">
                        </div>
                        <button class="btn btn-primary mt-3" type="submit">Log in</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>

         <form action="#" class="form checkout-form">
            <div class="row">
               <div class="col-lg-8 col-sm-12">
                  <h3 class="sub-title">Billing Details:</h3>
                  <!-- Billing Form -->
                  <div class="checkout-billingform bg-shade border rounded p-lg-5 p-3 mt-5">
                     <div class="row">
                        <div class="col-lg-6">
                           <label for="billingform-firstname">First name*</label>
                           <input type="text" id="billingform-firstname" placeholder="First Name" required="">
                        </div>
                        <div class="col-lg-6">
                           <label for="billingform-lastname">Last name*</label>
                           <input type="text" id="billingform-lastname" placeholder="Last Name" required="">
                        </div>
                        <div class="col-lg-6">
                           <label for="billingform-country">Country</label>
                           <select name="billingform-country" id="billingform-country">
                              <option value="usa">United States</option>
                              <option value="mx">Mexico</option>
                              <option value="as">Australia</option>
                              <option value="gr">Germany</option>
                              <option value="sw">Sweden</option>
                              <option value="fr">France</option>
                           </select>
                        </div>
                        <div class="col-lg-6">
                           <label for="billingform-street">Street address *</label>
                           <input type="text" id="billingform-street" placeholder="Street address">
                        </div>
                        <div class="col-lg-6">
                           <label for="billingform-state">State:</label>
                           <input type="text" id="billingform-state" placeholder="State">
                        </div>
                        <div class="col-lg-6">
                           <label for="billingform-postcode">Postcode:</label>
                           <input type="text" id="billingform-postcode" placeholder="Postcode">
                        </div>
                        <div class="col-lg-6">
                           <label for="billingform-phone">Phone</label>
                           <input type="text" id="billingform-phone" placeholder="Phone">
                        </div>
                        <div class="col-lg-6">
                           <label for="billingform-email">Email Address</label>
                           <input type="email" id="billingform-email" placeholder="Email Address">
                        </div>

                        <div class="col-12">
                           <label for="billingform-company1">Company (Optional)</label>
                           <input type="text" id="billingform-company1" placeholder="Company ">
                        </div>
                        <div class="col-12">
                           <label for="message-order">Order notes (Optional)</label>
                           <textarea name="message-order" rows="6" id="message-order"
                              placeholder="Order message"></textarea>
                        </div>
                     </div>
                     <!-- Different Ship Address Form -->
                     <div class="col-12  mt-4">
                        <input type="checkbox" name="billform-dirrentswitch" id="billform-dirrentswitch">

                        <label for="billform-dirrentswitch" data-bs-toggle="collapse" href="#collapseExample"
                           aria-expanded="false" aria-controls="collapseExample">Ship to another
                           Address</label>
                     </div>
                     <div class="collapse row" id="collapseExample">
                        <div class="col-lg-6">
                           <label for="shipform-firstname2">First name*</label>
                           <input type="text" id="shipform-firstname2" placeholder="First Name" required="">
                        </div>
                        <div class="col-lg-6">
                           <label for="shipform-lastname">Last name*</label>
                           <input type="text" id="shipform-lastname" placeholder="Last Name" required="">
                        </div>
                        <div class="col-lg-6">
                           <label for="shipform-country">Country</label>
                           <select name="shipform-country" id="shipform-country">
                              <option value="usa">United States</option>
                              <option value="mx">Mexico</option>
                              <option value="as">Australia</option>
                              <option value="gr">Germany</option>
                              <option value="sw">Sweden</option>
                              <option value="fr">France</option>
                           </select>
                        </div>
                        <div class="col-lg-6">
                           <label for="shipform-street">Street address *</label>
                           <input type="text" id="shipform-street" placeholder="Street address">
                        </div>
                        <div class="col-lg-6">
                           <label for="shipform-state">State:</label>
                           <input type="text" id="shipform-state" placeholder="State">
                        </div>
                        <div class="col-lg-6">
                           <label for="shipform-postcode">Postcode:</label>
                           <input type="text" id="shipform-postcode" placeholder="Postcode">
                        </div>
                        <div class="col-lg-6">
                           <label for="shipform-phone">Phone</label>
                           <input type="text" id="shipform-phone" placeholder="Phone">
                        </div>
                        <div class="col-lg-6">
                           <label for="shipform-email">Email Address</label>
                           <input type="email" id="shipform-email" placeholder="Email Address">
                        </div>

                        <div class="clearfix"></div>
                        <div class="col-12">
                           <label for="shipform-company">Company (Optional)</label>
                           <input type="text" id="shipform-company" placeholder="Company">
                        </div>
                        <div class="col-12">
                           <label for="order-note2">Order notes (Optional)</label>
                           <textarea name="name" rows="6" id="order-note2" placeholder="Order message"></textarea>
                        </div>
                     </div>
                     <!--// Different Address Form -->
                  </div>
                  <!--// Billing Form -->
               </div>
               <div class="col-lg-4 col-sm-8">
                  <aside class="order-summery ms-xl-5">
                     <h3 class="sub-title">Your order</h3>
                     <!-- Cart Total Start -->
                     <div class="cart-totals mt-5 bg-shade p-4 rounded border">
                        <table>
                           <tbody>
                              <tr>
                                 <th>Products</th>
                                 <td>Subtotals:</td>
                              </tr>
                              <tr class="product-list">
                                 <th>Jabra Elite 75t</th>
                                 <td>$40.00</td>
                              </tr>
                              <tr class="product-list">
                                 <th>Jabra Elite 75t</th>
                                 <td>$40.00</td>
                              </tr>
                              <tr class="product-list">
                                 <th>Jabra Elite 75t</th>
                                 <td>$40.00</td>
                              </tr>
                              <tr class="subtotal">
                                 <th>Subtotal</th>
                                 <td><span class="amount">$242.00</span></td>
                              </tr>
                              <tr class="shipping-cost">
                                 <th>Shipping Cost</th>
                                 <td><span class="amount">$50.00</span></td>
                              </tr>
                              <tr class="total">
                                 <th>Total</th>
                                 <td><strong><span class="amount">$292.00</span></strong></td>
                              </tr>
                           </tbody>
                        </table>
                        <div class="accordion payment-options" id="accordionExample">
                           <div class="payment-option">
                              <h2 class="accordion-header" id="headingOne">
                                 <button class="accordion-button rounded-3" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Direct Bank Transfer
                                 </button>
                              </h2>
                              <div id="collapseOne" class="accordion-collapse collapse mt-4 px-2 show"
                                 aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                 <strong>Note:</strong> Pay your payment directly into to our bank
                                 account.Your order will
                                 not
                                 be shipped until the funds have cleared in our account.
                              </div>
                           </div>
                           <div class="payment-option">
                              <h2 class="accordion-header" id="headingTwo">
                                 <button class="accordion-button rounded-3" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                    Cash On Delivery (COD)
                                 </button>
                              </h2>
                              <div id="collapseTwo" class="accordion-collapse collapse mt-4 px-2"
                                 aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                 <strong>Note:</strong> Make your payment directly into to our bank account.
                                 Your order will not
                                 be shipped until the funds have cleared in our account.
                              </div>
                           </div>

                        </div>
                        <div class="text-center mt-4">
                           <a href="checkout.html" class="btn btn-primary d-block">Place Your Order</a>
                        </div>
                     </div>
                     <!-- Cart Total End -->
                  </aside>
               </div> <!-- Col End -->
            </div>
         </form>
      </div>
      <!--// Checkout Area -->
   </section>
   <!-- Checkout Section End -->
@endsection