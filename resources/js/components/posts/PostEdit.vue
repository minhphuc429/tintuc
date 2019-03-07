<template>
    <div>
        <router-link :to="{name: 'categories.list'}" class="btn btn-default">Back</router-link>

        <form v-on:submit="saveForm() ">
            <div class="col-md-8">
                <div class="form-group">
                    <label>Post Content</label>
                    <ckeditor :editor="editor" v-model="post.content" :config="editorConfig"></ckeditor>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Post Title</label>
                    <input type="text" v-model="post.title" class="form-control">
                </div>

                <div class="form-group">
                    <label>Post Slug</label>
                    <input type="text" v-model="post.slug" class="form-control">
                </div>

                <div class="form-group">
                    <label>Post thumbnail</label>
                    <!--<input type="file" @change="handleFileChange"/>-->

                    <div class="row">
                        <div class="col-md-3" v-if="post.thumbnail">
                            <img :src="post.thumbnail" class="img-responsive" height="70" width="90">
                        </div>
                        <div class="col-md-6">
                            <input type="file" v-on:change="onImageChange" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Post description</label>
                    <textarea v-model="post.description" cols="30" rows="2" class="form-control"></textarea>
                </div>

                <!--<div class="form-group">-->
                <!--<label>Post Tag</label>-->

                <!--</div>-->

                <div class="form-group">
                    <label>Post Category</label>
                    <select class="form-control" v-model="post.category_id" id="category">
                        <option v-for="category in categories" :value="category.id">
                            {{ category.name }}
                        </option>
                    </select>
                </div>
            </div>
            <button class="btn btn-success" type="submit">Save</button>
        </form>
    </div>
</template>

<script>
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
    import axios from 'axios';
    export default {
        mounted() {
            let app = this;
            let id = app.$route.params.id;
            app.categoryId = id;
            axios.get('/api/posts/' + id)
                .then(function (resp) {
                    app.category = resp.data;
                })
                .catch(function () {
                    alert("Could not load your category")
                });
        },
        data: function () {
            return {
                editor: ClassicEditor,
                editorConfig: {
                    //
                },
                // tags: {
                //     id: '',
                //     name: '',
                //     slug: ''
                // },
                categories: {
                    id: '',
                    name: '',
                    slug: ''
                },
                postId: '',
                post: {
                    title: '',
                    slug: '',
                    thumbnail: '',
                    description: '',
                    category_id: '',
                    content: '<p>Content of the editor.</p>'
                }
            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newPost = app.post;
                axios.patch('/api/posts/' + app.postId, newPost)
                    .then(function (resp) {
                        // app.$router.replace('/');
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your post");
                    });
            }
        }
    }
</script>
