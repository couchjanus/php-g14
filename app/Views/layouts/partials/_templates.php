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
