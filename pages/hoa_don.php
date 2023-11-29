<!DOCTYPE html>
<html>
	<head>
		<title>Hóa đơn</title>
<head>
    <title>Hóa đơn</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            border: 1px solid #ccc;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 5px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            padding: 20px;
            background-color: #f2f2f2;
            border-radius: 5px;
        }
        .header h1 {
            margin: 0;
            color: #333;
        }
        h2 {
            color: #333;
            margin-top: 20px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table th, .table td {
            padding: 10px;
            border: 1px solid #ccc;
        }
        .table th {
            background-color: #f2f2f2;
            text-align: left;
            font-weight: bold;
        }
        .total {
            text-align: right;
            font-weight: bold;
        }
        .footer {
            text-align: center;
            font-size: 14px;
            margin-top: 20px;
            color: #777;
        }
    </style>
</head>
	</head>
	<body>
		<div class="container">
			<div class="header">
				<h1>Hóa đơn</h1>
			</div>
			<h2>Thông tin đặt bàn</h2>
			<table class="table">
				<tr>
					<th>Người đặt hàng:</th>
					<td>Tên khách hàng</td>
				</tr>
				<tr>
					<th>Email:</th>
					<td>example@example.com</td>
				</tr>
				<tr>
					<th>Điện thoại:</th>
					<td>1234567890</td>
				</tr>
				<tr>
					<th>Số người:</th>
					<td>4</td>
				</tr>
				<tr>
					<th>Thời gian đặt bàn:</th>
					<td>09:30:00, 29/11/2023</td>
				</tr>
				<tr>
					<th>Ghi chú:</th>
					<td>Ghi chú đặt bàn</td>
				</tr>
			</table>
			<h2>Thông tin sản phẩm</h2>
			<table class="table">
				<thead>
					<tr>
						<th>Sản phẩm</th>
						<th>Đơn giá</th>
						<th>Số lượng</th>
						<th>Thành tiền</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Áo thun</td>
						<td>200,000đ</td>
						<td>2</td>
						<td>400,000đ</td>
					</tr>
					<tr>
						<td>Quần jeans</td>
						<td>300,000đ</td>
						<td>1</td>
						<td>300,000đ</td>
					</tr>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="3" class="total">Tổng cộng:</td>
						<td>700,000đ</td>
					</tr>
				</tfoot>
			</table>
			<div class="footer">
				<p>Cảm ơn bạn đã mua hàng!</p>
			</div>
		</div>
	</body>
</html>
