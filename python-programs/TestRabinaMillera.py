import random
 

def pow_h(base, degree, module):
    degree = bin(degree)[2:]
    r = 1
    for i in range(len(degree) - 1, -1, -1):
        r = (r * base ** int(degree[i])) % module
        base = (base ** 2) % module
    return r  


def is_probable_prime(n):
    _mrpt_num_trials = 5 # количество попыток
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

print(is_probable_prime(int(input())))
