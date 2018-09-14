class Person{
	name:string;
	age:number;
	constructor(name:string, age:number){
		this.name = name;
		this.age = age;
	}

	sayHi(){
		return 'Hello, 我是' + this.name;
	}
}

let person = new Person("tommy" , 20);
let result = person.sayHi();
console.log(result);