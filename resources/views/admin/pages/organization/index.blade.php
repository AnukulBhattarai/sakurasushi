@extends('admin.layout.main')
@section('title', 'Organization')

@section('content')


    <x-admin.table :values="$organizations" edit_route="organization.edit" view_route="organization.show" :hidden_field="['id', 'updated_at', 'created_at', 'facebook', 'instagram', 'twitter', 'linkedin', 'other']" />

@endsection
