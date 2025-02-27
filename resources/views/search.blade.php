@extends('layout')

@section('title',"Result")

@section('content')

    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="bradcumbContent">
            <h2>Result</h2>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Blog Area Start ##### -->
    <div class="blog-area mt-50 section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="academy-blog-posts">
                        <div class="row">
                            <!-- Single Blog Start -->

                                @forelse($result as $r)
                                    <div class="col-12">
                                        <div class="single-blog-post mb-50 wow fadeInUp" data-wow-delay="300ms">
                                            <!-- Post Thumb -->
                                            <div class="blog-post-thumb mb-50">
                                                <img src="{{$r->thumbnail}}" alt="">
                                            </div>
                                            <!-- Post Title -->
                                            <a href="#" class="post-title">{{$r->title}}</a>
                                            <!-- Post Meta -->
                                            <div class="post-meta">
                                                <p>By <a href="#">{{$r->author}}</a> |
                                                    <a href="#">{{$r->created_at}}</a> |
                                                    <a href="#">3 comments</a></p>
                                            </div>
                                            <!-- Post Excerpt -->
                                            <p>{{$r->shortDesc}}</p>
                                            <!-- Read More btn -->
                                            <a href="{{url("blog/{$r->id}")}}" class="btn academy-btn btn-sm mt-15">Read More</a>
                                        </div>
                                    </div>
                                    @empty
                                    <h2>Not found</h2>
                                @endforelse


                        </div>
                    </div>
                    <!-- Pagination Area Start -->
                    <div class="academy-pagination-area wow fadeInUp" data-wow-delay="400ms">
                        <nav>
                            <ul class="pagination">
                                {!! $result->links() !!}
                            </ul>
                        </nav>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="academy-blog-sidebar">
                        <!-- Blog Post Widget -->
                        <div class="blog-post-search-widget mb-30">
                            <form action="{{url('/search')}}" method="post">
                                <input type="hidden" name="_token" value="{{csrf_token()}}";>
                                <input type="text" name="search" placeholder="Search">
                                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                        </div>
                        <!-- Blog Post Catagories -->
                        <div class="blog-post-categories mb-30">
                            <h5>Categories</h5>
                            @foreach($category as $c)
                                <ul>
                                    <li><a href="#">{{$c->category_name}}</a></li>
                                </ul>
                            @endforeach
                        </div>
                        <!-- Latest Blog Posts Area -->
                        <!-- Latest Blog Posts Area -->
                        <div class="latest-blog-posts mb-30">
                            <h5>Latest Posts</h5>
                        @foreach( $link as $l)

                            <!-- Single Latest Blog Post -->
                                <div class="single-latest-blog-post d-flex mb-30" href="{{url("blog/category/{$l->id}")}}">
                                    <div class="latest-blog-post-thumb">
                                        <img href="{{url("blog/{$l->id}")}}" src= {{$l->thumbnail}} alt="">
                                    </div>
                                    <div class="latest-blog-post-content">
                                        <a href="{{url("blog/{$l->id}")}}" class="post-title">
                                            <h6>{{$l->title}}</h6>
                                        </a>
                                        <a href="#" class="post-date">{{$l->created_at}}</a>
                                    </div>
                                </div>
                        @endforeach
                        </div>


                        <!-- Add Widget -->
                        <div class="add-widget" style="padding-bottom: 50px">
                            <a href="#"><img src={{asset("img/blog-img/add.png")}} alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Blog Area End ##### -->
@endsection
