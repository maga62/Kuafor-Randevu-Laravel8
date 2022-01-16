@extends("layouts.admin")
@section("title","Kuaför Admin Service")
@section("css")

    <script src="//cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>
@endsection
@section("content")
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Category</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/admin">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="/admin/category">Services</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Service Update</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Service Update </h5>

                </div>
                <div class="ibox-content">
                    <form enctype="multipart/form-data" action="{{ route('admin_service_update',['id'=>$data->id]) }}" method="post" class="form-horizontal">
                        @csrf
                        <div class="control-group">
                            <label class="control-label">Category</label>
                            <div class="controls">
                                <select class="form-control" name="category_id">
                                    @foreach($category_list as $rs)
                                        @if($rs->id == $data->category_id)
                                            <option selected value="{{ $rs->id }}">{{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($rs,$rs->title) }}</option>
                                        @else
                                            <option  value="{{ $rs->id }}">{{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($rs,$rs->title) }}</option>
                                        @endif
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Title</label>
                            <div class="controls">
                                <input value="{{$data->title}}" required type="text" name="title" class="form-control" placeholder="Title" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Keywords</label>
                            <div class="controls">
                                <input value="{{$data->keywords}}" type="text" name="keywords" class="form-control" placeholder="Keywords" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Description</label>
                            <div class="controls">
                                <input value="{{$data->description}}" type="text" name="description" class="form-control" placeholder="Description"  />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Price</label>
                            <div class="controls">
                                <input value="{{$data->price}}" type="number" name="price" class="form-control" placeholder="Price"  />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Detail</label>
                            <div class="controls">
                                    <textarea  class="form-control"name="detail" >
                                        {{ $data->detail }}
                                    </textarea>
                                <script>
                                    CKEDITOR.replace( 'detail' );
                                </script>

                            </div>
                        </div>
                        <div class="control-group" >
                            <label class="control-label">Status</label>
                            <div class="controls">
                                <select class="form-control" name="status" >
                                    <option value="True">True</option>
                                    @if($data->status=="False")
                                        <option selected value="False">False</option>
                                    @else
                                        <option value="False">False</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Image</label>
                            <div class="controls">
                                <input  name="image" type="file" />
                            </div>
                            @if($data->image)
                                <img width="150px" style="margin:10px;" src="{{ Storage::url($data->image) }}" alt="">
                            @endif
                        </div>
                        <div class="control-group">
                            <label class="control-label">Slug</label>
                            <div class="controls">
                                <input value="{{$data->slug}}" type="text" name="slug" class="form-control" placeholder="Slug" />
                            </div>
                        </div>
                        <br>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success">Service Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
@section("jss")


@endsection
