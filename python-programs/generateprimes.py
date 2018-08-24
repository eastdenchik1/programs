import random


# Построение массива простых чисел
# простых чисел решетом Эратосфена
def Eratosphen(n):
    a = [0] * n 
    for i in range(n): 
        a[i] = i 
    a[1] = 0
    m = 3 
    while m < n: 
        if a[m] != 0: 
            j = m * 2 
            while j < n:
                a[j] = 0 
                j = j + m 
        m += 1
    b = []
    for i in a:
        if (a[i] != 0) and (a[i] != 2):
            b.append(a[i])
    del a
    return b

# Алгоритм быстрого возведения в степень по модулю
def pow_h(base, degree, module):
    degree = bin(degree)[2:]
    r = 1
    for i in range(len(degree) - 1, -1, -1):
        r = (r * base ** int(degree[i])) % module
        base = (base ** 2) % module
    return r 

# Алгоритм Евклида для нахождения НОД
def NOD(num1, num2):
    while ((num1!=0) & (num2!=0)):
        if num1>=num2:
            num1 = num1 % num2
        else:
            num2 = num2 % num1
    return num1 + num2

# Тест на простоту N, делимость N на прочтые числа от 3 до 97
def CheckPrimes(num1, num2 = 100):
    num = num1
    Erat_Arr = Eratosphen(num2)
    flag = True
    for i in range(len(Erat_Arr)):
        if ((num % Erat_Arr[i])==0):
            flag = False
            break
    return flag

# Проверка четности числа
def ChetNechet(num1):
    if num1%2==0:
        return True
    else:
        return False

# Тест на простоту N, Тест Рабина Миллера
def TestRabinaMillera(n, _mrpt_num_trials = 5):
    # Отдельное условие для N=1 и N=2
    if n == 1 or n == 2:
        return True
    # проверка N на четность
    if n % 2 == 0:
        return False
    # Представим n-1 как 2**s * d
    s = 0
    d = n-1
    while True:
        quotient, remainder = divmod(d, 2)
        if remainder == 1:
            break
        s += 1
        d = quotient
    assert(2**s * d == n-1)
    # Тестирование по основанию а числа n на составное
    def try_composite(a):
        if pow_h(a, d, n) == 1:
            return False
        for i in range(s):
            if pow_h(a, 2**i * d, n) == n-1:
                return False
        return True # n составное
    for i in range(_mrpt_num_trials):
        a = random.randrange(2, n)
        if try_composite(a):
            return False
    return True # no base tested showed n as composite

# Тест на простоту N, выбор такого числа а при котором 
# a^(N-1) mod N = 1 и НОД(a^R -1,N) = 1
def ChooseA(N,R):
    for a in range(2,N-1,1):
        if pow_h(a, N-1, N)==1:
            if (pow_h(a, R, N) in range(2,N-1)):
                if NOD(N,pow_h(a, R, N)-1)==1:
                    return True
    return False


# Основная программа работающая по методу Маурера 
# для генерации простого числа P при заданном простом числе Q
print("Курсовая работа по Криптографии.")
print("Тема: 'Построение больших простых чисел.' ")
S = int(input("Введите простое число Q= "))
 
PosNum = False
while PosNum==False:
    R = random.randint(S+1,4*S+2)
    N = 1 + S*R
    if ChetNechet(R) == True:
        PosNum = True
        if CheckPrimes(N)==True:
            if TestRabinaMillera(N)==True:
                if ChooseA(N,R)==True:
                    print("Все тесты сработали")
                else:
                    PosNum = False
            else:
                PosNum = False
        else:            
            PosNum = False
    else:
        PosNum = False

print("Ответ: ")
print("Для простого числа Q={}, простое число P={} при R={}".format(S,N,R))
input('Нажмите любую клавишу для выхода...')

