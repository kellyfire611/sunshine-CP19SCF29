@extends('backend.layouts.master')

@section('title')
Danh sách Sản phẩm
@endsection

@section('feature-title')
Danh sách Sản phẩm   
@endsection

@section('feature-description')
Danh sách các Sản phẩm có trong Hệ thống. Bạn có thể CRUD!
@endsection

@section('content')
<a href="{{ route('danhsachsanpham.create') }}" class="btn btn-primary">Thêm mới Sản phẩm</a>

<!-- Tạo nút xem biểu mẫu khi in trên web
- Theo quy ước, các route đã được đăng ký trong file `web.php` đều phải được đặt tên để dễ dàng bảo trì code sau này.
- Đường dẫn URL là đường dẫn được tạo ra bằng route có tên `sanpham.print`
- Sẽ có dạng http://tenmiencuaban.com/admin/sanpham/print
-->
<a href="{{ route('danhsachsanpham.print') }}" class="btn btn-success">In ấn</a>

<!-- Tạo nút Xuất Excel danh sách sản phẩm
- Theo quy ước, các route đã được đăng ký trong file `web.php` đều phải được đặt tên để dễ dàng bảo trì code sau này.
- Đường dẫn URL là đường dẫn được tạo ra bằng route có tên `danhsachsanpham.excel`
- Sẽ có dạng http://tenmiencuaban.com/admin/danhsachsanpham/excel
-->
<a href="{{ route('danhsachsanpham.excel') }}" class="btn btn-danger">Xuất Excel</a>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Hình</th>
            <th>Mã sản phẩm</th>
            <th>Giá gốc</th>
            <th>Loại sản phẩm</th>
            <th>Sửa</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $stt = 1;
        ?>
        @foreach($danhsachsanpham as $sp)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>
                <img src="{{ asset('storage/photos/' . $sp->sp_hinh) }}" class="sanpham-thumbnail" />
            </td>
            <td>{{ $sp->sp_ten }}</td>
            <td>{{ $sp->sp_giaGoc }}</td>
            <td>{{ $sp->loaisanpham->l_ten }}</td>
            <td>
                <a href="{{ route('danhsachsanpham.edit', ['id' => $sp->sp_ma]) }}" class="btn btn-success">Sửa</a>
                <form class="d-inline" method="post" action="{{ route('danhsachsanpham.destroy', ['id' => $sp->sp_ma]) }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE" />
                    <button class="btn btn-danger">Xóa</button>
                </form>
            </td>
        </tr>
        <?php
        $stt++;
        ?>
        @endforeach
    </tbody>
</table>

@endsection
