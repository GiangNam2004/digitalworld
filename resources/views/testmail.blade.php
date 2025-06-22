<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác Nhận Đơn Hàng - Digital World</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 30px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .header {
            background-color: #2196f3;
            color: white;
            text-align: center;
            padding: 15px;
            border-radius: 8px;
        }

        .header h1 {
            margin: 0;
        }

        .content {
            margin-top: 20px;
            font-size: 16px;
            color: #333;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
            color: #777;
        }

        .footer a {
            color: #2196f3;
            text-decoration: none;
        }

        .button {
            display: inline-block;
            background-color: #2196f3;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>XÁC NHẬN ĐƠN HÀNG DIGITAL WORLD</h1>
        </div>
        <div class="content">
            <h2>Chào bạn, {{ $mailname }}!</h2>
            <p>Chúng tôi rất vui khi thông báo rằng đơn hàng của bạn tại Digital World đã được tạo thành công.</p>
            <p>Vui lòng xác nhận đơn hàng của bạn bằng cách nhấn vào nút dưới đây:</p>

            <!-- Nút xác nhận đơn hàng -->
            <a href="{{ url('/order/token/check') }}?name={{ urlencode($mailname) }}&token={{ $tokenconfirm }}" class="button">Xác Nhận Đơn Hàng</a>

            <p>Thông tin chi tiết về đơn hàng sẽ được cập nhật sau khi bạn xác nhận. Bạn có thể theo dõi tình trạng đơn
                hàng của mình trong tài khoản.</p>
            <p>Cảm ơn bạn đã mua sắm tại Digital World!</p>
        </div>

        <div class="footer">
            <p>Nếu bạn có bất kỳ câu hỏi nào, vui lòng liên hệ với chúng tôi qua email <a
                    href="mailto:support@digitalworld.com">support@digitalworld.com</a>.</p>
            <p>Trân trọng, <br> Digital World</p>
        </div>
    </div>
</body>

</html>
