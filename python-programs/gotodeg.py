import time

start_time = time.time()
print("Быстрое возведение в степень по модулю")
print("a^d mod p")
a = int(input('Введите основание а: '))
d = int(input('Введите степень d: '))
p = int(input('Введите модуль p: '))

def pow_h(base, degree, module):
    degree = bin(degree)[2:]
    r = 1
    for i in range(len(degree) - 1, -1, -1):
        r = (r * base ** int(degree[i])) % module
        base = (base ** 2) % module
    return r 
print("Ответ: "+str(pow_h(a,d,p))+";")
print("____ %s мс ___" % (time.time() - start_time))
