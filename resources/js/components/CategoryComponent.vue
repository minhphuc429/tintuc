<template>
    <div class='row'>
        <h1>My Tasks</h1>
        <h4>New Task</h4>
    </div>
</template>

<script>
    export default {
        name: "CategoryComponent",
        data() {
            return {
                list: [],
                task: {
                    id: '',
                    body: ''
                }
            };
        },

        created() {
            this.fetchTaskList();
        },

        methods: {
            fetchTaskList() {
                axios.get('api/categories').then((res) => {
                    this.list = res.data;
                    console.log(res.body)
                });
            },

            createTask() {
                axios.post('api/categories', this.task)
                    .then((res) => {
                        this.task.body = '';
                        this.edit = false;
                        this.fetchTaskList();
                    })
                    .catch((err) => console.error(err));
            },

            deleteTask(id) {
                axios.delete('api/categories/' + id)
                    .then((res) => {
                        this.fetchTaskList()
                    })
                    .catch((err) => console.error(err));
            },
        }
    }
</script>

<style scoped>

</style>
