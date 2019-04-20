@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <ul class="list-group">
                <router-link to="/home" tag="li" active-class="active" class="list-group-item">Home</router-link>
                <router-link to="/lists" tag="li" active-class="active" class="list-group-item">Lists</router-link>
                <router-link to="/list_items" tag="li" active-class="active" class="list-group-item">List Items</router-link>
                <router-link to="/account" tag="li" active-class="active" class="list-group-item">Account</router-link>
            </ul>
        </div>
        <div class="col-md-9">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <router-view></router-view>
        </div>
    </div>
</div>
@endsection
