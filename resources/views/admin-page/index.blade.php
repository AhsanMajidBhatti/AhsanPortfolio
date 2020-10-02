@extends('admin-page.layouts.main')

@include('admin-page.components.header')
    @include('admin-page.components.navbar')
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                @include('admin-page.components.sidebar')
            </div>
            <div id="layoutSidenav_content">
                @yield('content')
            @include('admin-page.components.footer')
