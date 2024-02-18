@extends('admin.master.main')

@section('title')
   Edit Product
@endsection

@section('content')
<div class="row">
   
      <form action="{{ route("product.update",$product->id) }}" method="POST" enctype="multipart/form-data">
         @csrf
         @method("put")
         <div class="col-md-6">
         <div class="form-group">
            <label for="">Product name</label>
            <input type="text" class="form-control" id="" placeholder="Product name" name="name" value="{{ old('name') ?? $product->name }}">
         </div>
  
        
         <div class="form-group">
            <label for="">Description</label> 
            <textarea  name="description" class="form-control description" placeholder="Description">{{ old('description') ?? $product->description }}</textarea>
            
         </div>
         <div class="form-group">
            <label for="">Product Image</label>
            <input type="file" class="form-control" id="" placeholder="image" name="image" onchange="showImg(this)">

            <img src="uploads/product/{{ $product->image }}"  alt="" id="show-img" height="25%">
         </div>
         <div class="form-group">
            <label for="">Product Other Image</label>
            <input type="file" class="form-control" id="" placeholder="Other image" name="other_image[]" multiple>
            <hr>
            <div class="row">
                @foreach ($images as $item)
               <div class="col-md-3" >
                 
                     <a href="" class="thumbnail" style="position:relative">
                        <img src="uploads/product/{{ $item->image }}" alt="">
                     </a>
                    
                        <a onclick="return confirm('Are you sure ?')" href="{{ route("product.delete-image",$item->id) }}" class="btn btn-sm btn-danger" style="position:absolute; top:5px; right:18px">
                           <i class="fa fa-trash"></i>
                        </a>
                     
                  
                  
               </div>
               @endforeach
            </div>
         </div>
         </div>
       <div class="col-md-6">
       <div class="form-group">
            <label for="">Price</label>
            <input type="text" class="form-control" id="" placeholder="Price" name="price" value="{{ old('price') ?? $product->price }}">
         </div>
         <div class="form-group">
            <label for="">Sale price</label>
            <input type="text" class="form-control" id="" placeholder="Sale price" name="sale_price" value="{{ old('sale_price') ?? $product->sale_price }}">
         </div>
            <div class="form-group">
              <label for="">Category</label>
              <select class="form-control" name="category_id">
               <option value="-1">Select Category</option>
               @foreach ($category as $item)
                   <option value="{{ $item->id }}" {{ $product->category_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
               @endforeach             
              </select>
            </div>
          
         <div class="form-group">
              <label for="">Status</label>
              <select class="form-control" name="status" id="">
               <option value="-1">Choose Status</option>
               <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Publish</option>
               <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Hidden</option>
              </select>
         </div>
         <button type="submit" class="btn btn-primary">Save</button>

   </div>
   </div>

      </form>
   
</div>
@endsection
@section('js')
    <script>
   $('.description').summernote({
      height:250
   });
   function showImg(input){ 
      if (input.files && input.files[0]){
         var reader = new FileReader(); 
         reader.onload = function (e) {
            $('#show-img').attr('src', e.target.result); 
         }; 
         reader.readAsDataURL(input.files[0]);
   }
}
</script>
@endsection