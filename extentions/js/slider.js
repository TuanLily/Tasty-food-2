//slider

var arr_hinh = [
  "./extentions/images/hero-bg.jpg",
  "./extentions/images/banner_1.png",
  "./extentions/images/Banner_2.png",
  "./extentions/images/banner_5.png",
  "./extentions/images/banner_4.png",
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

// Thiết lập chuyển ảnh tự động mỗi 4 giây
var intervalId = setInterval(next, 4000);

// Dừng chuyển ảnh tự động khi người dùng hover chuột vào ảnh
document.getElementById("hinh").addEventListener("mouseenter", function () {
  clearInterval(intervalId);
});

// Tiếp tục chuyển ảnh tự động khi người dùng rời chuột khỏi ảnh
document.getElementById("hinh").addEventListener("mouseleave", function () {
  intervalId = setInterval(next, 4000);
});
