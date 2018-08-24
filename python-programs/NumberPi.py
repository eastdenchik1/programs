from __future__ import print_function
import math, sys
from decimal import *

getcontext().rounding = ROUND_FLOOR
sys.version_info[0] == 2
'''
Вычисление факториала числа n
Только работает он до 100-200 знака
для слишком больших чисел используется готовая функция факториала
в модули math.
'''
def factorial(n):
	if n==0:
		return 1
	return n*factorial(n-1)

'''
Вычисление значения по алгоритму Чудновского
k - количество знаков необходимое получить
для большьх значений используется тип Decimal()
'''
def AlgorithmCudnovsky(k):
	k = k+1
	getcontext().prec = k
	sum = 0
	for k in range(k):
		nominator = math.factorial(6*k)*(13591409+545140134*k)
		denominator = math.factorial(3*k)*(math.factorial(k))**3*(640320**(3*k))
		sum += nominator/denominator
	return Decimal(sum)

'''
Вычисляет значение числа Пи до нужного знака
'''
def GetValueOfPi(k):
	return Decimal(426880*math.sqrt(10005))/AlgorithmCudnovsky(k)

'''
Визуальное оформление консоли
'''
def Shell():
	print('Добро Пожаловать. Данная программа предназначена для вычисления числа Пи до определенного знака.')
	while True:
		print('fsociety\> ', end='')
		entry = input()
		if entry == 'exit':
			break
		if not entry.isdigit():
			print('Вы не ввели число. Повторите ввод еще раз.')
		else:
			print('Ответ: {}.'.format(GetValueOfPi(int(entry))))


if __name__ == '__main__':
	Shell()