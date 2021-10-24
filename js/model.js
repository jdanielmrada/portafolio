export default class Model {
    constructor()
    {
        this.view = null;
        this.todos = JSON.parse(localStorage.getItem('todos'));
        if(!this.todos || this.todos.length < 1)
        {
            this.todos = [
                {
                    id: 0,
                    title: 'Learn JS',
                    description: 'Watch JS Tutorials',
                    completed: false,
                }
            ]
            this.currentId = 1;
        }
        else
        {
            this.currentId = this.todos[this.todos.length -1].id + 1;
        }
        
    }

    setView( view )
    {
        this.view = view;
    }

    save()
    {
        localStorage.setItem('todos',JSON.stringify( this.todos ));
    }

    editTodo( id, values )
    {
        const index = this.findTodo(id);
        Object.assign(this.todos[index], values);
        this.save();
    }

    getTodos()
    {
        return this.todos.map((todo)=> ({ ...todo }));
        // const todos = [];
        // for( todo of this.todos )
        // {
        //     this.todos.push({ ...todo });
        // }
        // return todos;
    }

    findTodo( id )
    {
        return this.todos.findIndex(( todo )=> todo.id === id);
    }

    toggleCompleted( id )
    {
        const index = this.findTodo( id );
        const todo = this.todos[index];
              todo.completed = !todo.completed;
              this.save();
    }

    addTodo( title, description )
    {
        const todo = {
            id: this.currentId++,
            title, //javascript moderno cuando la propiedad es igual al nombre de la llave 
            description, //se puede simplificar
            completed: false, 
        }

        this.todos.push( todo );
        console.log(this.todos); 
        // Muy importante recuerda es necesario devolver un clon del puntero y noel puntero como tal.
        // return todo;
        // return Object.assign({}, todo); manera correcta y funcional
        this.save();

        return { ...todo }; //simplificado moderno
    }

    removeTodo( id )
    {
        const index = this.findTodo( id );
        // console.log(this.todos[index]);
        this.todos.splice(index, 1);
        this.save();
    }
}
