@extends('admin.main')
@section('content')
    <div class="admin-content-main-order-list">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ảnh</th>
                    <th>Tên</th>
                    <th>Giá</th>
                    <th>Số Lượng</th>
                    <th>Thành Tiền</th>
                    <th>Tùy Biến</th>

                </tr>
            </thead>
            <tbody>
                @php
                    $total = 0;
                    $value = 1.5;
                @endphp
                @foreach ($products as $product)
                    @php
                        $price = $product->price_sale * $order_detail[$product->id];
                        $total += $price;
                    @endphp
                    <tr style="opacity: 1 ; transition: all {{$value++}}s ease-out"
                        class="slide-right-effect">
                        <td>{{ $product->id }}</td>
                        <td><img style="width: 70px;" src="{{ asset($product->image) }}" alt="">
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ number_format($product->price_sale) }}</td>
                        <td>{{ $order_detail[$product->id] }}</td>
                        <td>{{ number_format($price) }}</td>
                        <td>
                            <a class="delete-class" href="">Xóa</a>
                        </td>
                    </tr>
                @endforeach
                <tr class="slide-left-effect">
                    <td style="font-weight: 700" colspan="5">Tổng Cộng </td>
                    <td style="font-weight: 700"> {{ number_format($total) }}</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection()
