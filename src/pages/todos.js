import Auth from "../services/auth.js";
import Form from "../components/form.js";
import location from "../services/location.js";
import loading from "../services/loading.js";
import Todos from "../services/todos.js";

const init = async () => {
    const {ok: isLogged} = await Auth.me()

    if (!isLogged) {
        return location.login()
    } else {
        loading.stop()
    }

    async function updateTodoCheckbox(id, checkbox) {
        try {
            const success = await Todos.update(id, checkbox);
            if (success) {
                return checkbox;
            } else {
                return !checkbox;
            }
        } catch (error) {
            console.error(error);
            return !checkbox;
        }
    }

    async function generateTodos() {
        const todos = await Todos.getAll();
        document.querySelector('.todos').innerHTML = '';
        todos.forEach(todo => {
            const todoEl = createTodoElement(todo);
            document.querySelector('.todos').appendChild(todoEl);
        });
    }

    function createTodoElement(todo) {
        const todoEl = document.createElement('div');
        todoEl.classList.add('todo');
        const todoCheckbox = createCheckbox(todo.complete);
        todoCheckbox.onchange = async function(e) {
            const checkbox = e.target.checked;
            e.target.checked = !e.target.checked;
            const newCheckboxValue = await updateTodoCheckbox(todo.id, checkbox);
            e.target.checked = newCheckboxValue;
        };
        const todoDescription = createDescription(todo.description);
        const todoDelete = createDeleteButton();
        todoDelete.onclick = async function () {
            await deleteTodoItem(todo.id);
            await generateTodos();
        };
        todoEl.appendChild(todoCheckbox);
        todoEl.appendChild(todoDescription);
        todoEl.appendChild(todoDelete);
        return todoEl;
    }

    function createCheckbox(complete) {
        const todoCheckbox = document.createElement('input');
        todoCheckbox.setAttribute('type', 'checkbox');
        todoCheckbox.classList.add('todo__checkbox');
        todoCheckbox.checked = complete;
        return todoCheckbox;
    }

    function createDescription(description) {
        const todoDescription = document.createElement('span');
        todoDescription.classList.add('todo__description');
        todoDescription.innerText = description;
        return todoDescription;
    }

    function createDeleteButton() {
        const todoDelete = document.createElement('button');
        todoDelete.classList.add('todo__delete');
        todoDelete.innerText = 'Удалить';
        return todoDelete;
    }

    async function addTodoItem(complete) {
        await Todos.create(complete);
        await generateTodos();
    }

    async function deleteTodoItem(id) {
        await Todos.delete(id);
    }
}

if (document.readyState === 'loading') {
    document.addEventListener("DOMContentLoaded", init)
} else {
    init()
}