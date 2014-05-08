#6. Mamy adres IP i d³ugoœæ maski
#Wyœwietl binarnie i dziesiêtnie:
#- Adres sieci
#- Adres pierwszego hosta
#- Adres ostatniego hosta w sieci
#- Adres rozg³oszeniowy
#Przyk³ad:

#addres="212.191.99.68"
#maska=27
#("212.191.99.64", "11010100.10111111.01100011.01000000")
#("212.191.99.65", "11010100.10111111.01100011.01000001")
#("212.191.99.94", "11010100.10111111.01100011.01011110")
#("212.191.99.95", "11010100.10111111.01100011.01011111")

ip="212.191.99.68"
li=ip.split('.')


li2 = map(lambda x: bin(int(x))[2:].rjust(8,'0'),li)
print li2
adresbin ="".join(li2)
print addresbin

adressieci = adresbin[:m+1]+'0'*(32-m)
print adressieci


broadcast = adresbin[:m+1]+'1'*(32-m)
bbb = broadcast[0:8]+'.'+broadcast[8:16]+'.'broadcast[16:24]+'.'broadcast[24:32]

bbb.split('.')
map(lambda x: int(x,2), bbb.split('.'))
".".join(map(lambda x: int(x,2) , bbb.split('.'))
map(lambda x: str(int(x,2)), bbb.split('.')))
