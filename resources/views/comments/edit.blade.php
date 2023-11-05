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
                            <h5 class="mb-0" style="font-size: 1.2em; font-weight: bold;">Edit the comment</h5>
                        </div>
                        {{-- Form starts here --}}
                        <form class="row g-3" method="post" action="{{ route('comments.update', $comment) }}">
                            @method('patch')
                            @csrf
                        
                            <hr>
                            <!-- Comment -->
                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Comment</label>
                                <div class="input-group">
                                    <textarea name="commentUpdate" class="form-control border-start-0" id="inputAddress" placeholder="Add your content" rows="5">{{ $comment->comment }}</textarea>
                                </div>
                            </div>
                            
                            <div class="col-12 mt-3">
                                <button type="submit" id="submit-button" class="btn btn" style="background-color: rgb(202, 18, 177); color: white;">Update Comment</button>
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