#5. Mamy dwie listy liczb ca�kowitych.
#Nie u�ywaj�c p�tli znajd� list� r�nic,
#np: [100, 80, 20, 35, 90, 101, 99] --> [100, -20, -60, 15, 55, 11, -2]
#Wskaz�wka - u�yj zip()

li=  [100, 80, 20, 35, 90, 101, 99]

map(lambda x,y : y-x , li[:-1], li[1:])
