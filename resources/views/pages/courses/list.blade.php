@extends('layouts.main')
@section('body')
    <x-global.breadcrumb title="Courses" />

    <!--=====================================-->
    <!--=        Courses Area Start         =-->
    <!--=====================================-->
    <div class="it-course-area p-relative grey-bg pt-120 pb-120">
        <div class="container">
            <div class="row">
                @forelse ($courses as $course)
                    <x-cards.course-card :course="$course" />
                @empty
                    <div class="col-12">
                        <div class="alert alert-warning text-center">
                            <strong>No courses available at the moment.</strong>
                        </div>
                    </div>
                @endforelse

            </div>
        </div>
    </div>
@endsection
