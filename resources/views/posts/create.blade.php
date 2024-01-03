@extends('layouts.app')
@section('content')

<div class="container">
    <div class="main-body">
        <div class="row">
            <div class="col-lg-10">
                <div class="card mt-4">
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <div><i class="bx bxs-user me-1 font-22"></i></div>
                            <h5 class="mb-0" style="font-size: 1.2em; font-weight: bold;">Create Post</h5>
                        </div>
                        {{-- Form starts here --}}
                        <form class="row g-3" method="post" action="{{ route('posts.store') }}">
                            @csrf

                            <hr>
                            <!-- Post Title -->
                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Title</label>
                                <div class="input-group">
                                    <input type="text" name="title" class="form-control border-start-0" id="inputAddress" placeholder="Add your title">
                                </div>
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Post Description -->
                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Content</label>
                                <div class="input-group">
                                    <textarea name="content" class="form-control border-start-0" id="inputAddress" placeholder="Add your content" rows="5"></textarea>
                                </div>
                                @error('content')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-12 mt-3">
                                <button type="submit" id="submit-button" class="btn btn" style="background-color: rgb(202, 18, 177); color: white;">Create Post</button>
                            </div>

                            {{-- Form ends here --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
{{-- End Section --}}