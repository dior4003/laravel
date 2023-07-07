<x-layouts.main>
    <!-- Header Start -->
    <x-header>

    </x-header>
    <!-- Header End -->

    <x-page-header>Post edit</x-page-header>

    <!-- Form Start -->
    <div class="container">

        <div class="row">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="contact-form">
                    <div id="success"></div>
                    {{-- @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}
                    <form action="{{ route('post.update', ['post' => $post->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-row">
                            <div class="col-sm-6 control-group">
                                <input type="text" class="form-control p-4" value="{{ $post->title }}"
                                    placeholder="Title" name="title" />
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                {{-- @dd($post->title) --}}
                            </div>
                            <div class="col-sm-6 control-group">
                                <input type="text" class="form-control p-4" value="{{ $post->short_content }}"
                                    placeholder="Short content" name="short_content" />
                                @error('short_content')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="control-group">
                            <textarea class="form-control p-4" rows="6" placeholder="Content" name="content">{{ $post->content }}</textarea>
                            @error('content')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="control-group">
                            <input type="file" style="display: none" value="{{ $post->photo }}" id="photo"
                                name="photo" />
                            <label class="form-control p-4 d-flex align-items-center justify-content-center"
                                for="photo">
                                <img class="img-fluid rounded" width="30px"
                                    src="https://www.kindpng.com/picc/m/77-773420_cloud-icon-png-upload-icon-font-awesome-transparent.png"
                                    alt="">
                            </label>
                            @error('photo')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-flex">
                            <button class="btn btn-primary btn-block py-3 px-5" type="submit"
                                id="sendMessageButton">Submit</button>
                            <a href="{{ route('post.show', ['post' => $post->id]) }}"
                                class="btn btn-danger btn-block py-3 px-5">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="img_div" style="width: 100%;display:flex;justify-content:center">
                    <img id="blah" src="/storage/{{ $post->photo }}" alt=""
                        style="width: 80%; object-fit:cover" class="img-fluid rounded w-75 mb-4" />
                </div>
            </div>
        </div>
    </div>

    <!-- Form End -->

    <!-- Footer Start -->
    <x-footer>

    </x-footer>
    <!-- Footer End -->
</x-layouts.main>
