#n=range(2,11)
#filter(lambda x: x % n == 0 and n == x, range(20, 101))


#r=range(2,11)
#reduce(lambda x,y: x and not y%4, r)


#filter (pierwsza, range(20,101))
def pierwsza(z):
   wynik = True
   zz = filter(lambda x:z%x == 0, range(2,z))
   return len(zz) == 0
   #for x in range(2,z):
   #     if z%x ==0:
   #         wynik = False
   #         break
   # return wynik
   #filter(lambda z: 0==len(filter(lambda x:z%x==0,range(2,z))),range(20,101))
   
