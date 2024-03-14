@extends('layouts.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="card mb-30">
                    <div class="card-body">
                        <a href="/setting/impressum/edit" class="btn btn-primary float-right">Edit</a>
                        {!!$impData!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


