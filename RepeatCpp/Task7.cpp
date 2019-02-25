/*
* Тема:  Повторение С++. Структуры. 
* Автор: Свиридов Денис.
* Сайт:  https://sviridovden.ru
*/
#include <iostream>
#include <cstring>
using namespace std;

struct building {
	string owner;
	string city;
	int amount_rooms;
	float price;
};

int main(){
	setlocale(LC_ALL, "rus");
	building apt1;
	
	apt1.owner = "Денис";
	apt1.city = "Владивосток";
	apt1.amount_rooms = 3;
	apt1.price = 235415.453;
	
	cout << "Владелец:          " << apt1.owner << endl;
	cout << "Город:             " << apt1.city  << endl;
	cout << "Количество комнат: " << apt1.amount_rooms << endl;
	cout << "Стоимость:         " << apt1.price << "$" << endl;
	
}

/*


    building apartment1;
 
    apartment1.owner = "Денис";
    apartment1.city = "Симферополь";
    apartment1.amountRooms = 5;
    apartment1.price = 150000;
    apartment1.built.month = "январь";
    apartment1.built.year = 2013;
 
    struct building *pApartment; //это указатель на структуру
    pApartment = &apartment1;
 
    //Обратите внимание, как нужно обращаться к элементу структуры через указатель
    //используем оператор  ->
    cout << "Владелец квартиры: " << pApartment->owner << endl;
    cout << "Квартира находится в городе: " << pApartment->city << endl;
    cout << "Количество комнат: " << pApartment->amountRooms << endl;
    cout << "Стоимость: " << pApartment->price << " $" << endl;
    cout << "Дата постройки: " << pApartment->built.month << ' ' << pApartment->built.year << "\n\n\n";
 
    building apartment2; //создаем и заполняем второй объект структуры
 
    apartment2.owner = "Игорь";
    apartment2.city = "Киев";
    apartment2.amountRooms = 4;
    apartment2.price = 300000;
    apartment2.built.month = "январь";
    apartment2.built.year = 2012;
 
    building apartment3 = apartment2; //создаем третий объект структуры и присваиваем ему данные объекта apartment2
 
    show(apartment3);
 
    cout << endl << endl;
    
    Разобрав этот пример, мы увидели на практике следующее:

    структуру можно вкладывать в другую структуру;
    увидели, как создаётся указатель на структуру;
    как нужно обращаться к элементу структуры через указатель. А именно, используя оператор  -> ; В примере это было так: apartment0->owner, но можно и так (*apartment0).owner. Круглые скобки, во втором случае, обязательны.
    данные одной структуры можно присвоить другой структуре;
    можно структуру передать в функцию, как параметр (кстати, элементы структуры так же можно передавать в функцию, как параметры).

В дополнение ко всему, следует отметить, что  функции могут так же возвращать структуры  в результате своей работы. Например:

building Set()
{  
    building object; // формирование объекта
 
    //... код функции
 
    return object;
}






*/
