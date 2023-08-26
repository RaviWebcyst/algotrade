<template>
    <div class="wrapper">
        <Header />
        <sidebar />
        <div class="content-wrapper content-wrapper2">
            <section class="content mt-5">
                <div class="container">
                    <div v-if="posts.length > 0" class="mt-cstm">
                        <div
                            class="card mt-4 mb-4 p-2 text-white post-card"
                            v-for="post in posts"
                        >
                            <div class="card-header">
                                <a href="#">
                                    <img
                                        :src="url + 'logo-gold.png'"
                                        alt=""
                                        style="width: 40px"
                                        class="feed_img rounded-circle"
                                    />
                                </a>
                                <span class="fs-5 ms-3"><a href="javascript:;" @click="$router.go(-1)"><i class="fas fa-arrow-left pr-3"></i></a> The Vinchi</span>
                                <div class="dropdown float-end">
                                    <a
                                        href="#"
                                        role="button"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false"
                                    >
                                        <i
                                            class="ri-more-2-line fs-5 text-light"
                                        ></i>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="#"
                                                >Report</a
                                            >
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="card-title mb-2 h4">
                                    {{ post.title }}
                                </p>
                                <p class="card-text">{{ post.description }}</p>
                                <div class="text-center">
                                    <a href="#"
                                        ><img
                                            :src="url + 'posts/' + post.image"
                                            alt=""
                                            class="w-100"
                                    /></a>
                                </div>
                            </div>
                            <!-- <div class="d-flex mt-3  px-4 align-items-center">
                                <a href="" class="d-flex mx-3 text-light">
                                    <i class="ri-heart-line px-1"></i>
                                    <p class=" px-1">likes</p>
                                </a>
                                <a href="" class="d-flex mx-3 text-light">
                                    <i class="ri-chat-3-line px-1"></i>
                                    <p class=" px-1">comments</p>
                                </a>
                                <a href="" class="d-flex mx-3 text-light">
                                    <i class="ri-share-fill px-1"></i>
                                    <p class=" px-1">Share</p>
                                </a>
                            </div> -->
                        </div>
                    </div>
                    <div v-else>
                        <div class="text-center">
                            <h2 class="text-primary">No Posts Found</h2>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</template>

<script>
import Pagination from "vue-pagination-2";
import moment from "moment";
import Header from "./header.vue";
import sidebar from "./sidebar.vue";

export default {
    name: "posts",
    components: {
        Pagination,
        Header,
        sidebar,
    },
    data() {
        return {
            url: process.env.mix_api_url,
            posts: [],
        };
    },
    created() {
        this.getPosts();
    },

    methods: {
        moment(date) {
            return moment(date);
        },
        getPosts() {
            axios
                .get(this.url + "api/posts")
                .then((res) => {
                    this.posts = res.data.posts;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
    },
};
</script>
