@extends('dashboard')
@section('admin_content')
<div class="main-content">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Edit Category</h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-body">
                    <?php
                    foreach ($categories as $cate) {
                    ?>
                        <form role="form" action="{{ route('category.update', $cate->id) }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{$cate->name}}" name="name" id="basic-default-name" placeholder="Tên" />
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-message">Status</label>
                                <div class="col-sm-10">
                                    <select value="" name="status" class="form-control input-sm m-bot15">
                                        <option  {{$cate->status == 1 ? 'selected' : ''}}  value="1">Ẩn</option>
                                        <option  {{$cate->status == 2 ? 'selected' : ''}}   value="2">Hiển thị</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-success">Send</button>
                                </div>
                            </div>

                        </form>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection