@extends('layouts.main')
@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Blog single page</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up"
               data-aos-delay="200">{{ $date->translatedFormat('F') }} {{ $date->day }}
                • {{ $date->year }} {{$date->format('H:i')}} • {{ $post->comments->count() }} комментарий(-ев)</p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{ asset('storage/' . $post->main_image) }}" alt="featured image" class="w-100">
            </section>
            <section class="post-content">
                <div class="row">
                    {!! $post->content !!}
                </div>
            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <section class="related-posts">
                        <h2 class="section-title mb-4" data-aos="fade-up">Схожие посты</h2>
                        <div class="row">
                            @foreach($relatedPosts as $relatedPost)
                                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                                    <img src="{{ asset('storage/' . $relatedPost->preview_image) }}" alt="related post"
                                         class="post-thumbnail">
                                    <p class="post-category">{{ $relatedPost->category->title }}</p>
                                    <a href="{{ route('posts.show', $relatedPost->id) }}"><h5
                                            class="post-title">{{ $relatedPost->title }}</h5></a>
                                </div>
                            @endforeach
                        </div>
                    </section>
                    @auth()
                    <section class="comment-section">
                        <div class="mb-5">
                            @auth()
                                <form action="{{ route('posts.likes.store', $post) }}" method="post">
                                    @csrf
                                    <span>{{ $post->likes_from_users_count }}</span>
                                    <button type="submit" class="border-0 bg-transparent">

                                        @if(auth()->user()->likedPosts->contains($post))
                                            <i class="fas fa-heart"></i>
                                        @else
                                            <i class="far fa-heart"></i>
                                        @endif
                                    </button>
                                </form>
                            @endauth
                            @guest()
                                <div>
                                    <span>{{ $post->likes_from_users_count }}</span>
                                    <span><i class="far fa-heart"></i></span>
                                </div>
                            @endguest
                        </div>
                        <h2 class="section-title mb-5" data-aos="fade-up">Отправить комментарий</h2>
                        <form action="{{ route('posts.comments.store', $post) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12" data-aos="fade-up">
                                    <label for="comment" class="sr-only">Comment</label>
                                    <textarea name="message" id="comment" class="form-control"
                                              placeholder="Напишите комментарий!" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="row">
                            </div>
                            <div class="row">
                                <div class="col-12" data-aos="fade-up">
                                    <input type="submit" value="Send Message" class="btn btn-warning">
                                </div>
                            </div>
                        </form>
                    </section>
                    @endauth
                    <section class="comment-list mb-4">
                        <h2 class="section-title mb-5" data-aos="fade-up">Комментарии {{ $post->comments->count() }}</h2>
                        @foreach($post->comments as $comment)
                        <div class="comment-text mb-4">
                            <span class="username">
                                <div class="font-weight-bold">
                                    {{ $comment->user->name }}
                                </div>
                              <span class="text-muted float-right">{{ $comment->createdDate->diffForHumans() }}</span>
                            </span><!-- /.username -->
                            {{ $comment->message }}
                        </div>
                        @endforeach
                    </section>
                </div>
            </div>
        </div>
    </main>
@endsection
