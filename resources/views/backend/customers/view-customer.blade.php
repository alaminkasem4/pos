@extends('backend.layouts.master')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Customers</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Customer</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="col-md-12">
      <div class="card">
     
        <div class="card-header">
          <h3>Customers View
              <a class="btn btn-success float-right btn-sm" href="{{route('customers.add')}}"><i class="fa fa-plus-circle">Add Customer</i></a>
          </h3>
        </div>
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th width="4%">SL.</th>
                <th>Name</th>
                <th>Mobile No</th>
                <th>Email</th>
                <th>Address</th>
                <th width="10%">Action</th>
              </tr>
            </thead>
            <tbody>
              <div></div>
              @foreach($alldata as $key => $customer)
              <tr class="{{$customer->id}}">
                <td>{{$key+1}}</td>
                <td>{{$customer->name}}</td>
                <td>{{$customer->mobile}}</td>
                <td>{{$customer->email}}</td>
                <td>{{$customer->address}}</td>
                 @php
                  $count_customer = App\Model\Payment::where('customer_id',$customer->id)->count();
                @endphp
                <td>
                  <a title="edit" class="btn btn-sm btn-primary" href="{{route('customers.edit',$customer->id)}}">
                    <i class="fa fa-edit"></i>
                  </a>
                   @if($count_customer < 1)
                   <a id="delete" title="delete" class="btn btn-sm btn-danger" data-token="{{csrf_token()}}" data-id="{{$customer->id}}" href="{{route('customers.delete')}}"><i class="fa fa-trash"></i>
                  </a>
                  @endif
                </td>
              </tr>
              @endforeach

           </tbody>
          </table>
        </div>
      </div>
    </section> 
</div>





@endsection