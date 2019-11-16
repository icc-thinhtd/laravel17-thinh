<div class="container">
        <div class="row">
        <div class="col-lg-8">
            <div id="banner_top" class="carousel slide" data-ride="carousel">

                <!-- Indicators -->
                <ul class="carousel-indicators">
                    @foreach($banners as $key => $banner)
                        <li data-target="#banner_top" data-slide-to="{{$key}}" class="active"></li>
                    @endforeach
                </ul>

                <!-- The slideshow -->
                <div class="carousel-inner">
                    @foreach($banners as $key => $banner)
                        <div class="carousel-item @if($key==0) active @endif">
                            <img src="{{$banner->path}}" alt="{{$banner->slug}}" width="100%">
                        </div>
                    @endforeach
                </div>

                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#banner_top" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#banner_top" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
        <div class="col-lg-4">
            <h3 class="bg-danger">Tin công nghệ</h3>
            <ul>
                <li>
                    <div>
                        <div>
                            <div class="float-left">
                                <img src="/images/img-01.png" alt="imgaes" style="width: 100px;">
                            </div>
                            <div>
                                <a href="#">Google xác nhận sẽ ngừng cập nhật phần mềm cho bộ đôi Pixel và Pixel XL</a>
                                <br>
                                <p>11/11/2019</p>
                            </div>
                        </div>
                    </div>
                </li>
                <li><a href="#"><img src="/images/news-01.png" alt="news" width="100%"></a></li>
                <li><a href="#"><img src="/images/news-02.png" alt="news" width="100%"></a></li>
            </ul>
        </div>
    </div>
</div>
