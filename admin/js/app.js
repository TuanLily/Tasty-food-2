const checkAll = document.querySelector("#checkAll");
const checkBoxes = document.querySelectorAll(".checkbox");
const chon = document.querySelector(".chon");
const bochon = document.querySelector(".bochon");

checkAll.onclick = () => {
  checkBoxes.forEach((checkBox) => {
    if (checkAll.checked == true) {
      checkBox.checked = true;
      chon.style.display = "none";
      bochon.style.display = "inline";
    } else {
      checkBox.checked = false;
      chon.style.display = "inline";
      bochon.style.display = "none";
    }
  });
};
