<!-- Cart Drawer -->
  <div class="aside aside_right overflow-hidden cart-drawer" id="cartDrawer">
    <div class="aside-header d-flex align-items-center">
      <h3 class="text-uppercase fs-6 mb-0">SHOPPING BAG ( <span class="cart-amount js-cart-items-count">1</span> ) </h3>
      <button class="btn-close-lg js-close-aside btn-close-aside ms-auto"></button>
    </div><!-- /.aside-header -->

    <div class="aside-content cart-drawer-items-list">
      <div class="cart-drawer-item d-flex position-relative">
        <div class="position-relative">
          <a href="product1_simple.html">
            <img loading="lazy" class="cart-drawer-item__img" src="../images/cart-item-1.jpg" alt="">
          </a>
        </div>
        <div class="cart-drawer-item__info flex-grow-1">
          <h6 class="cart-drawer-item__title fw-normal"><a href="product1_simple.html">Zessi Dresses</a></h6>
          <p class="cart-drawer-item__option text-secondary">Color: Yellow</p>
          <p class="cart-drawer-item__option text-secondary">Size: L</p>
          <div class="d-flex align-items-center justify-content-between mt-1">
            <div class="qty-control position-relative">
              <input type="number" name="quantity" value="1" min="1" class="qty-control__number border-0 text-center">
              <div class="qty-control__reduce text-start">-</div>
              <div class="qty-control__increase text-end">+</div>
            </div><!-- .qty-control -->
            <span class="cart-drawer-item__price money price">$99</span>
          </div>
        </div>

        <button class="btn-close-xs position-absolute top-0 end-0 js-cart-item-remove"></button>
      </div><!-- /.cart-drawer-item d-flex -->

      <hr class="cart-drawer-divider">

      <div class="cart-drawer-item d-flex position-relative">
        <div class="position-relative">
          <a href="product1_simple.html">
            <img loading="lazy" class="cart-drawer-item__img" src="../images/cart-item-2.jpg" alt="">
          </a>
        </div>
        <div class="cart-drawer-item__info flex-grow-1">
          <h6 class="cart-drawer-item__title fw-normal"><a href="product1_simple.html">Kirby T-Shirt</a></h6>
          <p class="cart-drawer-item__option text-secondary">Color: Black</p>
          <p class="cart-drawer-item__option text-secondary">Size: XS</p>
          <div class="d-flex align-items-center justify-content-between mt-1">
            <div class="qty-control position-relative">
              <input type="number" name="quantity" value="4" min="1" class="qty-control__number border-0 text-center">
              <div class="qty-control__reduce text-start">-</div>
              <div class="qty-control__increase text-end">+</div>
            </div><!-- .qty-control -->
            <span class="cart-drawer-item__price money price">$89</span>
          </div>
        </div>

        <button class="btn-close-xs position-absolute top-0 end-0 js-cart-item-remove"></button>
      </div><!-- /.cart-drawer-item d-flex -->

      <hr class="cart-drawer-divider">

      <div class="cart-drawer-item d-flex position-relative">
        <div class="position-relative">
          <a href="product1_simple.html">
            <img loading="lazy" class="cart-drawer-item__img" src="../images/cart-item-3.jpg" alt="">
          </a>
        </div>
        <div class="cart-drawer-item__info flex-grow-1">
          <h6 class="cart-drawer-item__title fw-normal"><a href="product1_simple.html">Cableknit Shawl</a></h6>
          <p class="cart-drawer-item__option text-secondary">Color: Green</p>
          <p class="cart-drawer-item__option text-secondary">Size: L</p>
          <div class="d-flex align-items-center justify-content-between mt-1">
            <div class="qty-control position-relative">
              <input type="number" name="quantity" value="3" min="1" class="qty-control__number border-0 text-center">
              <div class="qty-control__reduce text-start">-</div>
              <div class="qty-control__increase text-end">+</div>
            </div><!-- .qty-control -->
            <span class="cart-drawer-item__price money price">$129</span>
          </div>
        </div>

        <button class="btn-close-xs position-absolute top-0 end-0 js-cart-item-remove"></button>
      </div><!-- /.cart-drawer-item d-flex -->

    </div><!-- /.aside-content -->

    <div class="cart-drawer-actions position-absolute start-0 bottom-0 w-100">
      <hr class="cart-drawer-divider">
      <div class="d-flex justify-content-between">
        <h6 class="fs-base fw-medium">SUBTOTAL:</h6>
        <span class="cart-subtotal fw-medium">$176.00</span>
      </div><!-- /.d-flex justify-content-between -->
      <a href="shop_cart.html" class="btn btn-light mt-3 d-block">View Cart</a>
      <a href="shop_checkout.html" class="btn btn-primary mt-3 d-block">Checkout</a>
    </div><!-- /.aside-content -->
  </div><!-- /.aside -->
  <!-- Newsletter Popup -->
  <div class="modal fade" id="newsletterPopup" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog newsletter-popup modal-dialog-centered">
      <div class="modal-content">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="row p-0 m-0">
          <div class="col-md-6 p-0 d-none d-md-block">
            <div class="newsletter-popup__bg h-100 w-100">
              <img loading="lazy" src="../images/newsletter-popup.jpg" class="h-100 w-100 object-fit-cover d-block" alt="">
            </div>
          </div>
          <div class="col-md-6 p-0 d-flex align-items-center">
            <div class="block-newsletter w-100">
              <h3 class="block__title">Sign Up to Our Newsletter</h3>
              <p>Be the first to get the latest news about trends, promotions, and much more!</p>
              <form action="https://uomo-html.flexkitux.com/Demo17/index.html" class="footer-newsletter__form position-relative bg-body">
                <input class="form-control border-2" type="email" name="email" placeholder="Your email address">
                <input class="btn-link fw-medium bg-transparent position-absolute top-0 end-0 h-100" type="submit" value="JOIN">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- /.newsletter-popup position-fixed -->