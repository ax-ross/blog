@extends('personal.layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Комментарии</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Комментарии</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Понравившиеся посты</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right"
                                           placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Пост</th>
                                    <th>Сообщение</th>
                                    <th>Дата обновления</th>
                                    <th>Дата добавления</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($comments as $comment)
                                    <tr>
                                        <td>{{ $comment->id }}</td>
                                        <td>{{ $comment->post->title }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($comment->message, 20) }}</td>
                                        <td>{{ $comment->updated_at }}</td>
                                        <td>{{ $comment->created_at }}</td>
                                        <td>
                                            <a class="mx-2"
                                               href="{{ route('personal.comments.show', $comment->id) }}"><i
                                                    class="fa fa-eye"></i></a>
                                        </td>
                                        <td><a class="mx-2"
                                               href="{{ route('personal.comments.edit', $comment->id) }}"><i
                                                    class="fa fa-pencil-alt"></i></a></td>
                                        <td>
                                            <form action="{{ route('personal.comments.destroy', $comment->id) }}"
                                                  method="post">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="text-danger border-0 bg-transparent">
                                                    <i class="far fa-trash-alt" role="button"></i>
                                                </button>
                                            </form>
                                        </td>

                                        <td></td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
