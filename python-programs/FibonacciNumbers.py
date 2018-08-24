
'''
Вычисление чисел Фибоначчи рекурсивно.
Плюсы: простота реализации 
Минусы: быстро работает только для сравнительно малых чисел
'''
def Fib(n):
    if n==0:
        return 0
    if n>2:
        return Fib(n-1)+Fib(n-2)
    else:
        return 1

'''
Вычисление чисел Фибоначчи с использованием словаря для
того чтобы не было повторяющихся чисел. Значительно ускоряет 
вычисление чисел.
Плюсы: простота реализации, работа с числами до 1000
Минусы: использование памяти
'''
M = {0:0, 1:1}
def FibDict(n):
    if n in M:
        return M[n]
    M[n] = FibDict(n - 1) +FibDict(n - 2)
    return M[n]

'''
Вычисление чисел Фибоначчи динамически
'''
def FibDynamic(n):
    a = 0 
    b = 1
    for __ in range(n):
        a, b = b, a + b
    return a

def ComputeFibArray(n):
    array = []
    for i in range(n+1):
        array.append(FibDynamic(i))
    return array

def Shell():
	print('Добро Пожаловать. Данная программа предназначена для вычисления числа чисел Фиббоначи до определенного числа.')
	while True:
		print('fsociety\> ', end='')
		entry = input()
		if entry == 'exit':
			break
		if not entry.isdigit():
			print('Вы не ввели число. Повторите ввод еще раз.')
		else:
			print('Ответ: {}.'.format(ComputeFibArray(int(entry))))


if __name__ == '__main__':
	Shell()