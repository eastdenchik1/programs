import random
from TestRabinaMilleraBig import TestRabinaMillera as RM
import math as mt



class El_Gamal:

    '''
    Алгоритм нахождения НОД
    '''
    def gcd(self, a, b ):
	    while b != 0:
		    c = a % b
		    a = b
		    b = c
	    return a

    def find_prime(self, iNumBits):
        #продолжаем тестировать пока не найдем нужное число
            while(1):
                p = random.randint( 2**(iNumBits-2), 2**(iNumBits-1) )
                while( p % 2 == 0 ):
                    p = random.randint(2**(iNumBits-2),2**(iNumBits-1))
                while( not RM(p) ):
                    p = random.randint( 2**(iNumBits-2), 2**(iNumBits-1) )
                    while( p % 2 == 0 ):
                        p = random.randint(2**(iNumBits-2), 2**(iNumBits-1))
                p = p * 2 + 1
                if RM(p):
                    return p

    '''
    Алгоритм нахождения первообразного корня
    '''
    def find_primitive_root(self, p ):
        if p == 2:
            return 1
            
        p1 = 2
        p2 = (p-1) // p1

        while( 1 ):
            g = random.randint( 2, p-1 )
            if not (pow( g, (p-1)//p1, p ) == 1):
                    if not pow( g, (p-1)//p2, p ) == 1:
                            return g


    '''
    Генерирование ключей
    x - закрытый ключ
    y - открытый ключ
    '''
    def GenerateKeys(self, iNumbits=256):
        p = self.find_prime(iNumbits)
        g = self.find_primitive_root(p)
        x = random.randint(1,p-1)
        y = pow(g,x,p)

        return {'PublicKey':y,'PrivateKey':x,'PrimitiveRoot':g,'PrimeNum':p}
    
    
    def GenerateKeys2(self, p):
        g = self.find_primitive_root(p)
        x = random.randint(1,p-1)
        y = pow(g,x,p)

        return {'PublicKey':y,'PrivateKey':x,'PrimitiveRoot':g,'PrimeNum':p}

    def EncryptMsg(self, g, p, y, Msg):
        k = random.randint(1, p-1)
        a = pow(g,k,p)        
        b = ((Msg%p)*pow(y,k,p))%p
        # b = ((Msg*pow( y, k, p)) % p )
        return [a, b]

    def modexp(self, b, e, m):
        return pow(b,e,m)
    
    def DecryptMsg(self, a, b, p, x):
        s = pow( a, x, p )
        plain = (b*pow( s, p-2, p)) % p
        return plain
    
    def EncodeMsg(self,Msg,Alphabet):
        Alph = Alphabet
        y = '' 
        for i in range(0,len(Msg),1):
            y+=str(Alph[Msg[i]])
        return y

    def DecodeMsg(self,Msg,Alphabet):
        inv_alphabet = {value: key for key, value in Alphabet.items()}
        x = ''
        NewStr = '0'
        if len(Msg)%2!=0:
            NewStr+=Msg
            for i in range(0,len(NewStr),2):
                x+=str(inv_alphabet[NewStr[i:i+2]])
        else:
            for i in range(0,len(Msg),2):
                x+=str(inv_alphabet[Msg[i:i+2]])
        return x





