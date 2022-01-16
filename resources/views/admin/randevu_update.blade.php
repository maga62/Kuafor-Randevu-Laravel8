<link href="{{ asset("assets/admin") }}/css/bootstrap.min.css" rel="stylesheet">
<link href="{{ asset("assets/admin") }}/font-awesome/css/font-awesome.css" rel="stylesheet">

<!-- Toastr style -->
<link href="{{ asset("assets/admin") }}/css/plugins/toastr/toastr.min.css" rel="stylesheet">

<!-- Gritter -->
<link href="{{ asset("assets/admin") }}/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

<link href="{{ asset("assets/admin") }}/css/animate.css" rel="stylesheet">
<link href="{{ asset("assets/admin") }}/css/style.css" rel="stylesheet">
@include("home.flash-message")
<h3 style="margin: 10px;text-align: center;">Randevu Detail</h3>
<form style="margin: 20px;" enctype="multipart/form-data" action="{{ route('admin_randevu_update',['id'=>$data->id]) }}" method="post" class="form-horizontal">
    @csrf
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-10">
            <input value="{{ $data->user->name }}"  type="text" disabled class="form-control" placeholder="Name" />
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Service</label>
        <div class="col-sm-10">
            <input value="{{ $data->service->title }}"  type="text" disabled class="form-control" placeholder="Service" />
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Date</label>
        <div class="col-sm-10">
            <input  value="{{ $data->time->date }}" type="text" disabled class="form-control" placeholder="Date"  />
        </div>
    </div><div class="form-group row">
        <label class="col-sm-2 col-form-label">Hour</label>
        <div class="col-sm-10">
            <input  value="{{ $data->time->hour }}" type="text" disabled class="form-control" placeholder="Hour"  />
        </div>
    </div>
    <div class="form-group row" >
        <label class="col-sm-2 col-form-label">Status</label>
        <div class="col-sm-10">
            <select class="form-control" name="status" >
                <option value="Onaylandı">Onayla</option>
                @if($data->status=="Onay Bekliyor")
                    <option selected value="Onay Bekliyor">Onay Beklet</option>
                @else
                    <option value="Onay Bekliyor">Onay Beklet</option>
                @endif
            </select>
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-success">Update</button>
    </div>


</form>