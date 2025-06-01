@props(['courses'])
<div class="it-course-area p-relative grey-bg pt-120 pb-120">
    <div class="it-course-shape-1 d-none d-xl-block">
        <img src="{{ asset('img/course/shape-1-1.png') }}" alt="">
    </div>
    <div class="it-course-shape-3 d-none d-xl-block">
        <img src="{{ asset('img/course/shape-1-3.png') }}" alt="">
    </div>
    <div class="it-course-shape-4 d-none d-xl-block">
        <img src="{{ asset('img/course/shape-1-4.png') }}" alt="">
    </div>
    <div class=container>
        <div class=row>
            <div class=col-xl-12>
                <div class="it-course-title-box text-center mb-70">
                    <span class=it-section-subtitle-2>Top Popular Course</span>
                    <h4 class=it-section-title>Histudy Course
                        student can <br> join with us.
                    </h4>
                </div>
            </div>
            @foreach ($courses as $course)
                <x-cards.course-card :course="$course" />
            @endforeach

            <div class=col-xl-12>
                <div class="it-course-button text-center pt-45">
                    <a class=it-btn href={{ route('courses') }}>
                        <span>
                            Load More Course
                            <svg width=17 height=14 viewBox="0 0 17 14" fill=none xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 1.24023L16 7.24023L11 13.2402" stroke=currentcolor stroke-width=1.5
                                    stroke-miterlimit=10 stroke-linecap=round stroke-linejoin=round />
                                <path d="M1 7.24023H16" stroke=currentcolor stroke-width=1.5 stroke-miterlimit=10
                                    stroke-linecap=round stroke-linejoin=round />
                            </svg>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
