@extends('admin.main')

@section('content')
<div class="row">
  <div class="card ml-2 mr-2 p-0 card-danger col-6">
    <div class="card-header">
      <h3 class="card-title">Donut Chart</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="card-body">
      <div class="chartjs-size-monitor">
        <div class="chartjs-size-monitor-expand">
          <div class=""></div>
        </div>
        <div class="chartjs-size-monitor-shrink">
          <div class=""></div>
        </div>
      </div>
      <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 414px;" width="517" height="312" class="chartjs-render-monitor"></canvas>
    </div>
    <!-- /.card-body -->
  </div>
</div>

@endsection
