@extends('layouts.admin')

@section('header')
<div class="page-title-heading">
    <div class="page-title-icon">
        <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
        </i>
    </div>
    <div>Edit Blog </div>
</div>
<div class="page-title-actions">
    <a href="/admin/blogs" class="btn btn-info">Go Back</a>
</div> 
@endsection

@section('content')
<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
  <div class="row">
    <div class="col-md-6">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Add New</h5>
                <form action="/admin/blog/edit/{{$blog->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="position-relative form-group"><label for="title" >Blog Title</label><input name="title" id="title" type="text" value="{{$blog->title}}" class="form-control"></div>
                    
                    <div class="position-relative form-group"><label for="category_id" >Category</label><select name="category_id" id="category_id" type="text" class="form-control">
                    <option value="">Select</option>
                    @foreach($categories as $category)
                    <option <?php echo $category->id == $blog->category_id ? 'selected' : '' ; ?> value="{{$category->id}}">{{$category->title}}</option> 
                    @endforeach    
                    </select></div>

                    <img src="/image/blog/{{$blog->cover}}" height="60px" width="60px" class="mt-2 mb-1">

                    <div class="position-relative form-group"><label for="cover" > Cover Image</label><input name="cover" id="cover" type="file" class="form-control"></div>


                    <div class="position-relative form-group"><label for="body" >Body</label><textarea name="body" id="body" class="form-control" rows="10">{{$blog->body}}</textarea></div>
                    
                    <button type="submit" class="mt-1 btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection