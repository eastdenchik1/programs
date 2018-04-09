import time

start_time = time.time()
n = input('Введите число необходимое разложить: ')
def Count_Elements(n):
	div = 2
	arr = [1]
	while int(n)>1:
		while (int(n)%div)==0:
			arr.append(div)
			n = int(n)/div;
		if div==2:
			div=div+1
		else:
			div=div+2
	return arr;
print('Число ' + n + ' раскладывается на: ')
print(Count_Elements(n))
print("____ %s мс ___" % (time.time() - start_time))