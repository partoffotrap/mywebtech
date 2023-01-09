console.log('123')
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init)
} else {
    init()
}

function init() {
    const data = {
        name: 'Каталог товаров',
        hasChildren: true,
        items: [
            {
                name: 'Мойки',
                hasChildren: true,
                items: [
                    {
                        name: 'Ulgran',
                        hasChildren: true,
                        items: [{
                            name: 'Smth',
                            hasChildren: false,
                            items: [] },
                            {
                                name: 'Smth',
                                hasChildren: false,
                                items: [] },
                        ]},

                    {
                        name: 'Vigro Mramor',
                        hasChildren: false,
                        items: [] },
                    {
                        name: 'Handmade',
                        hasChildren: true,
                        items: [
                            {
                                name: 'Smth',
                                hasChildren: false,
                                items: [] },
                            {
                                name: 'Smth',
                                hasChildren: false,
                                items: []},
                        ]},
                    {
                        name: 'Vigro Glass',
                        hasChildren: false,
                        items: []
                    },
                ]
            },{
                name: 'Фильтры',
                hasChildren: true,
                items: [
                    {
                        name: 'Ulgran',
                        hasChildren: true,
                        items: [
                            {
                                name: 'Smth',
                                hasChildren: false,
                                items: [] },
                            {
                                name: 'Smth',
                                hasChildren: false,
                                items: [] },
                        ] },
                    {
                        name: 'Vigro Mramor',
                        hasChildren: false,
                        items: []
                    },
                ]
            }
        ]
    }


    const items = new ListItems(document.getElementById('list-items'), data)


    /*  items.render()*/
    items.render()
    items.init()

    function ListItems(el, data) {
        this.el = el;
        this.data = data;

        this.init = function () {
            const parents = this.el.querySelectorAll('[data-parent]')

            parents.forEach(parent => {
                const open = parent.querySelector('[data-open]')

                open.addEventListener('click', () => this.toggleItems(parent) )
            })
        }

        this.render = function () {
            this.el.insertAdjacentHTML('beforeend', this.renderParent(this.data))
        }

        this.renderParent = function (data) {
            if (data.hasChildren) {
                let result =

                    `<div class="list-item list-item_open" data-parent>
                        <div class="list-item__inner">
                            <img class="list-item__arrow" src="src/assets/img/chevron-down.png" alt="chevron-down" data-open>
                            <img class="list-item__folder" src="src/assets/img/folder.png" alt="folder">
                            <span>${data.name}</span>
                        </div>
                        <div class="list-item__items">`

                for (let i = 0; i < data.items.length; i++)
                    result += this.renderParent(data.items[i])
                result +=
                    `</div>
                 </div> `
                return result;
            }
            else
                return this.renderChildren(data)
        }

        this.renderChildren = function (data) {
            //вовзращает рендер элемента без вложенности
            let result =
                `
            <div class="list-item" style='padding-left: 24px '>
                <div class="list-item__inner">
                    <img class="list-item__folder" src="src/assets/img/folder.png" alt="folder">
                    <span>${data.name}</span>
                </div>
            </div>
            `
            return result;
        }

        this.toggleItems = function (parent) {
            parent.classList.toggle('list-item_open')
        }

        /*        this.renderTest = function (data) {
                    return `
                    <div class="test">${data.name}</div>
                    `
                }*/
    }

}
