/*
* Тема:  Повторение С++. Рекурсия. 
* Автор: Свиридов Денис.
* Сайт:  https://sviridovden.ru
*/
#include <iostream>
#include <iomanip>

using namespace std;

unsigned long int fact(unsigned long int);
int i = 1; // for count the recursion
unsigned long int res;

unsigned long fibonacci(unsigned long);

int main(){
	int n;
	cout << "Введите n: ";
	cin  >> n;
	for (int k=1; k<=n; k++)
		cout << k << "!" << "=" << fact(k) << "\n";
	for (int j=1; j<=n; j++)
		cout << setw(2) << j << " = " << fibonacci(j) << "\n";
	return 0;
}

unsigned long fibonacci(unsigned long   entered_number) // функция принимает один аргумент
{
       if ( entered_number == 1 || entered_number == 2) // частный случай
             return (entered_number -1); // ряд чисел Фибоначчи всегда начинается с 0, 1, ...
       return fibonacci(entered_number-1) + fibonacci(entered_number-2); // формула поиска н-го числа, например найти восьмое по счёту число, и оно равно 7-е + 6-е
}

unsigned long int fact(unsigned long int n){
	if (n==1 || n==0){
		return 1;
	}
	// cout << "Step\t" << i << "\n";
	i++;
	// cout << "Result: " << res << endl;
	res = n*fact(n-1);
	return res;
}

