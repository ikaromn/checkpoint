#!/usr/bin/env python
# -*- coding: utf-8 -*-
import Tkinter
from Tkinter import *
import tkMessageBox
import getch

def main():

	top = Tkinter.Tk()
	top.geometry("400x120")


	L1 = Label(top, text="Preço do produto")
	L1.place(x=0, y=0)
	E1 = Entry(top, bd =1)
	E1.place(x=110, y=0)

	preco_produto = []
	y = 0

	def productsCallBackByEnter(event):
		preco_produto.append(float(E1.get()))
		E1.delete(0, END)
	def productsCallBack():
		preco_produto.append(float(E1.get()))
		E1.delete(0, END)
	def totalValue():
		y = sum(preco_produto)
		tkMessageBox.showinfo( "Valor total da compra", 'Valor total da compra: ' + str(y))
		L2 = Label(top, text="Valor recebido do cliente para o pagamento:")
		L2.place(x=0, y=60)
		E2 = Entry(top, bd=1)
		E2.place(x=250, y=60)
		def valorRecebidoTroco():
			valor_recebido = float(E2.get())
			troco = valor_recebido - y
			if troco == 0:
				tkMessageBox.showinfo("Troco", 'Valor total pago, não precisa de troco')
			elif troco < 0:
				tkMessageBox.showinfo("Troco", 'O valor recebido não corresponde ao valor da compra, cobrar o valor positivo de:' + str(troco))
			else:
				tkMessageBox.showinfo("Troco", 'O troco deve ser de:' + str(troco))
		def pago_com_cartao():
			tkMessageBox.showinfo( "Pagamento", 'Usar a maquininha para o pagamentto em cartão')

		d = Button(top, text="Enviar valor recebido", command = valorRecebidoTroco)
		e = Button(top, text="Pagar no cartão", comman = pago_com_cartao)
		d.place(x=0, y=90)
		e.place(x=150, y=90)

	b = Button(top, text="Enviar valor do produto", command = productsCallBack)
	c = Button(top, text="Valor da soma dos produtos", command = totalValue)
	b.place(x=0, y=30)
	c.place(x=170, y=30)
	top.bind("<Return>", productsCallBackByEnter)
	top.mainloop()

if __name__ == '__main__':
	main()