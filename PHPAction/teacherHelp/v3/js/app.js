function Person(name , age){
	this.name = name;
	this.age = age;
}

Person.prototype.sayHi = function(){
	return 'Hi, 我是' + this.name;
}


var person = new Person("jack" , 19);

var result = person.sayHi();

console.log(result);