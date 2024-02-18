@extends('admin.master.main')

@section('title')
   Create Category
@endsection

@section('content')
<div class="row">
   <div class="col-md-4">
      <form action="" method="POST">
         <div class="form-group">
            <label for="">Category name</label>
            <input type="text" class="form-control" id="" placeholder="Category name">
         </div>
         <div class="form-group">
            <label for="">Status</label>
           <div class="form-check">
            <label class="form-check-label">
               <input type="radio" class="form-check-input" name="" id="" value="1">
               Publish
             </label>
           </div>
           <div class="form-check">
            <label class="form-check-label">
               <input type="radio" class="form-check-input" name="" id="" value="0">
               Hidden
             </label>
           </div>
         </div>
         <button type="submit" class="btn btn-primary">Save</button>
      </form>
   </div>
</div>
@endsection