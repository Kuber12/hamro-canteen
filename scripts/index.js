
  var food;

  displayProduct();

  function displayProduct() {
    var menuItems;

    $.ajax({
      url: "./phpactions/displayItemFetch.php",
      method: "GET",
      dataType: "json",
      success: function(response) {
        for (var i = 0; i < response.length; i++) {
          $("#menu-display").append(`
            <div class="product">
              <form class="productfrm">
                <img src="./assets/itemimage/${response[i].itemImg}" alt="Product Image" class="product-image">
                <span class="item-name">${response[i].itemName}</span>
                <span class="price">RS. ${response[i].itemPrice}</span>
                <div class="quantity">
                  <span>Quantity: 
                    <button type="submit" class="qty-change-btn minus-btn${i}" id="minus-btn" onclick="change(${i}, 0);submitForm(event);" disabled>
                      <i class="fa-solid fa-square-minus fa-lg minus"></i>
                    </button>
                    <input type="number" name="productQty" value="1" class="productQty${i}" id="productQty${i}" readonly>
                    <button type="submit" class="qty-change-btn plus-btn${i}" onclick="change(${i}, 1);submitForm(event);">
                      <i class="fa-solid fa-square-plus fa-lg"></i>
                    </button>
                  </span>
                </div>
                <div class="btn-holder">
                  <input type="hidden" name="imageUrl" value="${response[i].itemImg}" />
                  <input type="hidden" name="foodName" value="${response[i].itemName}" />
                  <input type="hidden" name="price" value="${response[i].itemPrice}" />
                  <input type="hidden" name="foodID" value="${response[i].itemID}" />
                  <input type="hidden" name="add-to-cart" value="${i}" />
                  <button class="add-to-cart-btn" name="add-to-cart"><i class="fa-solid fa-cart-plus"></i> Add to Cart</button>
                </div>
              </form>
            </div>
          `);
        }
      },
    });
  }

  function clearItem(itemId, Total) {
    $("#" + itemId).remove();
    Grandtotal = Grandtotal - Total;
    $("#gTotal").html(Grandtotal);
  }

  function submitForm(event) {
    event.preventDefault();
  }

  function paymentOption() {
    openOption();
    $("#payment_option").html(`
      <h2>Choose Payment Options</h2>
      <button onclick="window.location.href = './checkout.php';">Cash</button>
      <button onclick="alert('it will be activated after e-sewa integration')">E-Sewa</button>
      <button onclick="closeOptions();">Cancel</button>
      <i class="fa-solid fa-circle-xmark fa-xl" id="close" onclick="closeOptions();"></i>
    `);
  }

  function change(productId, buttonId) {
    var minusBtn = $(".minus-btn" + productId);
    var plusBtn = $(".plus-btn" + productId);
    var quantity = $(".productQty" + productId).val();

    if (buttonId == 1) {
      quantity++;
      $(".productQty" + productId).val(quantity);
    }
    if (buttonId == 0) {
      quantity--;
      $(".productQty" + productId).val(quantity);
    }

    if (quantity <= 1) {
      minusBtn.prop("disabled", true).css("cursor", "not-allowed");
    } else if (quantity >= 15) {
      plusBtn.prop("disabled", true).css("cursor", "not-allowed");
    } else {
      minusBtn.prop("disabled", false).css("cursor", "pointer");
      plusBtn.prop("disabled", false).css("cursor", "pointer");
    }
  }



