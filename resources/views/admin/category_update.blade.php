@extends("layouts.admin")
@section("title","Kuaför Admin Category")
@section("css")

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
                    <a href="/admin/category">Categories</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Category Update</strong>
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
                    <h5>Category Update</h5>

                </div>
                <div class="ibox-content">
                    <form enctype="multipart/form-data" action="{{ route('admin_category_update',['id'=>$data->id]) }}" method="post" class="form-horizontal">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Parent Category</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="parent_id">
                                    <option value="0" selected>Main Category</option>
                                    @foreach($parent_category as $rs)
                                        @if($rs->id == $data->parent_id)
                                            <option selected value="{{ $rs->id }}">{{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($rs,$rs->title) }}</option>
                                        @else
                                            <option  value="{{ $rs->id }}">{{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($rs,$rs->title) }}</option>
                                        @endif
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input value="{{ $data->title }}" required type="text" name="title" class="form-control" placeholder="Title" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Keywords</label>
                            <div class="col-sm-10">
                                <input value="{{ $data->keywords }}"  type="text" name="keywords" class="form-control" placeholder="Keywords" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <input  value="{{ $data->description }}" type="text" name="description" class="form-control" placeholder="Description"  />
                            </div>
                        </div>
                        <div class="form-group row" >
                            <label class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
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

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Slug</label>
                            <div class="col-sm-10">
                                <input value="{{ $data->slug }}" type="text" name="slug" class="form-control" placeholder="Slug" />
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

