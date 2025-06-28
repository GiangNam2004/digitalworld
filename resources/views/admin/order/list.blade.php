@extends('admin.main')
@section('content')
    <div class="admin-content-main-order-list">
        <table>
            <thead>
                <tr >
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Địa Chỉ</th>
                    <th>Ghi Chú</th>
                    <th>Chi Tiết</th>
                    <th>Ngày</th>
                    <th>Trạng Thái</th>
                    <th>Tùy Biến</th>

                </tr>
            </thead>
            <tbody>
                @php
                    $value=1.5
                @endphp
                @foreach ($orders as $order)
                    <tr style="transition: all {{$value++}}s ease-out" class="slide-right-effect">
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->address }}, {{ $order->city }}</td>
                        <td>{{ $order->note }}</td>
                        <td><a class="edit-class" href="/admin/order/detail/{{ $order->order_detail }}">Chi Tiết</a></td>
                        <td>{{ $order->created_at }}</td>
                        @if ($order->status == 0)
                            <td>
                                <div class="non-confirm-order">Chưa xác nhận</div>
                            </td>
                        @else
                            <td>
                                <div class="confirm-order">Đã xác nhận</div>
                            </td>
                        @endif
                        <td>
                            <a onclick="removeRow(order_id={{ $order->id }},url='/admin/order/delete')"
                                class="delete-class" href="#">Xóa</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <div class="admin-content-main-order-list-btn">
        <div class="pagination">
            <a href="/admin/order/list/left" class="btn-left slide-left-effect"><</a>
            <a href="/admin/order/list/right" class="btn-right slide-right-effect">></a>
        </div>
    </div>
@endsection()
@section('footer')
    <script>
        function removeRow(order_id, url) {
            event.preventDefault();
            if (confirm('Bạn có chắc chắn muốn xóa đơn hàng này ờ hớ ?')) {
                $.ajax({
                    url: url,
                    data: {
                        order_id
                    },
                    method: 'GET',
                    dataType: 'JSON',
                    success: function(res) {
                        if (res.success == true) {
                            location.reload();
                        }
                    }
                })
            }
        }
    </script>
@endsection
