@extends('admin.master.main')

@section('title')
   Product
@endsection

@section('content')
<form class="form-inline">
  <div class="form-group">
    <label for=""></label>
    <input type="text" name="" id="" class="form-control" placeholder="Search" aria-describedby="helpId">
    <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
    <a href="{{ route("product.create") }}" class="btn btn-success float-right" type="submit"><i class="fa fa-plus"></i> Add new</a>
  </div>
</form>
    <div class="box-body">
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  
                  <th >Name</th>
                  <th >Image</th>
                  <th >Price</th>
                  <th >Sale price</th>
                  <th >Category</th>
                 
                  <th style="width: 40px">Status</th>
                  <th class="text-center" >Action</th>
                </tr>
                @foreach ($products as $item)
                <tr>
                  <td>
                    {{ $item->id }}
                  </td>
                  <td> {{ $item->name }}</td>
                  <td><img src="/uploads/product/{{ $item->image }}" alt="" style="width:100px"></td>
                  <td> {{ number_format( $item->price,0)}} vnd</td>
                  <td> {{number_format( $item->sale_price,0) }} vnd</td>
                  <td> {{ $item->category->name }}</td>
                  
                  <td>
                     {{ $item->status ? "Show" : "Hide" }}
                  </td>
                  <td class="text-center">
                    
                    <form action="{{ route("product.destroy",$item->id)}}" method="POST" onsubmit="return confirm('Are you sure ?')">
                    @csrf
                    @method("DELETE")
                        <a href="{{ route("product.edit",$item->id) }}" class="btn btn-primary">
                       <i class="fa fa-edit"></i>
                   
                    </a>
                    <button type="submit"  class="btn btn-danger">
                    <i class="fa fa-trash"></i>
                  
                   </button>
                    </form>
                   
                  </td>
                 
                </tr>
                @endforeach
                
                
              </table>
            </div>
            
        </div>
              
    </div>
@endsection