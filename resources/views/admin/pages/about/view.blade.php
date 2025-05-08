@extends('admin.layout.main')
@section('title', 'About')
@section('content')

    <x-admin.table-view :values="$value" :hidden_field="['id', 'description', 'slug', 'created_at', 'extra', 'updated_at']" edit_route="about.edit" label="Organization" />



@endsection
