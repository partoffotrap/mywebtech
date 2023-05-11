class Pizza {
    constructor(name, price, calories) {
        this.name = name;
        this.price = price;
        this.calories = calories;
        this.toppings = [];
        this.size = "";
        this.stuffing = "";
    }

    addTopping(topping) {
        this.toppings.push(topping);
    }

    removeTopping(topping) {
        const index = this.toppings.indexOf(topping);
        if (index > -1) {
            this.toppings.splice(index, 1);
        }
    }

    getToppings() {
        return this.toppings;
    }

    setSize(size) {
        this.size = size;
    }

    getSize() {
        return this.size;
    }

    setStuffing(stuffing) {
        this.stuffing = stuffing;
    }

    getStuffing() {
        return this.stuffing;
    }

    calculatePrice() {
        let price = this.price;
        if (this.size === "большая") {
            price += 200;
        } else if (this.size === "маленькая") {
            price += 100;
        }

        if (this.toppings.includes("сливочная моцарелла")) {
            if (this.size === "большая") {
                price += 100;
            } else if (this.size === "маленькая") {
                price += 50;
            }
        }
        if (this.toppings.includes("сырный борт")) {
            if (this.size === "большая") {
                price += 300;
            } else if (this.size === "маленькая") {
                price += 150;
            }
        }
        if (this.toppings.includes("чедер и пармезан")) {
            if (this.size === "большая") {
                price += 300;
            } else if (this.size === "маленькая") {
                price += 150;
            }
        }

        return price;
    }

    calculateCalories() {
        let calories = this.calories;
        if (this.size === "большая") {
            calories += 200;
        } else if (this.size === "маленькая") {
            calories += 100;
        }

        if (this.toppings.includes("сливочная моцарелла")) {
            calories += 0;
        }
        if (this.toppings.includes("сырный борт")) {
            if (this.size === "большая") {
                calories += 50;
            } else if (this.size === "маленькая") {
                calories += 50;
            }
        }
        if (this.toppings.includes("чедер и пармезан")) {
            if (this.size === "большая") {
                calories += 50;
            } else if (this.size === "маленькая") {
                calories += 50;
            }
        }

        return calories;
    }
}