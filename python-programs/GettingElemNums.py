

def Count_Elements(n):
	div = 2
	arr = [1]
	while int(n)>1:
		while (int(n)%div)==0:
			arr.append(div)
			n = int(n)/div
		if div==2:
			div=div+1
		else:
			div=div+2
	return arr

def Shell():
	print('Добро Пожаловать. Данная программа предназначена для разложения числа на простые числа.')
	while True:
		print('fsociety\> ', end='')
		entry = input()
		if entry == 'exit':
			break
		if not entry.isdigit():
			print('Вы не ввели число. Повторите ввод еще раз.')
		else:
			print('Ответ: {} .'.format(Count_Elements(int(entry))))


if __name__ == '__main__':
	Shell()