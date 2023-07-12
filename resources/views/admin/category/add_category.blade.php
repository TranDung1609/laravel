@extends('dashboard')
@section('admin_content')

<div class="main-content">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Add Category</h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{route('category.save')}}" method="POST">
                        @csrf
                        <div class="card-body">      
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Tên" />
                                    @error('name')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-message">Status</label>
                                <div class="col-sm-10">
                                    <select name="status" id="status" class="form-control input-sm m-bot15">
                                        <option value="">Status</option>
                                        <option value="1">Ẩn</option>
                                        <option value="2">Hiển thị</option>
                                    </select>
                                    @error('status')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-success">Send</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection