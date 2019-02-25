/*
* Тема:  Повторение С++. Ветвления. 
* Автор: Свиридов Денис.
* Сайт:  https://sviridovden.ru
*/

#include <iostream>
using namespace std;

int main(){
	int a;
	cout << "Construction IF-ELSE. \n";
	cout << "The small quiz. Type 1 (Yes) or 0 (No).\n";
	cout << "Do u want to buy car? \n";
	cin  >> a;
	if (a==1){
		cout << "Do u want to buy Audi? \n";
		cin  >> a;
		if (a==1){
			cout << "Good car, but in my opinion Nissan is better. Good luck. \n";			
		} else {
			cout << "So I understood, that u don't want to buy Audi.\nThat's why I recommend u Nissan.\n";
		}
	} else {
		cout << "U don't want to buy car, so u don't need my advice.\n";
	}
	return 0;
}
