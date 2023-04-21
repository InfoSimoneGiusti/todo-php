const { createApp } = Vue

createApp({
    data() {
        return {
            todoList: [],
            todoItem: ''
        }
    },
    methods: {
        readList() {
            axios.get('server.php')
            .then(response => {
                this.todoList = response.data;
            })
        },
        addTodo() {

            const data = {
                ciccio: this.todoItem
            };

            axios.post('server.php', data,
            {
                headers: { 'Content-Type': 'multipart/form-data'}
            }
            ).then(response => {
                this.todoList = response.data;
                this.todoItem = '';
            }).catch(error => {
                alert(error.response.data);
            });
        }
    },
    mounted() {
        this.readList();
    }
}).mount('#app')
