@extends('layouts.admin')

@section('header')
<div class="page-title-heading">
    <div class="page-title-icon">
        <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
        </i>
    </div>
    <div>Edit Product </div>
</div>
<div class="page-title-actions">
    <a href="/admin/products" class="btn btn-info">Go Back</a>
</div> 
@endsection

@section('content')
<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
  <div class="row">
    <div class="col-md-6">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Add New</h5>
                <form action="/admin/product/edit/{{$product->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="position-relative form-group"><label for="title" >Blog Title</label><input name="title" id="title" type="text" value="{{$product->title}}" class="form-control"></div>

                    <div class="position-relative form-group"><label for="price" >Price</label><input name="price" id="price" type="text" value="{{$product->price}}" class="form-control"></div>

                    <div class="position-relative form-group"><label for="stock" >Stock</label><input name="stock" id="stock" type="number" value="{{$product->stock}}" class="form-control"></div>
                    
                    <div class="position-relative form-group"><label for="category_id" >Category</label><select name="category_id" id="category_id" type="text" class="form-control">
                    <option value="">Select</option>
                    @foreach($categories as $category)
                    <option <?php echo $category->id == $product->category_id ? 'selected' : '' ; ?> value="{{$category->id}}">{{$category->title}}</option> 
                    @endforeach    
                    </select></div>

                    <div class="position-relative form-group"><label for="author_id" >Author</label><select name="author_id" id="author_id" type="text" class="form-control">
                    <option value="">Select</option>
                    @foreach($authors as $author)
                    <option <?php echo $author->id == $product->author_id ? 'selected' : '' ; ?> value="{{$author->id}}">{{$author->title}}</option> 
                    @endforeach    
                    </select></div>

                    <div class="position-relative form-group"><label for="brand_id" >Brand</label><select name="brand_id" id="brand_id" type="text" class="form-control">
                    <option value="">Select</option>
                    @foreach($brands as $brand)
                    <option <?php echo $brand->id == $product->brand_id ? 'selected' : '' ; ?> value="{{$brand->id}}">{{$brand->title}}</option> 
                    @endforeach    
                    </select></div>

                    <img src="/image/product/{{$product->image}}" height="60px" width="60px" class="mt-2 mb-1">

                    <div class="position-relative form-group"><label for="image" > Product Image</label><input name="image" id="image" type="file" class="form-control"></div>

                    <div class="custom-checkbox custom-control"><input type="checkbox" id="best" name="best" class="custom-control-input" <?php echo $product->best == 'on' ? 'checked' : '' ; ?>><label class="custom-control-label" for="best">Best Seller</label></div>


                    <div class="position-relative form-group"><label for="desc" >Body</label><textarea name="desc" id="desc" class="form-control" rows="10">{{$product->desc}}</textarea></div>
                    
                    <button type="submit" class="mt-1 btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection