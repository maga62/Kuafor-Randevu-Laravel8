@extends("layouts.admin")
@section("title","Kuaför Admin time")

@section("content")
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Category</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/admin">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="/admin/time">times</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Time Add</strong>
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
                    <h5>time Add </h5>

                </div>
                <div class="ibox-content">
                    <form enctype="multipart/form-data" action="{{ route("admin_time_store") }}" method="post" class="form-horizontal">
                        @csrf

                        <div class="control-group">
                            <label class="control-label">Date</label>
                            <div class="controls">
                                <input required type="date" name="date" class="form-control" min="{{date("Y")}}-{{date("m")}}-{{date("d")}}" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Hour</label>
                            <div class="controls">
                                <input required type="time" name="hour" class="form-control" />
                            </div>
                        </div>
                        <div class="control-group" >
                            <label class="control-label">Status</label>
                            <div  class="controls">
                                <select class="form-control" name="status" >
                                    <option value="Boş">Boş</option>
                                    <option value="Dolu">Dolu</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success">Add Time</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
@section("jss")


@endsection
