const { createApp } = Vue

createApp({
    data() {
        return {
            todoList: [],
            todoItem:   {
                            'text': '',
                            'done': false
                        }
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
                newTodo: this.todoItem
            };

            axios.post('server.php', data,
            {
                headers: { 'Content-Type': 'multipart/form-data'}
            }
            ).then(response => {
                this.todoList = response.data;
                this.todoItem.text = '';
            });
            
        },
        setDone(index) {
            console.log(index);

            const data = {
                setTodoDone: index
            }

            axios.post('server.php', data,
                {
                    headers: { 'Content-Type': 'multipart/form-data'}
                }
            ).then(response => {
                this.todoList = response.data;
            });

        },
        toggleDone(index) {
            console.log(index);

            const data = {
                toggleTodoDone: index
            }

            axios.post('server.php', data,
                {
                    headers: { 'Content-Type': 'multipart/form-data'}
                }
            ).then(response => {
                this.todoList = response.data;
            });

        },
        deleteTodo(index) {
            console.log(index);

            const data = {
                deletedTodo: index
            }

            axios.post('server.php', data,
                {
                    headers: { 'Content-Type': 'multipart/form-data'}
                }
            ).then(response => {
                this.todoList = response.data;
            });

        }
    },
    mounted() {
        this.readList();
    }
}).mount('#app')
