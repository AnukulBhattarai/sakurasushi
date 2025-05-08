@extends('admin.layout.main')
@section('title', 'Organization')
@section('content')

    <x-admin.table-view :values="$value" edit_route="organization.edit" label="Organization" />



@endsection
