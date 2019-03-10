<div class="home">
    <div class="home_slider_container">

        <!-- Home Slider -->
        <div class="owl-carousel owl-theme home_slider">

            <!-- Slider Item -->
            @foreach($list_slider as $slider)
                <div class="owl-item home_slider_item">
                    <div class="home_slider_background"
                         style="background-image:url({{$IMAGE_PATH."/slide/".$slider->path}})"></div>
                </div>
            @endforeach
        </div>

        <!-- Home Slider Dots -->

        <div class="home_slider_dots_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="home_slider_dots">
                            <ul id="home_slider_custom_dots" class="home_slider_custom_dots">
                                <?php $count = 0?>
                                @foreach($list_slider as $slider)
                                    @if($count == 0)
                                        <li class="home_slider_custom_dot active">{{$count + 1}}&nbsp&nbsp</li>
                                    @else
                                        <li class="home_slider_custom_dot">{{$count + 1}}&nbsp&nbsp</li>
                                    @endif
                                    <?php $count++?>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>