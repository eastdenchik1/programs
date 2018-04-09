
import time

start_time = time.time()
print("Алгоритм Евклида для нахождения НОД. ")
print("d = (a,b) ")
a = int(input('Введите 1 число а: '))
b = int(input('Введите 2 число b: '))

def NOD(num1, num2):
    while ((num1!=0) & (num2!=0)):
        if num1>=num2:
            num1 = num1 % num2
        else:
            num2 = num2 % num1
    return num1 + num2
print(NOD(a,b))
print("____ %s мс ___" % (time.time() - start_time))