@extends('template.app')

@section('content')
<section class="content">
  <div class="container-fluid">
    <!-- Info boxes -->
    <div class="row">
      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <p>Department</p>
            <h3>{{$department}}</h3>

          </div>
          <div class="icon">
            <i class="fa fa-university"></i>
          </div>
          <a href="{{route('department.index')}}" class="small-box-footer">More <i class="fas fa-arrow-circle-right"></i></a>
        </div>

      </div>
      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <p>Position</p>
            <h3>{{$position}}</h3>

          </div>
          <div class="icon">
            <i class="fa fa-building "></i>
          </div>
          <a href="{{route('position.index')}}" class="small-box-footer">More <i class="fas fa-arrow-circle-right"></i></a>
        </div>

      </div>
      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <p>Employee</p>
            <h3>{{$employee}}</h3>

          </div>
          <div class="icon">
            <i class="fa fa-users"></i>
          </div>
          <a href="{{route('position.index')}}" class="small-box-footer">More <i class="fas fa-arrow-circle-right"></i></a>
        </div>

      </div>
      <!-- ./col -->
    </div>
    <div class="row">
      <div class="col-lg-12 col-12 text-center mt-1">
        <img src="{{'template/dist/img/logo.png'}}" width="20%">
      </div>
      <div class="col-lg-12 col-12 text-center">
        <h2 class="text-center"> <b>KSSGroup <br> </b>Employee Management System</h2>
      </div> 

    </div>
    <!-- /.row -->


    <!-- /.row -->
  </div>
  <!--/. container-fluid -->
</section>

@stop

@push('chart')
@endpush
@push('style')
<style>
  @media (max-width: 500px) {
    #perda {
      height: 52px;
    }
  }

  .modal {
    text-align: center;
  }

  @media screen and (min-width: 768px) {
    .modal:before {
      display: inline-block;
      vertical-align: middle;
      content: " ";
      position: absolute;
      height: 100%;

    }
  }

  .modal-dialog {
    display: inline-block;
    text-align: left;
    vertical-align: middle;
    top: 50%;
  }
</style>
@endpush
@push('script')
<script>
  $(function() {


  });
</script>
<!-- <script src="{{asset('template/plugins/chart.js/Chart.min.js')}}"></script> -->

@endpush