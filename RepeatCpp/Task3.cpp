/*
* Тема:  Повторение С++. Функции. 
* Автор: Свиридов Денис.
* Сайт:  https://sviridovden.ru
*
*
*
* В С++ возможно 4 варианта объявления функций. 
* 1 вариант: Расположение в одном файле с функцией main(), перед самой функцией.
* 2 вариант: Расположение в одном файле с функцией main(), после самой функции, 
* предварительно, объявив прототипы функций перед функцией main().
* 3 вариант: Подключение файла типа *.cpp, в котором объявляются функции.
* 4 вариант: Подключение файлов типов *.cpp и *.h.
* К хорошему стилю программирования относятся третий и четвертый способ. 
* Таким образом, если объявлять функции в другом файле, то делать это согласно 
* способу 4. Если создаем файл .h то там будут прототипы функций, для того 
* чтобы скрыть реализацию функций. С помощью обозревателя решений MVS создаём 
* файл типа *.h.
*/

#include <iostream>
#include "palendrom.h"
using namespace std;

void FactV1(int numb){
	int rez = 1;
	for (int i=1; i<=numb; i++) {
		rez *= i;
	}
	cout << "Factorial of the N using void function without returning: " << numb << "!=" << rez << endl;
}

int FactV2(int numb){
	if (numb==0){
		return 1;
	} else {
		int rez = 1;
		for (int i=1; i<=numb; i++) {
			rez *= i;
		}
		return rez;
	}
}

bool palindrom5(int);

int main(){
	
	int digit;
	cout << "Enter digit to calculate factorial: ";
	cin >> digit;
	FactV1(digit);
	cout << "Factorial of the N using int function with returning argument. " << digit << "!=" << FactV2(digit) << endl;
	cout << "Enter 5zn-e chislo: ";
	int in_number, out_number; 
	cin >> in_number;
	out_number = in_number;
	if (palindrom5(in_number)) 
		cout << "Number " << out_number << " - palendrom" << endl;
	else 
		cout<<"This is not palendrom"<<endl;
	cout << "Using files *.h and *.cpp. \n";
	if (palendrom(in_number)) 
		cout << "Number " << out_number << " - palendrom" << endl;
	else 
		cout<<"This is not palendrom"<<endl;
	return 0;
}

bool palindrom5(int number) 
{
    int balance1, balance2, balance4, balance5; 
    balance1 = number % 10; 
    number = number / 10;   
 
    balance2 = number % 10; 
    number = number / 100;  
 
    balance4 = number % 10; 
    number = number / 10;   
 
    balance5 = number % 10; 
    if ((balance1 == balance5) && (balance2 == balance4))
        return true;  
    else
        return false; 
}
