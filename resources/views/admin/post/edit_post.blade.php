@extends('dashboard')
@section('admin_content')
    <div class="main-content">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Edit Post</h4>

        <!-- Basic Layout & Basic with Icons -->
        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
                <div class="card mb-4">

                    <div class="card-body">
                        @foreach ($posts as $post)
                            <form role="form" action="{{ route('post.update', $post->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-name">Tiêu đề</label>
                                    <div class="col-sm-10">
                                        <textarea name="title" class="form-control" rows="1" placeholder="Title">{{ $post->title }}</textarea>
                                        @error('title')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-price">Ảnh Mới</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <input type="file" id="basic-default-image" name="image"
                                                class="form-control" multiple />
                                        </div>
                                        <div>
                                            <img src="{{ asset('/posts/' . "$post->image") }}"
                                                style="max-width: 100px; max-heigh: 10 0px">
                                        </div>
                                        @error('image')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-body">Nội dung</label>
                                    <div class="col-sm-10">
                                        <textarea name="content" id="editor" class="form-control" id="basic-default-body" rows="5" placeholder="Mô tả">{{ $post->content }}</textarea>
                                        @error('content')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-desc">Danh mục</label>
                                    <div class="col-sm-10">
                                        <select name="category_id" class="form-control">
                                            @foreach ($categories as $category)
                                                <option {{ $post->category_id == $category->id ? 'selected' : '' }}
                                                    value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row justify-content-end">
                                    <div class="col-sm-10">
                                        <button name="editPost" type="submit" class="btn btn-success">Send</button>
                                    </div>
                                </div>

                            </form>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
