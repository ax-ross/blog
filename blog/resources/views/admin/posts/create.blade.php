@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Посты</a></li>
                            <li class="breadcrumb-item active">Добавление поста</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid ml-5">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="card card-primary col-lg-6 p-0">
                        <div class="card-header">
                            <h3 class="card-title">Добавить пост</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Название поста</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                           placeholder="Введите название поста" required value="{{ old('title') }}">
                                    @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="summernote">Контент поста</label>
                                    <textarea name="content" id="summernote" class="form-control">{{ old('content') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="preview_image">Изображение для превью</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input btn" id="preview_image"
                                                   name="preview_image">
                                            <label class="custom-file-label" for="preview_image">Выберите
                                                изображение</label>
                                        </div>
                                    </div>
                                    @error('preview_image')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="main_image">Добавить основное изображение</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input form-control btn"
                                                   id="main_image" name="main_image">
                                            <label class="custom-file-label" for="main_image">Выберите
                                                изображение</label>
                                        </div>
                                    </div>
                                    @error('main_image')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Категория</label>
                                    <select class="form-control" name="category_id">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}"
                                                    @if(old('category_id') == $category->id) selected @endif>{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Теги</label>
                                    <select class="select2" multiple="multiple" data-placeholder="Выберите теги" style="width: 100%;" name="tag_ids[]">
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->id }} @if(is_array(old('tag_ids')) && in_array($tag->id, old('tag_ids'))) selected @endif">{{ $tag->title }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <input type="submit" class="btn btn-primary" value="Добавить">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.row -->

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
