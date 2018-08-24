import random


class RSA:

    # Алгоритм быстрого возведения в степень по модулю
    def pow_h(self,base, degree, module):
        degree = bin(degree)[2:]
        r = 1
        for i in range(len(degree) - 1, -1, -1):
            r = (r * base ** int(degree[i])) % module
            base = (base ** 2) % module
        return r 


    # Алгоритм Евклида для нахождения НОД
    def NOD(self,num1, num2):
        while ((num1!=0) & (num2!=0)):
            if num1>=num2:
                num1 = num1 % num2
            else:
                num2 = num2 % num1
        return num1 + num2

    # return (g, x, y) a*x + b*y = gcd(x, y)
    def egcd(self,a, b):
        if a == 0:
            return (b, 0, 1)
        else:
            g, x, y = self.egcd(b % a, a)
            return (g, y - (b // a) * x, x)

    def GetModule(self, P, Q):
        return P*Q
    
    def GetNumEilera(self, P, Q):
        return (P-1)*(Q-1)

    def GetPublicKey(self,X): 
        while True:
            e = random.randint(1,X)
            if e<X:
                K0 = self.NOD(X,e)
                if K0==1:
                    return e
    
    def GetPrivateKey(self,PublicKeyExp,PhiPQ):
        g, x, _ = self.egcd(PublicKeyExp, PhiPQ)
        if g == 1:
            return x % PhiPQ

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

    def Encrypt(self, Message,E,N):
        return pow(Message, E, N)         

    def Decrypt(self, Message,D,N):
        return pow(Message,D,N)




    


