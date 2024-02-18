@extends('admin.master.main')

@section('title')
   Create Product
@endsection

@section('content')
<div class="row">
   
   <form action="{{ route("product.store") }}" method="POST" enctype="multipart/form-data">  
         @csrf
         <div class="col-md-6">
         <div class="form-group">
            <label for="">Product name</label>
            <input type="text" class="form-control" id="" placeholder="Product name" name="name" value="{{ old('name') }}">
         </div>
  
        
         <div class="form-group">
            <label for="">Description</label>
            <textarea  name="description" class="form-control description" placeholder="Description">{{ old('description') }}</textarea>
            
         </div>
         </div>
       <div class="col-md-6">
       <div class="form-group">
            <label for="">Price</label>
            <input type="text" class="form-control" id="" placeholder="Price" name="price" value="{{ old('price') }}">
         </div>
         <div class="form-group">
            <label for="">Sale price</label>
            <input type="text" class="form-control" id="" placeholder="Sale price" name="sale_price" value="{{ old('sale_price') }}">
         </div>
            <div class="form-group">
              <label for="">Category</label>
              <select class="form-control" name="category_id">
               <option value="-1">Select Category</option>
               @foreach ($category as $item)
                   <option value="{{ $item->id }}" {{ old('category_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
               @endforeach             
              </select>
            </div>
          <div class="form-group">
            <label for="">Product Image</label>
            <input type="file" class="form-control" id="" placeholder="image" name="image" onchange="showImg(this)">
            <img id="show-img" src="" alt="" width="25%">
         </div>
         <div class="form-group">
            <label for="">Product Other Image</label>
            <input type="file" class="form-control" id="" placeholder="Other image" name="other_image[]" multiple onchange="showOtherImg(this)">
            <hr>
            <div class="row" id="show-other-img">
              
            </div>
         </div>
         <div class="form-group">
              <label for="">Status</label>
              <select class="form-control" name="status" id="">
               <option value="-1">Choose Status</option>
               <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Publish</option>
               <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Hidden</option>
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
   function showOtherImg(input){ 
      var html = ''
      if (input.files && input.files.length){
         for(let i = 0;i<input.files.length;i++){
            var file = input.files[i]
            var reader = new FileReader(); 
            reader.onload = function (e) {
            html += `
            <div class="thumbnail col-md-3">
                  <img src="${e.target.result}" alt="" height="25%">
               </div>
            `
            $('#show-other-img').html(html) 
         }; 
         
          reader.readAsDataURL(file);
         }
        
        
   }
}

</script>
@endsection
