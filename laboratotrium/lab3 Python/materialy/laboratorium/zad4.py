#4. Wpisz zdanie.
#ZnajdŸ jego akronim.
#np "Fatalna imitacja auta turystycznego,
#1-miejscowa, 2-cylindrowa, 6-krotnie przeplacona" -> FIAT126P.


textA= "Fatalna imitacja auta turystycznego, 1-miejscowa, 2-cylindrowa, 6-krotnie przeplacona"
li = textA.split(' ')
li2 = map(lambda x:x[:1],li)
li3 ="".join(li2)
print li3

