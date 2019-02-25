#include "palendrom.h"
bool palendrom(int number) 
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
