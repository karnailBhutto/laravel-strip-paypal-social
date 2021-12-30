  @extends('layouts.backend.header')
  @section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Payment
        <small>Payment tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <?php $segments = ''; ?>
        @foreach(Request::segments() as $key=>$segment)
        <?php $segments .= '/'.$segment; ?>
        @if($key > 0)
        <li>
          <a href="{{ $segments }}">{{ ucfirst($segment) }}</a>
        </li>
        @endif
        @endforeach
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <!-- /.box -->

          <div class="box">
            <div class="box-header">

              <h3 class="box-title">Payment</h3>
              <a href="{{ url('admin/transaction') }}" class="pull-right"><span class="glyphicon glyphicon-chevron-left">Back</span></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <table class="col-lg-12 col-md-12 col-sm-12 table">
              <div class="body">

                @if(!empty($payment))
                <tr><td class="col-md-6"><strong> Transaction ID</strong></td><td class="col-md-6">{{ $payment['tran_id'] }}</td><td></td><td></td></tr>
                <tr><td class="col-md-6"><strong> Address</strong></td><td class="col-md-6">{{ $payment['address'] }}</td><td></td><td></td></tr>
                <tr><td class="col-md-6"><strong> City</strong></td><td class="col-md-6">{{ $payment['city'] }}</td><td></td><td></td></tr>
                <tr><td class="col-md-6"><strong> State</strong></td><td class="col-md-6">{{ $payment['state'] }}</td><td></td><td></td></tr>
                <tr><td class="col-md-6"><strong> Country</strong></td><td class="col-md-6">{{ $payment['country'] }}</td><td></td><td></td></tr>
                <tr><td class="col-md-6"><strong> Zip Code</strong></td><td class="col-md-6">{{ $payment['zip_code'] }}</td><td></td><td></td></tr>
                <tr><td class="col-md-6"><strong> Email</strong></td><td class="col-md-6">{{ $payment['email'] }}</td><td></td><td></td></tr>
                <tr><td class="col-md-6"><strong> Amount</strong></td><td class="col-md-6">{{ $payment['amount'] }}</td><td></td><td></td></tr>
                <tr><td class="col-md-6"><strong> Currency</strong></td><td class="col-md-6">{{ $payment['currency'] }}</td><td></td><td></td></tr>
                <tr><td class="col-md-6"><strong> Card_no</strong></td><td class="col-md-6">{{ $payment['card_no'] }}</td><td></td><td></td></tr>
                <tr><td class="col-md-6"><strong> Exp Month</strong></td><td class="col-md-6">{{ $payment['exp_month'] }}</td><td></td><td></td></tr>
                <tr><td class="col-md-6"><strong> Exp Year</strong></td><td class="col-md-6">{{ $payment['exp_year'] }}</td><td></td><td></td></tr>
                <tr><td class="col-md-6"><strong> CVV</strong></td><td class="col-md-6">{{ $payment['cvv'] }}</td><td></td><td></td></tr>
                <tr><td class="col-md-6"><strong> Reason</strong></td><td class="col-md-6">{{ $payment['reason'] }}</td><td></td><td></td></tr>
                @if($payment['status'] == 1)
                <tr><td class="col-md-6"><strong> Status</strong></td><td class="col-md-6"><label class="label label-success">Approved</label></td><td></td><td></td></tr>

                @else
                <tr><td class="col-md-6"><strong> Status</strong></td><td class="col-md-6"><label class="label label-fals">failed</label></td><td></td><td></td></tr>

                <!-- <div style="height:auto;" class="datagrid-cell datagrid-cell-c1-request_status"><label class="label label-danger">Rejected</label></div> -->
                @endif



                @else
                <tr><td><font color="red">No Record Found !</font></td></tr>
                @endif

              </div>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
@stop

