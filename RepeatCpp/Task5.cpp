/*
* Тема:  Повторение С++. Указатели. 
* Автор: Свиридов Денис.
* Сайт:  https://sviridovden.ru
*/

#include <iostream>
using namespace std;

int main(){

	int var = 2019;
	int *argvar = &var;
	
	cout << "Адрес переменной var: " << &var << endl;
	cout << "Адрес переменной var в переменной argvar: " << argvar << endl;
	cout << "Значение переменной var: " << var << endl;
	cout << "Значение указателя *argvar: " << *argvar << endl;
	/*
	* Указатели могут быть и на указатели, все аналогично. со * будет значение, просто адрес.
	*/
	// int nod(int a, int b); // Прототип функции
	// int (*ptrnod)(int, int); // объявление указателя на функцию
    // ptrnod=nod; // присваиваем адрес функции указателю ptrnod 
	return 0;
}
