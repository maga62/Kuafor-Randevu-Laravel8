@extends('layouts.home')

@section('title',"User Profil")


@section('content')
    <!-- catg header banner section -->
    <section id="aa-catg-head-banner" style="height: 100px;">
        <ol class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li class="active">User Randevu</li>
        </ol>
    </section>
    <section id="aa-blog-archive" >
        <div class="container" style="margin-bottom:50px;">
            <div class="row">
                @include("home.flash-message")
                <div class="col-md-12">

                    @include("home.usermenu")
                    <div class="col-md-9" style="background-color: lightgoldenrodyellow">
                        <div class="checkout-right">
                            <h4>Randevular</h4>
                            <div class="aa-order-summary-area">
                                <table class="table table-responsive">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Service</th>
                                        <th>Tarih</th>
                                        <th>Saat</th>
                                        <th>Durum</th>
                                        <th>İşlem</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($datalist as $rs)
                                        <tr>
                                            <td>{{$rs->id}}</td>
                                            <td>{{$rs->service->title}}</td>
                                            <td>{{$rs->time->date}}</td>
                                            <td>{{$rs->time->hour}}</td>
                                            <td>{{$rs->status}}</td>
                                            <td> <a href="{{ route("user_randevu_destroy",['id'=>$rs->id]) }}" onclick="return confirm('İptal etmek istediğinizden eminmisiniz ?')" class="btn btn-danger btn-mini" style="float: right;">İptal Et</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>



                    </div>

                </div>

            </div>
        </div>
    </section>




@endsection

