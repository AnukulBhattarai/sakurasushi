@extends('admin.layout.main')
@section('title', 'Subscribed Emails')
@section('actions')
    @php
        use App\Models\Newsletter;

        // Fetch all subscribed emails and create a comma-separated list
        $emails = Newsletter::pluck('email')->toArray();
        $emailList = implode(',', $emails);
    @endphp
    @if (count($emails) > 0)
        <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ urlencode($emailList) }}" target="_blank"
            class="btn btn-primary">
            Send Newsletter via Gmail
        </a>
    @endif
@endsection

@section('content')

    <x-admin.table :values="$newsletter" :hidden_field="['id', 'slug', 'created_at', 'extra', 'updated_at']" />

@endsection
