///////////////////////////////// Первая задачка ///////////////////////////////////////////////

const students = [
    {name: 'Павел', age: 20 },
    {name: 'Иван', age: 20 },
    {name: 'Андрей', age: 20 },
    {name: 'Денис', age: 20 },
    {name: 'Виктория', age: 20 },
    { age: 40 },
]

var pickPropArray = function(y, z) {

    var k = [];

    for (var i =  0; i < y.length; i++) {

        switch(z) {
            case 'name':
                k.push(y[i].name);

                break
            case 'age':
                k.push(y[i].age);
                break
            default:
                break
        }
    }
    let filtered = k.filter(x => x !== undefined);
    return filtered;
}

const result = pickPropArray(students, 'name');

console.log(result);
console.log('Break');
///////////////////////////// Вторая Задача ////////////////////////////////////////////////////

function createCounter() {

    var count = 0;

    return function() {

        count = count + 1;
        console.log(count);
    }
}

const counter1 = createCounter()
counter1() // 1
counter1() // 2

const counter2 = createCounter()
counter2() // 1
counter2() // 2
console.log('Break');
/////////////////////////// Третья Задача ////////////////////////////////////////////////////

var spinWords = function(text){
    var x = text.split(' ');
    var y = [];
    for (var i = 0; i < x.length; i++) {
        // console.log(x[i]);
        // console.log(x[i].split(''))
        // console.log(x[i].split('').reverse(''))
        // console.log(x[i].split('').reverse('').join(''))
        if (x[i].length >= 5) {
            y.push(x[i].split('').reverse('').join(''));
        }
        else {
            y.push(x[i]);
        }
    }
    return y.join(' ');
}


const result1 = spinWords( "Привет от Legacy" )
console.log(result1) // тевирП от ycageL

const result2 = spinWords( "This is a test" )
console.log(result2) // This is a test

console.log(spinWords('Весело по полю бегает кабанчик'));

// var y = 'Весело по полю бегает кабанчик';

// console.log(y.splin('.'));


///////////////////////////// Бонус ////////////////////////////////////

///////////////////////////// Четвертая Задача ////////////////////////////////////////////////////
{
    function getElementsIndex(nums, target) {
        for (let i = 0; i < nums.length; i++)
            for (let j = i; j < nums.length; j++)
                if (nums[i] + nums[j] === target)
                    return [i, j];

        return [];
    }

    const nums = [6, 7, 12, 3, 5, 1], target = 11;

    const result = getElementsIndex(nums, target);
    console.log(result); // [0, 4]
}


///////////////////////////// Пятая Задача ////////////////////////////////////////////////////
{
    function getLargestPrefix(strings) {
        let prefix = strings[0].slice(-1);

        let prefixLength = 1;

        while(true) {

            for (let i = 0; i < strings.length; i++) {
                if(!strings[i].endsWith(prefix))
                    return prefix.slice(1).length > 1 ? prefix.slice(1) : '';
            }

            prefixLength++;
            prefix = strings[0].slice(-prefixLength);
        }
    }

    const firstLine = ["цветок","поток","хлопок"];
    const secondLine = ['собака', 'машина', 'облик']


    console.log(getLargestPrefix(firstLine)); // ок
    console.log(getLargestPrefix(secondLine)); // ''
}