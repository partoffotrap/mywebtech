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
                                name: 'Smth2',
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
                                name: 'Smth2',
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
                                name: 'Smth2',
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

        }

        this.renderChildren = function (data) {

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
