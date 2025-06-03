@props(['publication'])
<div class="col-lg-4 col-md-6 shadow-sm">
    <div class="single-blog-post">
        <div class="blog-img" style="height: 300px; overflow: hidden;">
            <img src="{{ asset('storage/' . $publication->thumbnail) }}"
                style="height: 100%; width:100%; object-fit:cover;" alt="Card Image">
        </div>

        <div class="my-2">
            <a href="{{ asset('storage/' . $publication->file) }}" target="_blank" style="text-decoration: none;">
                <h4 class="mb-2">{{ $publication->title }}</h4>
            </a>
            <a href="{{ asset('storage/' . $publication->file) }}"
                download="{{ asset('storage/' . $publication->file) }}" class=" d-flex align-items-center">
                <i class="fa-solid fa-download me-2"></i>Download PDF</a>
        </div>
    </div>
</div>
