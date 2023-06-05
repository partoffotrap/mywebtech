import TodoRepository from "../repository/todos.js";

class Todos {

    static async create (description)
    {
        return await TodoRepository.create(description);
    }

    static async getId (id)
    {
        return await TodoRepository.getId(id);
    }

    static async getAll ()
    {
        return await TodoRepository.getAll();
    }

    static async update (complete)
    {
        return await TodoRepository.update(id, complete);
    }

    static async delete (id)
    {
        return await TodoRepository.delete(id);
    }
}

export default Todos