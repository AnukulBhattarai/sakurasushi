@props(['banner'])

<style>
    .hero-carousel .carousel-item {
        height: 100vh;
        background-size: cover;
        background-position: center;
        position: relative;
        color: white;
    }

    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.4);
        /* dark overlay */
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem;
    }

    .hero-content {
        text-align: left;
        max-width: 700px;
    }

    .hero-content h1 {
        font-size: 3rem;
        font-weight: bold;
        color: #fff;
    }

    .hero-content p {
        color: #ddd;
    }

    .hero-content .btn {
        margin-top: 1rem;
    }

    @media (max-width: 768px) {
        .hero-content h1 {
            font-size: 2rem;
        }
    }
</style>

<div id="heroCarousel" class="carousel slide hero-carousel" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach ($banner as $hero)
            <div class="carousel-item active"
                style="background-image: url('{{ asset('storage/' . $hero->background) }}'); height: 100vh;">
                <div class="hero-overlay">
                    <div class="hero-content text-start">
                        <h1 class="mb-2">Develop Your Skills with Online Courses From A Pro</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.
                        </p>

                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </button>
</div>
