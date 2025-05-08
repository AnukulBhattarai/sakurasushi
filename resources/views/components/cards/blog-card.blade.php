@props(['blog'])
<div class="col-xl-4 col-lg-4 col-md-6 mb-30">
    <div class=it-blog-item-box data-background="{{ asset('img/blog/bg-1.jpg') }}">
        <div class=it-blog-item>
            <div class="it-blog-thumb fix">
                <a href="{{ route('blog.detail', $blog->id) }}">
                    <div style="height: 280px; overflow: hidden;">
                        <img src="{{ asset('storage/' . $blog->thumbnail) }}"
                            style="height: 100%; width:100%; object-fit:cover;" alt="">
                    </div>
                </a>
            </div>
            <div class="it-blog-meta pb-15">
                <span>
                    <i class="fa-solid fa-calendar-days"></i>
                    {{ \Carbon\Carbon::parse($blog->created_at)->format('d F Y') }}</span></span>
            </div>
            <h4 class=it-blog-title><a href="{{ route('blog.detail', $blog->id) }}">{{ $blog->title }}</a></h4>
            <a class="it-btn sm" href="{{ route('blog.detail', $blog->id) }}">
                <span>
                    Read more
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
