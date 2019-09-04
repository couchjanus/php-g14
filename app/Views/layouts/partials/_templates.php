<template id="cartItem">
    <div class="cart-item">
      <div class="item item-name"><span class="item-title"></span><i class="far fa-times-circle float-right remove-item"></i></div>
      <div class="item item-img"></div>
      
      <div class="item item-quontity">
        <i class="fas fa-minus-circle adding minus"></i>
        <span class="adding quontity">1</span>
        <i class="fas fa-plus-circle adding plus"></i>
      </div>
      <div class="item">$<span class="item-price">00.00</span></div>
    </div>
</template>

<template id="productItem">
    <div class="col-md-4">
      <div class="card mb-4 box-shadow">
        <div class="win"><h2>You are win!</h2></div>
        <img class="card-img-top" src="" alt="Card image cap">
        <div class="card-body">
          <h4 class="float-right">$<span class="product-price">55.00</span></h4>
          <h4 class="product-name">Fierst product</h4>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
            additional content. This content is a little bit longer.</p>

          <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
              <button type="button" class="btn btn-sm btn-outline-secondary view-detail">View Detail</button>
              <button type="button" class="btn btn-sm btn-outline-secondary add-to-cart">Add To Cart</button>
            </div>
            <small class="text-muted">31 reviews</small>
          </div>

        </div>
      </div>
    </div>
</template>

<template id="carouselItem">
    <div class="carousel-detail-item">
      <div class="carousel-item__image"></div>
      <div class="carousel-item__info">
          <div class="carousel-item__container">
              <h2 class="carousel-item__subtitle">The grand mom </h2>
              <h1 class="carousel-item__title">Je t'adore</h1>
              <p class="carousel-item__description">Sed ut perspiciatis unde omnis iste natus error sit
                  voluptatem
                  accusantium doloremque laudantium, totam rem aperiam.</p>
              <a href="#" class="carousel-item__btn">Explore now</a>
          </div>
      </div>
  </div>
</template>

<template id="productDetail">
    <div class="carousel-wrapper">
        <div class="carousel-detail">
            <div class="carousel__nav">
                <span id="moveLeft" class="carousel__arrow">
                    <svg class="carousel__icon" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z"></path>
                    </svg>
                </span>
                <span id="moveRight" class="carousel__arrow">
                    <svg class="carousel__icon" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"></path>
                    </svg>
                </span>
            </div>
            
        </div>
    </div>
</template>


<template id="order-form">
    <div class="form-wrapper">
        <div class="order-card">
            <div class="step"">
            <div class=" title">
                <h1>Finalize Order</h1>
            </div>
        </div>
        <div class="content" id="final_products">
            <div class="left" id="ordered">
                <div class="products">
                    <div class="product_details">
                        <span class="product_name">Your Order:</span>
                        <span class="price">00.00</span>
                    </div>
                </div>
                <div class="totals">
                    <span class="subtitle">Subtotal <span id="sub_price">$45.00</span></span>
                    <span class="subtitle">Tax <span class="sub_tax" id="sub_tax">$2.00</span></span>
                    <span class="subtitle">Shipping <span class="sub_ship id="sub_ship">$4.00</span></span>
                </div>
                <div class="final">
                    <span class="title">Total <span id="calculated_total">$51.00</span></span>
                </div>
            </div>
            <div class="right" id="reviewed">

                <div class="billing">
                    <span class="title">Billing Information:</span>
                    <form class="go-right" id="payorder">
                        <div>
                            <input type="name" name="first_name" value="" id="first_name" placeholder="John"
                                data-trigger="change" data-validation-minlength="1" data-type="name"
                                data-required="true" data-error-message="Enter Your First Name" /><label
                                for="first_name">First Name</label>
                        </div>
                        <div>
                            <label for="last_name">Last Name</label>
                            <input type="name" name="last_name" value="" id="last_name" placeholder="Smith"
                                data-trigger="change" data-validation-minlength="1" data-type="name"
                                data-required="true" data-error-message="Enter Your Last Name" /><label
                                for="last_name">Last Name</label>
                        </div>
                        <div>
                            <input type="phone" name="phone_number" value="" id="phone_number"
                                placeholder="(555)-867-5309" data-trigger="change" data-validation-minlength="1"
                                data-type="number" data-required="true"
                                data-error-message="Enter Your Telephone Number" /><label
                                for="phone_number">Telephone</label>
                        </div>
                    </form>

                </div>


                <div class="complete">
                    <a class="big_button" id="complete" href="#">Complete Order</a>
                    <span class="sub">By selecting this button you agree to the purchase and subsequent payment for
                        this order.</span>
                </div>
            </div>
        </div>
    </div>
    </div>

</template>