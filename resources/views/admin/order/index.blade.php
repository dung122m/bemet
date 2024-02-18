@extends('admin.master.main')

@section('title')
   Order
@endsection

@section('content')
<form class="form-inline">
  <div class="form-group">
    <label for=""></label>
    <input type="text" name="" id="" class="form-control" placeholder="Search" aria-describedby="helpId">
    <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
    <div class="box-body">
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-bordered">
                <tr>
                   <th>ID</th>
                                          
                   <th>Total Price</th>
                    <th>Created at</th>
                    <th class="text-center">Status</th>
                                          
                    <th class="text-center">Action</th>
                </tr>
                @foreach ($orders as $item)
                <tr>
                    
                    <td>
                            {{ $loop->index + 1 }}
                    </td>
                    <td>{{ number_format($item->totalAmount,0) }}</td>
                    <td>{{ $item->created_at->format("d/m/Y") }}</td>
                    <td>{{ $item->status == 1 ? "Verified" : "Unverified" }}</td>
                    <td><a href="{{ route("order-manage.detail",$item->id) }}" class="btn btn-primary">Detail</a></td>
                    
                </tr>
                    @endforeach

                
                
                
              </table>
            </div>
            
        </div>
              
    </div>
  </div>
</form>

@endsection