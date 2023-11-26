<div class="khung_thông_tin_dat_ban">
  <div class="order-info">
    <div class="boxtitle">THÔNG TIN NGƯỜI ĐẶT BÀN</div>
    <div class="boxcontent">
      <div class="padding_margin">
        <table class="user-table">
          <tr>
            <td>Người đặt hàng:</td>
            <td><?php echo $ten_kh; ?></td>
          </tr>

          <tr>
            <td>Email:</td>
            <td><?php echo $email; ?></td>
          </tr>

          <tr>
            <td>Điện thoại:</td>
            <td><?php echo $sdt; ?></td>
          </tr>

          <tr>
            <td>Số người:</td>
            <td><?php echo $so_nguoi; ?></td>
          </tr>

          <tr>
            <td>Thời gian đặt bàn:</td>
            <td><?php echo $thoi_gian_dat_ban; ?></td>
          </tr>
        </table>
      </div>


      <div class="boxtitle_thong_tin_gio_hang">THÔNG TIN MÓN ĂN</div>
      <div class="boxcontent_thong_tin_gio_hang">
          <table class="bang_thongtin_mon_an">
            <thead>
              <tr>
                <th>Hình ảnh</th>
                <th>Tên món ăn</th>
                <th>Giá bán</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($selectedItems as $item) : ?>
                <tr>
                  <td><img src="<?php echo $item['hinh']; ?>" alt="Hình ảnh"></td>
                  <td><?php echo $item['ten']; ?></td>
                  <td><?php echo number_format($item['gia'], 0, ',', '.') . 'đ'; ?></td>
                  <td><?php echo $item['so_luong']; ?></td>
                  <td><?php echo number_format($item['thanh_tien'], 0, ',', '.') . 'đ'; ?></td>
                </tr>
              <?php endforeach; ?>
              <tr>
                <td colspan="4" align="right"><strong>Tổng thành tiền:</strong></td>
                <td><?php echo number_format($totalPrice, 0, ',', '.') . 'đ'; ?></td>
              </tr>
            </tbody>
          </table>
          <br>




      </div>


    </div>
  </div>
  <div class="payment-info">
    <div class="boxtitle">PHƯƠNG THỨC THANH TOÁN</div>
    <div class="boxcontent">
      <table>
        <tr>
          <td>Tạm tính</td>
        </tr>
        <tr>
          <td>Khuyến mãi</td>
        </tr>
      </table>
      <hr class="hr_thong_tin_dat_ban">
      <table>
        <tr>
          <td>Tổng cộng(VAT)</td>
        </tr>
      </table>
      <hr class="hr_thong_tin_dat_ban">
      <table>
        <tr>
          <td><input type="radio" name="payment-method" value="cash" checked />Thanh toán tại nhà hàng</td>
        </tr>
        <tr>
          <td><input type="radio" name="payment-method" value="bank-transfer" />Chuyển khoản ngân hàng</td>
        </tr>
        <tr>
          <td><input type="radio" name="payment-method" value="online-payment" />Thanh toán Momo</td>
        </tr>
      </table>
      <hr class="hr_thong_tin_dat_ban">
      <table>
        <tr>
          <td><input type="radio" name="payment-method" value="cash" checked />Thanh toán toàn bộ</td>
        </tr>
        <tr>
          <td><input type="radio" name="payment-method" value="bank-transfer" />Đặt cọc một phần</td>
        </tr>
      </table>
      <button class="btn-thanh-toan">Thanh toán</button>
    </div>
  </div>
