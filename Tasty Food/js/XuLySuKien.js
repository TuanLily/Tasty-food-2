//slider

var arr_hinh = [
  "images/hero-bg.jpg",
  "images/banner_1.png",
  "images/Banner_2.png",
  "images/banner_5.png",
  "images/banner_4.png",
];
var index = 0;

function next() {
  index++;
  if (index >= arr_hinh.length) index = 0;
  var hinh = document.getElementById("hinh");
  hinh.src = arr_hinh[index];
  // document.getElementById("demSo").innerHTML = index + "/" + arr_hinh.length;
}

function prev() {
  index--;
  if (index < 0) index = arr_hinh.length - 1;
  var hinh = document.getElementById("hinh");
  hinh.src = arr_hinh[index];
  // document.getElementById("demSo").innerHTML = index + "/" + arr_hinh.length;
}
// setInterval(next, 4000);

// giõ hàng
const headerCartWrap = document.querySelector(".header-cart-wrap");
const cartDom = document.querySelector(".cart-items");
const totalCount = document.querySelector("#total-counter");
const totalCost = document.querySelector(".total-cost");
const btnAddToCart = document.querySelectorAll(".btn-add-to-cart");
const checkOutBtn = document.querySelector(".check-out-btn");
let cartItems = JSON.parse(localStorage.getItem("cart-items")) || [];
document.addEventListener("DOMContentLoaded", loadData);
checkOutBtn.addEventListener("click", () => {
  alert("Đơn đặt hàng của bạn đã gửi thành công");
  clearCartItems();
});

//btn addtocart

headerCartWrap.addEventListener("click", () => {
  cartDom.classList.toggle("active");
});

btnAddToCart.forEach((btn) => {
  btn.addEventListener("click", () => {
    let parentElement = btn.parentElement;

    const product = {
      id: parentElement.querySelector("#product-id").value,
      name: parentElement.querySelector(".product-name").innerText,
      image: parentElement.querySelector("#image").getAttribute("src"),
      price: parentElement
        .querySelector(".product-price")
        .innerText.replace("$", ""),
      quantity: 1,
    };

    let isIncart =
      cartItems.filter((item) => item.id === product.id).length > 0;

    // check if alreday Exists
    if (!isIncart) {
      addItemToTheDom(product);
    } else {
      alert("Sản phẩm đã có trong giỏ hàng");
      return;
    }

    const cartDomItems = document.querySelectorAll(".cart-item");
    cartDomItems.forEach((individuaItem) => {
      if (individuaItem.querySelector("#product-id").value === product.id) {
        increaseItem(individuaItem, product);
        // decrease
        decreaseItem(individuaItem, product);
        // Removing Element
        removeItem(individuaItem, product);
      }
    });

    cartItems.push(product);
    calculateTotal();
    saveToLocalStorage();
  });
});
function loadData() {
  if (cartItems.length > 0) {
    cartItems.forEach((product) => {
      addItemToTheDom(product);

      const cartDomItems = document.querySelectorAll(".cart-item");

      cartDomItems.forEach((individualItem) => {
        if (individualItem.querySelector("#product-id").value === product.id) {
          // increrase
          increaseItem(individualItem, product);
          // decrease
          decreaseItem(individualItem, product);
          // Removing Element
          removeItem(individualItem, product);
        }
      });
    });
    calculateTotal();
  }
}

function calculateTotal() {
  let total = 0;
  cartItems.forEach((item) => {
    total += item.quantity * item.price;
  });
  totalCost.innerText = total;
  totalCount.innerText = cartItems.length;
}
function saveToLocalStorage() {
  localStorage.setItem("cart-items", JSON.stringify(cartItems));
}
function clearCartItems() {
  localStorage.clear();
  cartItems = [];

  document.querySelectorAll(".cart-items").forEach((item) => {
    item.querySelectorAll(".cart-item").forEach((node) => {
      node.remove();
    });
  });
  cartDom.classList.toggle("active");
  calculateTotal();
}
function addItemToTheDom(product) {
  cartDom.insertAdjacentHTML(
    "afterbegin",
    `  <div class="cart-item">
  <input type="hidden" name="" id="product-id" value="${product.id}" />
  <img src="${product.image}" alt="" id="product-img"  srcset=""/>
  <h4 class="product-name">${product.name}</h4>
  <a class="btn-small" action="giamBot">&minus;</a>
  <h4 class="product_soLuong">${product.quantity}</h4>
  <a class="btn-small" action="tangLen">&plus;</a>
  <a class="product-price">${product.price}</a>
  <a  class="btn-small btn-xoa" action="xoa"
    >&times;</a
  >
</div>`
  );
}

