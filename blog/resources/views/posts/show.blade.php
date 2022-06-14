@extends('layouts.main')
@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Blog single page</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">{{ $date->translatedFormat('F') }} {{ $date->day }} • {{ $date->year }} {{$date->format('H:i')}} • {{ $post->comments->count() }} комментарий(-ев)</p>
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
                        <h2 class="section-title mb-4" data-aos="fade-up">Related Posts</h2>
                        <div class="row">
                            <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                <img src="assets/images/blog_post_related_1.png" alt="related post" class="post-thumbnail">
                                <p class="post-category">Blog post</p>
                                <h5 class="post-title">Front becomes an official Instagram</h5>
                            </div>
                            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                                <img src="assets/images/blog_post_related_2.png" alt="related post" class="post-thumbnail">
                                <p class="post-category">Blog post</p>
                                <h5 class="post-title">Front becomes an official Instagram</h5>
                            </div>
                            <div class="col-md-4" data-aos="fade-left" data-aos-delay="100">
                                <img src="assets/images/blog_post_related_3.png" alt="related post" class="post-thumbnail">
                                <p class="post-category">Blog post</p>
                                <h5 class="post-title">Front becomes an official Instagram</h5>
                            </div>
                        </div>
                    </section>
                    <section class="comment-section">
                        <h2 class="section-title mb-5" data-aos="fade-up">Leave a Reply</h2>
                        <form action="/" method="post">
                            <div class="row">
                                <div class="form-group col-12" data-aos="fade-up">
                                    <label for="comment" class="sr-only">Comment</label>
                                    <textarea name="comment" id="comment" class="form-control" placeholder="Comment" rows="10">Comment</textarea>
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
                </div>
            </div>
        </div>
    </main>
@endsection
