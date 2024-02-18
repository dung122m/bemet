@extends('admin.master.main')

@section('title')
   Category
@endsection

@section('content')
<form class="form-inline">
  <div class="form-group">
    <label for=""></label>
    <input type="text" name="" id="" class="form-control" placeholder="Search" aria-describedby="helpId">
    <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
    <a href="{{ route("category.create") }}" class="btn btn-success float-right" type="submit"><i class="fa fa-plus"></i> Add new</a>
  </div>
</form>
    <div class="box-body">
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  
                  <th >Name</th>
                  <th style="width: 40px">Status</th>
                  <th class="text-center" style="width:180px">Action</th>
                </tr>
                @foreach ($categories as $item)
                <tr>
                  <td>
                    {{ $item->id }}
                  </td>
                  <td> {{ $item->name }}</td>
                  <td>
                     {{ $item->status ? "Show" : "Hide" }}
                  </td>
                  <td class="text-center">
                    <a href="{{ route("category.edit",$item->id) }}" class="btn btn-primary">
                       <i class="fa fa-edit"></i>
                   
                    </a>
                   <a href="" class="btn btn-danger">
                    <i class="fa fa-trash"></i>
                  
                   </a>
                  </td>
                 
                </tr>
                @endforeach
                
                
              </table>
            </div>
            
        </div>
              
    </div>
@endsection