</div>
<!-- <style>
  .khung_thông_tin_dat_ban {
    display: flex;
    justify-content: space-between;
    gap: 20px;
    width: 80%;
    margin: 0 auto;
  }

  /* .khung_thông_tin_dat_ban td:last-child {
    text-align: left;
  } */

  .khung_thông_tin_dat_ban td {
    padding: 10px;
    border-bottom: none;
  }

  .khung_thông_tin_dat_ban input[type='text'],
  .khung_thông_tin_dat_ban input[type='email'] {
    width: 100%;
    padding: 2px;
    border: 0.5px solid #ccc;
    border-radius: 2px;
  }

  .hr_thong_tin_dat_ban {
    border: #01152f 1px solid;
    margin: 0;
    padding: 0;
  }

  .khung_thông_tin_dat_ban input[type='radio'] {
    margin-right: 5px;
    border: 1px solid #ccc;
    padding: 5px;
  }

  .khung_thông_tin_dat_ban input[type='radio']:checked {
    background-color: #007bff;
    color: #fff;
  }

  .order-info {
    width: 60%;
    border-radius: 4px;
    padding: 10px;
  }

  .payment-info {
    width: 40%;
    border-radius: 4px;
    padding: 10px;
  }

  .order-info h2,
  .payment-info h2 {
    margin-bottom: 10px;
    color: #333;
    text-align: center;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    border: none;
  }

  td {
    padding: 10px;
    border-bottom: none;
  }

  input[type='text'],
  input[type='email'] {
    width: 100%;
    padding: 2px;
    border: 1px solid #ccc;
  }

  input[type='radio'] {
    margin-right: 5px;
    border: 1px solid #ccc;
    padding: 5px;
  }

  input[type='radio']:checked {
    background-color: #007bff;
    color: #fff;
  }

  .btn-thanh-toan {
    background-color: #4caf50;
    color: white;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    margin-top: 10px;
    align-items: center;
    width: 80%;
    margin: 0 auto;
    display: flex;
    /* Thêm dòng này */
    justify-content: center;
    /* Thêm dòng này */
    margin-top: 20px;
    margin-bottom: 20px;
    border-radius: 2px;
  }

  .btn-thanh-toan:hover {
    background-color: #45a049;
  }

  .boxtitle {
    color: #fff;
    background-color: #222831;
    border: none;
    text-align: center;
    padding: 10px;
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
  }

  .boxcontent {
    border-left: 1px solid #ccc;
    border-right: 1px solid #ccc;
    border-bottom: 1px solid #ccc;
    border-bottom-left-radius: 4px;
    border-bottom-right-radius: 4px;
    min-height: 400px;
  }

  .boxtitle_thong_tin_gio_hang {
    color: #fff;
    background-color: #222831;
    border: none;
    text-align: center;
    padding: 10px;
    border: 1px solid #ccc;
  }

  .boxcontent_thong_tin_gio_hang {
    min-height: 40px;
    padding: 20px;
  }

  .padding_margin {
    padding: 20px;
  }

  .row {
    padding: 0 10px;
    float: none;
    width: 100%;
  }

  .mb {
    margin-bottom: 30px;
  }

  .bang_thongtin_mon_an {
    width: 100%;
    border-collapse: collapse;
  }

  .bang_thongtin_mon_an th,
  .bang_thongtin_mon_an td {
    padding: 10px;
    text-align: center;
    border: 1px solid #222831;
  }

  .bang_thongtin_mon_an th {
    background-color: #222831;
  }

  .bang_thongtin_mon_an img {
    max-width: 100px;
    max-height: 100px;
  }

  .bang_thongtin_mon_an .btn-delete {
    background-color: #dc3545;
    color: #fff;
    border: none;
    padding: 5px 10px;
    border-radius: 4px;
    cursor: pointer;
    font-weight: 400;
    font-family: 'Open Sans', sans-serif;
    font-size: 16px;
  }

  .bang_thongtin_mon_an .quantity-input {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .bang_thongtin_mon_an .quantity-input input {
    width: 30px;
    text-align: center;
    border: none;
    border-radius: 4px;
  }

  .bang_thongtin_mon_an .quantity-input button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 5px 10px;
    border-radius: 4px;
    cursor: pointer;
  }

  .row_bang_thongtin_mon_an {
    float: left;
    width: 100%;
  }

  .mb10 {
    margin-bottom: 100px;
  }

  .rowdongyvaxoa input[type='submit'] {
    color: #fff;
    padding: 8px;
    border-radius: 3px;
    margin-top: 10px;
    border: none;
    font-weight: 400;
    font-family: 'Open Sans', sans-serif;
    font-size: 16px;
  }

  .mau_do {
    background-color: #dc3545;
  }

  .mau_trang {
    background-color: #ffc107;
  }

  .mau_xanh {
    background-color: #28a745;
  }

  .user-table {
    width: 100%;
    border-collapse: collapse;
  }

  .user-table td {
    padding: 8px;
    border-left: 1px solid #ccc;
    border-right: 1px solid #ccc;
    border-top: 1px solid #ccc;
    /* Thêm viền top */
    text-align: center;
    white-space: nowrap;
    /* Ngăn chặn xuống dòng tự động */
  }

  .user-table tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  .user-table tr:hover {
    background-color: #e0e0e0;
  }

  .user-table td:first-child {
    font-weight: bold;
    width: 150px;
    border-bottom: 1px solid #ccc;
    /* Xóa border-top và border-bottom */
    text-align: left;
  }

  .user-table td:last-child {
    border-right: 1px solid #ccc;
  }

  .user-table tr:last-child td {
    border-bottom: 1px solid #ccc;
    border-top: 1px solid #ccc;
    /* Thêm viền top */
  }

  .user-table td input[type="text"],
  .user-table td input[type="email"],
  .user-table td input[type="number"],
  .user-table td input[type="datetime-local"] {
    width: 100%;
    padding: 4px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }
</style> -->