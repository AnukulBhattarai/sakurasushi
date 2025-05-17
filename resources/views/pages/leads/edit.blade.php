@extends('layouts.main')
@section('body')
    <x-global.breadcrumb title="Edit Student" />
    <div class="it-student-area py-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="it-student-bg">
                        <div class="it-student-regiform">
                            <form action="{{ route('lead.update', $lead->id) }}" method="post">
                                @csrf
                                <div class="it-student-regiform-wrap">
                                    <div class="it-student-regiform-item">
                                        <label> Name *</label>
                                        <input type="text" name="name" value="{{ $lead->name }}" />
                                    </div>
                                    <div class="it-student-regiform-item">
                                        <label>Email *</label>
                                        <input type="email" name="email" placeholder="Student Email"
                                            value="{{ $lead->email }}" />
                                    </div>
                                    <div class="it-student-regiform-item">
                                        <label>Phone Number *</label>
                                        <input type="number" name="phone" placeholder="Student Number"
                                            value="{{ $lead->phone }}" />
                                    </div>

                                    <div class="it-student-regiform-item">
                                        <label>Course *</label>
                                        <div class="postbox__select">
                                            <select name="program_id">
                                                @foreach ($courses as $course)
                                                    <option @if ($course->id == $lead->program_id) selected @endif
                                                        value="{{ $course->id }}">{{ $course->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="it-student-regiform-btn">
                                        <button class="it-btn w-100">
                                            <span>
                                                Submit
                                                <svg width="17" height="14" viewBox="0 0 17 14" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11 1.24023L16 7.24023L11 13.2402" stroke="currentcolor"
                                                        stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M1 7.24023H16" stroke="currentcolor" stroke-width="1.5"
                                                        stroke-miterlimit="10" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
