import api from "../services/api.js";

const TodoRepository = {
    async create(description) {
        return await api('/todo', {
            method: 'POST',
            body: JSON.stringify({ description: description }),
        });
    },
    async getId(id) {
        const response = await api(`/todo/${id}`, { method: 'GET' });
        return response.data;
    },
    async getAll() {
        const response = await api('/todo');
        return response.data;
    },
    async update(id, complete) {
        return await api(`/todo/${id}`, {
            method: 'PUT',
            body: JSON.stringify({ values: complete }),
        });
    },
    async delete(id) {
        return await api(`/todo/${id}`, { method: 'DELETE' });
    },
};

export default TodoRepository;