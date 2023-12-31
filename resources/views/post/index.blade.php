<x-layouts.main>
    <!-- Header Start -->
    <x-header>

    </x-header>
    <!-- Header End -->

    <x-page-header> Blogs</x-page-header>



    <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row align-items-end mb-4">
                <div class="col-lg-6">
                    <h6 class="text-secondary font-weight-semi-bold text-uppercase mb-3">Latest Blog</h6>
                    <h1 class="section-title mb-3">Latest Articles From Our Blog Post</h1>
                </div>
                <div class="col-lg-6">
                    <h4 class="font-weight-normal text-muted mb-3">Eirmod kasd duo eos et magna, diam dolore stet sea
                        clita sit ea erat lorem. Ipsum eos ipsum magna lorem stet</h4>
                </div>
            </div>
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-lg-4 col-md-6 mb-5">
                        <div class="position-relative mb-4">
                            <img class="img-fluid rounded w-100 h-75" src="storage/{{ $post->photo }}"
                                alt="{{ $post->title }}" style="max-height: 400px">
                            <div class="blog-date">
                                <h4 class="font-weight-bold mb-n1">01</h4>
                                <small class="text-white text-uppercase">Jan</small>
                            </div>
                        </div>
                        <div class="d-flex mb-2">
                            @foreach ($post->tags as $tag)
                                <a class="text-secondary text-uppercase font-weight-medium"
                                    href="">{{ $tag->name }}</a>
                                <span class="text-primary px-2">|</span>
                            @endforeach


                        </div>
                        <div class="d-flex mb-2">
                            <h5 class="text-secondary text-uppercase font-weight-medium">{{ $post->category->name }}
                            </h5>
                        </div>
                        <h5 class="font-weight-medium mb-2">{{ $post->title }}</h5>
                        <p class="mb-4">{{ $post->short_content }}</p>
                        <a class="btn btn-sm btn-primary py-2"
                            href="{{ route('post.show', ['post' => $post->id]) }}">Read
                            More</a>
                    </div>
                @endforeach
                <div class="col-12">
                    <nav aria-label="Page navigation justify-content-center">
                        {{ $posts->links() }}
                    </nav>
                </div>

            </div>
        </div>
    </div>
    <!-- Blog End -->


    <!-- Footer Start -->
    <x-footer>

    </x-footer>
    <!-- Footer End -->
</x-layouts.main>
