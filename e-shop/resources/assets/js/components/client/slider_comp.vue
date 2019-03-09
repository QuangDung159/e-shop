<template>
    <div class="home_slider_container">

        <!-- Home Slider -->
        <div class="owl-carousel owl-theme home_slider">
            <!-- Slider Item -->
            <div class="owl-item home_slider_item" v-for="slider in list_slide">
                <div class="home_slider_background"
                     v-bind:style="{backgroundImage : createPath(slider)}"></div>
                <div class="home_slider_content_container">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="home_slider_content" data-animation-in="fadeIn"
                                     data-animation-out="animate-out fadeOut">
                                    <div class="home_slider_title">A new Online Shop experience.</div>
                                    <div class="home_slider_subtitle">Lorem ipsum dolor sit amet, consectetur
                                        adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros. Sed
                                        viverra velit venenatis fermentum luctus.
                                    </div>
                                    <div class="button button_light home_button"><a href="#">Shop Now</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Home Slider Dots -->

        <div class="home_slider_dots_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="home_slider_dots">
                            <ul id="home_slider_custom_dots" class="home_slider_custom_dots">
                                <li class="home_slider_custom_dot active">01.</li>
                                <li class="home_slider_custom_dot">02.</li>
                                <li class="home_slider_custom_dot">03.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: "slider_comp",

        data() {
            return {
                list_slide: [],
                path: ""
            }
        },

        created() {
            this.getListSlider();
        },

        props: [
            "image_path"
        ],

        methods: {
            getListSlider() {
                window.axios.get("api/slider/list_slider")
                    .then(res => {
                            this.list_slide = res.data.list_slider;
                            console.log(this.list_slide);
                        }
                    )
                    .catch(err => {
                            console.log(err.response.data);
                        }
                    )
            },

            createPath(slider) {
                return "url(" + this.image_path + "/slide/" + slider.path + ")";
            }
        },
    }
</script>

<style scoped>

</style>