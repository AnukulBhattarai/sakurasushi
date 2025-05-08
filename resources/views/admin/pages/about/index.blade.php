@extends('admin.layout.main')
@section('title', 'Organization')

@section('content')


    <x-admin.table :values="$about" edit_route="about.edit" view_route="about.show" :hidden_field="['id', 'updated_at', 'created_at', 'facebook', 'instagram', 'twitter', 'linkedin', 'other']" />

@endsection
