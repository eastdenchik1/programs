/*
* Тема:  Повторение С++. Циклы. 
* Автор: Свиридов Денис.
* Сайт:  https://sviridovden.ru
*/

#include <iostream>
using namespace std;

int main(){
	cout << "Cycle For. \n";
	cout << "For with operation i++\n";
	for (int i=0; i<5; i++) {
		cout << "Iteration i=" << i << endl;
	}	
	cout << "For with operation ++i\n";
	for (int i=0; i<5; ++i) {
		cout << "Iteration i=" << i << endl;
	}
	int i = 0;
	cout << "Cycle While. \n";
	while (i<=5){
		cout << "Iteration i=" << i << endl;
		i++;
	}
	i=0;
	cout << "Cycle Do-While. \n";
	do {
		cout << "Iteration i=" << i << endl;
		i++;
	} while (i<=5);
	cout << endl;
	return 0;
}
