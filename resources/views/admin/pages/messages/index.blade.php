@extends('admin.layout.main')
@section('title', 'Messages')



@section('content')


    <x-admin.table :values="$messages" :hidden_field="['id', 'extra', 'created_at', 'updated_at']" status_route="publication.status" />

@endsection
