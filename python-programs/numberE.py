import math
import decimal

def factorial(n):
    factorials = [1]
    for i in range(1, n + 1):
        factorials.append(factorials[i - 1] * i)
    return factorials



def ComputeE(n):
    decimal.getcontext().prec = n + 1
    e = 2
    factorials = factorial(2*n + 1)
    for i in range(1, n+1):
        counter = 2*i + 2
        denominator = factorials[2*i +1]
        e += decimal.Decimal(counter / denominator)
    return e

def Shell():
	print('Добро Пожаловать. Данная программа предназначена для вычисления числа E до определенного знака.')
	while True:
		print('fsociety\> ', end='')
		entry = input()
		if entry == 'exit':
			break
		if not entry.isdigit():
			print('Вы не ввели число. Повторите ввод еще раз.')
		else:
			print('Ответ: {}.'.format(ComputeE(int(entry))))


if __name__ == '__main__':
	Shell()