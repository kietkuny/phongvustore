@extends('admin.main')

@section('head')
<script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<form action="" method="post">
  <div class="card-body">

    <div class="form-group">
      <label for="menu">Tên Danh Mục</label>
      <input type="text" class="form-control" name="name" placeholder="Nhập tên danh mục">
    </div>

    <div class="form-group">
      <label>Danh Mục</label>
      <select name="parent_id" class="form-select col-4">
        <option value="0">option</option>
        @foreach ($menus as $menu)
        <option value="{{ $menu->id }}">{{ $menu->name }}</option>
        @endforeach
      </select>
    </div>

    {{-- <div class="form-group">
                <label>Mô Tả</label>
                <textarea name="description" class="form-control"></textarea>
            </div> --}}

    <div class="form-group">
      <label>Mô Tả Chi Tiết</label>
      <textarea id="content" name="content" class="form-control"></textarea>
    </div>

    <div class="form-group">
      <label>Kích hoạt</label>
      <div class="custom-control custom-radio">
        <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
        <label for="active" class="custom-control-label">Có</label>
      </div>
      <div class="custom-control custom-radio">
        <input class="custom-control-input" value="0" type="radio" id="no_active" name="active">
        <label for="no_active" class="custom-control-label">Không</label>
      </div>
    </div>

  </div>
  <!-- /.card-body -->

  <div class="card-footer">
    <button type="submit" class="btn btn-success">Tạo Danh Mục</button>
    <a href="/admin/menus/list" class="btn btn-secondary">Quay lại</a>
  </div>
  @csrf
</form>
@endsection


@section('footer')
<script>
  CKEDITOR.replace('content')
</script>
@endsection
