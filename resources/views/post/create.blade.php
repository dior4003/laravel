<x-layouts.main>
    <!-- Header Start -->
    <x-header>

    </x-header>
    <!-- Header End -->

    <x-page-header>Post create</x-page-header>

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
                    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-sm-6 control-group">
                                <input type="text" class="form-control p-4" value="{{ old('title') }}"
                                    placeholder="Title" name="title" />
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6 control-group">
                                <input type="text" class="form-control p-4" value="{{ old('short_content') }}"
                                    placeholder="Short content" name="short_content" />
                                @error('short_content')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <input type="hidden" name="user_id" value="1">

                        <div class="control-group my-2">
                            <textarea class="form-control p-4" rows="6" placeholder="Content" name="content">{{ old('title') }}</textarea>
                            @error('content')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="control-group">
                            <select class="form-control " name="category">
                                <label for="category"></label>
                                <option disabled selected>Not Selected</option>
                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach

                            </select>
                            @error('category')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="control-group my-2">
                            <select id="multipleselect" class="form-control " placeholder="Select tags" multiple
                                name="tag[]">
                                @foreach ($tags as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach

                            </select>

                        </div>

                        <div class="control-group my-2">
                            <input type="file" style="display: none" value="{{ old('photo') }}" id="photo"
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

                        <div>
                            <button class="btn btn-primary btn-block py-3 px-5" type="submit"
                                id="sendMessageButton">Create</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="img_div " style="width: 100%;display:flex;justify-content:center">
                    <img id="blah" src="#" alt="your image" style="width: 80%; object-fit:cover"
                        class="img-fluid rounded w-75 mb-4" />
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
