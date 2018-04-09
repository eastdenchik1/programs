# Небходимые бибилиотеки
from tkinter import *
from tkinter import messagebox
from tkinter import ttk

root = Tk();
root.title("Калькулятор")


# Логика калькулятора

def Calc(key):
	global memory,fac
	if key == "=":
		# Икслючение букв в калькуляторе
		str1 = "-+0123456789.*/!^"
		if calc_entry.get()[0] not in str1:
			calc_entry.insert(END,"Первый символ не число.")
			messagebox.showerror("Ошибка!","Вы ввели не число.")
		# Счет
		try:
			result = eval(calc_entry.get())
			calc_entry.insert(END, "=" + str(result))
		except:
			calc_entry.insert(END, "Ошибка!!! ")
			messagebox.showerror("Ошибка!", "Проверь правильность данных.")
		# Очистка поля
	elif key == "c":
		calc_entry.delete(0,END)

	# Смена +/-
	elif key == "-/+":
		if "=" in calc_entry.get():
			calc_entry.delete(0, END)
		try:
			if calc_entry.get()[0] == "-":
				calc_entry.delete(0)
			else:
				calc_entry.insert(0, "-")
		except IndexError:
			pass
	elif key == "^2":
		a = int(calc_entry.get())
		calc_entry.insert(END, "=" + str(a**2))
	elif key == "!":
		f = 1
		i = 1
		while i <=int(calc_entry.get()):
			f=f*i
			i=i+1
		calc_entry.insert(END, "=" + str(f))
	else:
		if "=" in calc_entry.get():
			calc_entry.delete(0, END)
		calc_entry.insert(END, key)

# Массив с конпками
btn_list = [
	"7","8","9","+","-",
	"4","5","6","*","/",
	"1","2","3","-/+","=",
	"0",".","c","^2","!"
]

r = 2
c = 0

for i in btn_list:
	rel = ""
	cmd = lambda x=i: Calc(x)
	ttk.Button(root, command=cmd, text=i, width=10).grid(row=r, column=c)
	c += 1
	if c > 4:
		c = 0
		r += 1

calc_entry = Entry(root, width=60)
calc_entry.grid(row=0,column=0,columnspan=5)

lab = Label(root, text="Для факториала не больше 1000 вводить!", font="Helvetica 9")
lab.grid(row=1,column=0,columnspan=5)

root.mainloop()