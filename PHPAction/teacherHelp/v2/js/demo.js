
function Person(name, age) {
    this.name = name;
    this.age = age;
}
Person.prototype.sayHi = function () {
    return 'Hello, 我是' + this.name;
};



var person = new Person("tommy", 20);
var result = person.sayHi();
console.log(result);
