@extends('admin.main')

@section('head')
<script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<form action="" method="post">
  <div class="card-body">

    <div class="form-group">
      <label for="name">Tên loại sản phẩm</label>
      <input type="text" class="form-control" name="name" placeholder="Nhập tên loại sản phẩm">
    </div>
    <div class="form-group">
      <label for="promotion_id">Loại khuyến mãi</label>
      <select name="promotion_id" class="form-control form-select">
        @foreach ($promotions as $promotion)
        <option value="{{ $promotion->id }}">{{ $promotion->name }}</option>
        @endforeach
      </select>
    </div>
  </div>
  <!-- /.card-body -->

  <div class="card-footer">
    <button type="submit" class="btn btn-success">Tạo loại sản phẩm</button>
    <a href="/admin/product_types/list" class="btn btn-secondary">Quay lại</a>
  </div>
  @csrf
</form>
@endsection


@section('footer')
<script>
  CKEDITOR.replace('content')

</script>
@endsection
