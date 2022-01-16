<link href="{{ asset("assets/admin") }}/css/bootstrap.min.css" rel="stylesheet">
<link href="{{ asset("assets/admin") }}/font-awesome/css/font-awesome.css" rel="stylesheet">

<!-- Toastr style -->
<link href="{{ asset("assets/admin") }}/css/plugins/toastr/toastr.min.css" rel="stylesheet">

<!-- Gritter -->
<link href="{{ asset("assets/admin") }}/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

<link href="{{ asset("assets/admin") }}/css/animate.css" rel="stylesheet">
<link href="{{ asset("assets/admin") }}/css/style.css" rel="stylesheet">
@include("home.flash-message")
<h3 style="margin: 10px;text-align: center;">Hour Detail</h3>
<form style="margin:20px;" enctype="multipart/form-data" action="{{ route("admin_time_update",['id'=>$data->id]) }}" method="post"
      class="form-horizontal">
    @csrf

    <div class="control-group">
        <label class="control-label">Date</label>
        <div class="controls">
            <input value="{{$data->date}}" required type="date" name="date" class="form-control"
                   min="{{date("Y")}}-{{date("m")}}-{{date("d")}}"/>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Hour</label>
        <div class="controls">
            <input value="{{$data->hour}}" required type="time" name="hour" class="form-control"/>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Status</label>
        <div class="controls">
            <select class="form-control" name="status">
                <option value="Boş">Boş</option>
                <option value="Dolu">Dolu</option>
            </select>
        </div>
    </div>
    <br>
    <div class="form-actions">
        <button type="submit" class="btn btn-success">Update Time</button>
    </div>
</form>
