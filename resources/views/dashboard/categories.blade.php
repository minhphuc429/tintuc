@extends('dashboard.master')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="box-header">
                    <h3 class="box-title">Categories</h3>
                </div>

                <div class="box-body">
                    <router-view name="categoriesIndex"></router-view>
                    <router-view></router-view>
                </div>
            </div>
        </div>
    </div>
@endsection
