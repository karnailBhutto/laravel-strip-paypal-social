@extends('layouts.backend.header')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     Payment Tables
     <small>Listing</small>
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
      @include('backend.flash-message')
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Payment Listing</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped" data-form="deleteForm">
            <thead>
              <tr>
                <th>S.No</th>
               <th>First Name</th>
               <th>Last Name</th>
               <th>Email</th>
               <th>Amount</th>
               <th>Currency</th>
               <th>Status</th>
               <th>Created</th>
               <th><font color="red">Action</font></th>
              </tr>
            </thead>
            <tfoot>
              <tr>
               <th>S.No</th>
               <th>First Name</th>
               <th>Last Name</th>
               <th>Email</th>
               <th>Amount</th>
               <th>Currency</th>
               <th>Status</th>
               <th>Created</th>
               <th><font color="red">Action</font></th>
             </tr>
           </tfoot>
           <tbody>
            @forelse($payment as $key=>$value)
            <tr>
             <td class="align-center">{{ $key+1 }}</td>
             <td class="align-center">{{ $value['first_name'] }}</td>
             <td class="align-center">{{ $value['last_name'] }}</td>
             <td class="align-center">{{ $value['email'] }}</td>
             <td class="align-center">{{ $value['amount'] }}</td>
             <td class="align-center">{{ $value['currency'] }}</td>
             <td class="numeric text-center" data-title="Status">
              @if($value['status'] == 1)
              <div style="height:auto;" class="datagrid-cell datagrid-cell-c1-request_status"><label class="label label-success">Approved</label></div>
              @else
              <div style="height:auto;" class="datagrid-cell datagrid-cell-c1-request_status"><label class="label label-success">Approved</label></div>

              <!-- <div style="height:auto;" class="datagrid-cell datagrid-cell-c1-request_status"><label class="label label-danger">Rejected</label></div> -->
              @endif
              
              
            </td>

            <td class="align-center">{{ $value['created_at'] }}</td>

            <td>
              <a href="{{action('App\Http\Controllers\backend\PaymentController@show', $value['id'])}}" class="btn btn-warning btn-xs show-btn">Show</a>


              <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$value->id}})" 
                data-target="#DeleteModal" class="btn btn-danger btn-xs form-delete"><i class="fa fa-trash"></i> Delete</a>

              </td>




            </tr>
            @empty
            <tr class="odd"><td valign="top" colspan="7" class="dataTables_empty">No records found !</td></tr>

            @endforelse
          </tbody>
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


<div id="DeleteModal" class="modal fade text-danger" role="dialog">
 <div class="modal-dialog ">
   <!-- Modal content-->
   <form action="" id="deleteForm" method="post">
     <div class="modal-content">
       <div class="modal-header bg-danger">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title text-center">DELETE CONFIRMATION</h4>
       </div>
       <div class="modal-body">
         {{ csrf_field() }}
         {{ method_field('DELETE') }}
         <p class="text-center">Are You Sure Want To Delete ?</p>
       </div>
       <div class="modal-footer">
         <center>
           <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
           <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Yes, Delete</button>
         </center>
       </div>
     </div>
   </form>
 </div>
</div>
<script type="text/javascript">
function deleteData(id)
{
 var id = id;
 var url = '{{ route("payment.destroy", ":id") }}';
 url = url.replace(':id', id);
 $("#deleteForm").attr('action', url);
}

function formSubmit()
{
 $("#deleteForm").submit();
}
</script>
@stop