function increaseItem(individuaItem, product) {
  individuaItem
    .querySelector("[action='tangLen']")
    .addEventListener("click", () => {
      cartItems.forEach((cartItem) => {
        if (cartItem.id === product.id) {
          individuaItem.querySelector(".product_soLuong").innerText =
            ++cartItem.quantity;
          calculateTotal();
          saveToLocalStorage();
        }
      });
    });
}
function decreaseItem(individualItem, product) {
  individualItem
    .querySelector("[action='giamBot']")
    .addEventListener("click", () => {
      // all cart items in the dom
      cartItems.forEach((cartItem) => {
        // Actual Array
        if (cartItem.id === product.id) {
          if (cartItem.quantity > 1) {
            individualItem.querySelector(".product_soLuong").innerText =
              --cartItem.quantity;
            calculateTotal();
            saveToLocalStorage();
          } else {
            // removing this element and assign the new elemntos to the old of the array
            console.log(cartItems);

            cartItems = cartItems.filter(
              (newElements) => newElements.id !== product.id
            );
            individualItem.remove();

            calculateTotal();
            saveToLocalStorage();
          }
        }
      });
    });
}
function removeItem(individualItem, product) {
  individualItem
    .querySelector("[action='xoa']")
    .addEventListener("click", () => {
      cartItems.forEach((cartItem) => {
        if (cartItem.id === product.id) {
          cartItems = cartItems.filter(
            (newElements) => newElements.id !== product.id
          );
          individualItem.remove();
          calculateTotal();
          saveToLocalStorage();
        }
      });
    });
}

//phan này là hiệu ứng hover chuột vào  sản phẩm em tham khảo chatgpt

const boxes = document.querySelectorAll(".box");

boxes.forEach((box) => {
  box.addEventListener("mouseenter", () => {
    // Cập nhật thuộc tính CSS cho các thành phần trong box tương ứng
    const image = box.querySelector("#image");
    const title = box.querySelector(".product-name");
    const price = box.querySelector(".product-price");
    const btnAddToCart = box.querySelector(".btn-add-to-cart");

    image.style.transform = "scale(1.1)";
    title.style.color = "#0b3a54";
    price.style.color = "#307d7e";
    btnAddToCart.style.backgroundColor = "#0b3a54";
    btnAddToCart.style.color = "white";

    box.style.backgroundColor = "#fff"; // Thêm dòng này để đổi màu nền
  });

  box.addEventListener("mouseleave", () => {
    // Cập nhật lại thuộc tính CSS cho các thành phần trong box tương ứng
    const image = box.querySelector("#image");
    const title = box.querySelector(".product-name");
    const price = box.querySelector(".product-price");
    const btnAddToCart = box.querySelector(".btn-add-to-cart");

    image.style.transform = "scale(1)";
    title.style.color = "#333";
    price.style.color = "#fff";
    btnAddToCart.style.backgroundColor = "#000000";
    btnAddToCart.style.color = "white";

    box.style.backgroundColor = "white"; // Thêm dòng này để đổi màu nền trở lại sau khi hover
  });
});

// video Lab8 bài 3
var player = document.getElementById("myplayer");
function playpause() {
  if (player.paused) {
    player.play();
  } else {
    player.pause();
  }
}
function stopVideo() {
  player.pause();
  if (player.currentTime) {
    player.currentTime = 0;
  }
}
function replayVideo() {
  player.currentTime = 0;
  player.play();
}
function tangVolume() {
  if (player.volume < 0.9) {
    player.volume += 0.1;
  }
}
function giamVolume() {
  if (player.volume > 0.1) {
    player.volume -= 0.1;
  }
}
function muteVolume() {
  player.muted = !player.muted;
}
