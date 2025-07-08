;(($) => {
  // Declare farmfresh_ajax variable
  const farmfresh_ajax = {
    ajax_url: "your_ajax_url_here",
    nonce: "your_nonce_here",
  }

  // DOM Ready
  $(document).ready(() => {
    initMobileMenu()
    initSearch()
    initProductActions()
    initNewsletter()
    initScrollEffects()
    initProductGallery()
    initQuantitySelector()
  })

  // Mobile Menu
  function initMobileMenu() {
    $(".mobile-menu-toggle").on("click", function () {
      $(this).toggleClass("active")
      $(".main-navigation").toggleClass("active")
    })
  }

  // Search functionality
  function initSearch() {
    $(".search-form").on("submit", (e) => {
      const searchTerm = $(".search-field").val().trim()
      if (!searchTerm) {
        e.preventDefault()
        $(".search-field").focus()
      }
    })
  }

  // Product Actions
  function initProductActions() {
    // Add to Cart
    $(".add-to-cart-btn").on("click", function (e) {
      e.preventDefault()

      const $button = $(this)
      const productId = $button.data("product-id")
      const originalText = $button.html()

      $button.html('<i class="icon-loading"></i> Adding...').prop("disabled", true)

      $.ajax({
        url: farmfresh_ajax.ajax_url,
        type: "POST",
        data: {
          action: "farmfresh_add_to_cart",
          product_id: productId,
          quantity: 1,
          nonce: farmfresh_ajax.nonce,
        },
        success: (response) => {
          if (response.success) {
            $button.html('<i class="icon-check"></i> Added')
            $(".cart-count").text(response.data.cart_count)

            // Show success message
            showNotification("Product added to cart!", "success")

            // Reset button after 2 seconds
            setTimeout(() => {
              $button.html(originalText).prop("disabled", false)
            }, 2000)
          } else {
            showNotification("Failed to add product to cart", "error")
            $button.html(originalText).prop("disabled", false)
          }
        },
        error: () => {
          showNotification("Something went wrong", "error")
          $button.html(originalText).prop("disabled", false)
        },
      })
    })

    // Wishlist
    $(".wishlist-btn").on("click", function (e) {
      e.preventDefault()

      const $button = $(this)
      const productId = $button.data("product-id")

      $button.toggleClass("active")

      if ($button.hasClass("active")) {
        showNotification("Added to wishlist!", "success")
      } else {
        showNotification("Removed from wishlist", "info")
      }
    })
  }

  // Newsletter Signup
  function initNewsletter() {
    $("#newsletter-form").on("submit", function (e) {
      e.preventDefault()

      const $form = $(this)
      const $input = $form.find('input[name="email"]')
      const $button = $form.find('button[type="submit"]')
      const email = $input.val().trim()

      if (!isValidEmail(email)) {
        showNotification("Please enter a valid email address", "error")
        return
      }

      $button.html("Subscribing...").prop("disabled", true)

      $.ajax({
        url: farmfresh_ajax.ajax_url,
        type: "POST",
        data: {
          action: "farmfresh_newsletter",
          email: email,
          nonce: farmfresh_ajax.nonce,
        },
        success: (response) => {
          if (response.success) {
            showNotification("Successfully subscribed to newsletter!", "success")
            $input.val("")
          } else {
            showNotification(response.data || "Subscription failed", "error")
          }
          $button.html("Subscribe").prop("disabled", false)
        },
        error: () => {
          showNotification("Something went wrong", "error")
          $button.html("Subscribe").prop("disabled", false)
        },
      })
    })
  }

  // Scroll Effects
  function initScrollEffects() {
    $(window).on("scroll", function () {
      const scrollTop = $(this).scrollTop()

      // Header shadow on scroll
      if (scrollTop > 10) {
        $(".site-header").addClass("scrolled")
      } else {
        $(".site-header").removeClass("scrolled")
      }
    })
  }

  // Product Image Gallery
  function initProductGallery() {
    $(".product-gallery img").on("click", function () {
      const src = $(this).attr("src")
      $(".product-main-image img").attr("src", src)
    })
  }

  // Quantity Selector
  function initQuantitySelector() {
    $(".quantity-btn").on("click", function () {
      const $input = $(this).siblings('input[type="number"]')
      const currentVal = Number.parseInt($input.val()) || 1
      const isIncrement = $(this).hasClass("quantity-plus")

      if (isIncrement) {
        $input.val(currentVal + 1)
      } else if (currentVal > 1) {
        $input.val(currentVal - 1)
      }
    })
  }

  // Utility Functions
  function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
    return emailRegex.test(email)
  }

  function showNotification(message, type = "info") {
    const $notification = $('<div class="notification notification-' + type + '">' + message + "</div>")

    $("body").append($notification)

    setTimeout(() => {
      $notification.addClass("show")
    }, 100)

    setTimeout(() => {
      $notification.removeClass("show")
      setTimeout(() => {
        $notification.remove()
      }, 300)
    }, 3000)
  }
})(window.jQuery)

// CSS for notifications
const notificationCSS = `
.notification {
    position: fixed;
    top: 20px;
    right: 20px;
    padding: 1rem 1.5rem;
    border-radius: 8px;
    color: white;
    font-weight: 600;
    z-index: 9999;
    transform: translateX(100%);
    transition: transform 0.3s ease;
}

.notification.show {
    transform: translateX(0);
}

.notification-success {
    background-color: #10b981;
}

.notification-error {
    background-color: #ef4444;
}

.notification-info {
    background-color: #3b82f6;
}

.site-header.scrolled {
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}
`

// Inject notification CSS
const style = document.createElement("style")
style.textContent = notificationCSS
document.head.appendChild(style)
