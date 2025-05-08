@extends('layouts.main')

@section('body')
    <x-global.breadcrumb :title="$album->name" />


    <style>
        .gallery-img {
            transition: 0.3s ease;
            object-fit: cover;
            height: 200px;
            width: 100%;
        }

        .gallery-img:hover {
            transform: scale(1.03);
        }
    </style>

    <!-- Gallery Section -->
    <div class="it-course-area p-relative grey-bg pt-120 pb-120">
        <div class="container">
            <div class="row">
                @foreach ($album->image as $index => $img)
                    {{-- {{ dd($img) }} --}}
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <img src="{{ asset('storage/' . $img->image) }}" class="img-fluid gallery-img" data-bs-toggle="modal"
                            data-bs-target="#imageModal" data-bs-img="{{ asset('storage/' . $img->image) }}"
                            alt="Gallery Image {{ $index + 1 }}">
                    </div>
                @endforeach
            </div>
        </div>
        </section>

        <!-- Modal -->
        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content bg-transparent border-0">
                    <div class="modal-body p-0">
                        <img src="" class="img-fluid w-100 rounded" id="modalImage" alt="Enlarged Image">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script to load clicked image into modal -->
    <script>
        document.querySelectorAll('.gallery-img').forEach(img => {
            img.addEventListener('click', function() {
                const src = this.getAttribute('data-bs-img');
                document.getElementById('modalImage').setAttribute('src', src);
            });
        });
    </script>
@endsection
