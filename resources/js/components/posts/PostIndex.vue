<template>
    <div>
        <router-link :to="{name: 'createPost'}" class="btn btn-success">Create new post</router-link>
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Slug</th>
                <th width="100">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(post, index) in posts">
                <td>{{ post.name }}</td>
                <td>{{ post.slug }}</td>
                <td>
                    <router-link :to="{name: 'editPost', params: {id: post.id}}" class="btn btn-xs btn-default">
                        Edit
                    </router-link>
                    <a href="#"
                       class="btn btn-xs btn-danger"
                       v-on:click="deleteEntry(post.id, index)">
                        Delete
                    </a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                posts: []
            }
        },
        mounted() {
            var app = this;
            axios.get('/api/posts')
                .then(function (resp) {
                    app.posts = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load posts");
                });
        },
        methods: {
            deleteEntry(id, index) {
                if (confirm("Do you really want to delete it?")) {
                    var app = this;
                    axios.delete('/api/posts/' + id)
                        .then(function (resp) {
                            app.posts.splice(index, 1);
                        })
                        .catch(function (resp) {
                            alert("Could not delete posts");
                        });
                }
            }
        }
    }
</script>
