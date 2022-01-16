@extends('layouts.home')

@section('title',"Randevu Alma")
@section('keywords',"Randevu Alma")
@section('description',"Randevu Alma")


@section('content')
    <section id="aa-catg-head-banner" style="height: 100px;">
        <ol class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li class="active">Randevu Alma</li>
        </ol>
    </section>
    <section id="aa-blog-archive">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route("user_randevu_store") }}" method="post">
                        @csrf
                        <label for="time_id">Servis&nbsp;:</label>
                        <select name="service_id">
                            @foreach($service_list as $rs)
                                <option value="{{$rs->id}}">{{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($rs->category,$rs->category->title) }}>{{$rs->title}}</option>
                            @endforeach
                        </select>
                        <hr>

                        <label for="time_id">Tarih &nbsp;:</label>
                        <input onchange="vericek('/user/saatgetir/'+this.value)" type="date"min="{{date("Y")}}-{{date("m")}}-{{date("d")}}">
                        <hr>
                        <div class="veriler">

                        </div>
                    </form>
                    <hr>
                </div>
            </div>
        </div>
    </section>
    <script>
        function vericek(a) {
            $.ajax({
                url: a,
                type: 'GET',
                success: function (result) {
                    $('.veriler').html(result);
                }
            });
        }

    </script>


@endsection
