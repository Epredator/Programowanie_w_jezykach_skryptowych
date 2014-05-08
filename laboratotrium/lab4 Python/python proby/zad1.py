cdimport math
def square(l):
    area=l*l
    return area


def triangle(b, h):
    area=0.5*b*h
    return area


def circle(r):
    area=math.pi*2*r
    return area

def cone(r, h):
    area=0.33333333*math.pi*r*r*h
    return area



def cylinder(b, h):
    area=b*h
    return area

def Figura(a, b, c, d):
    if(a>0 and b>0 and c == 0 and d == 0):
        area = a * b # kwadrat
        return area
    if(a==0 and b>0 and c > 0 and d == 0): 
        area = 0,5 * b * c # tr�jk�t
        return area

    if(a==0 and b == 0 and c == 0 and d > 0):
        area = math.pi * d #ko�o
        return area
    
    if(a==0 and b > 0 and c > 0 and d > 0):
        area = (math.pi * d *d) + math.pi * d * c   # sto�ek pole podstawy sto�ka + pole powierzchni boczne (pi * r^2 + pi * r * L) ??
        return area

    else:
         print("Koniec dzia�ania skryptu")



print("Wpisz numer figury, ktota chcesz policzyc")
print("\t\t\t         Menu\n==========================================================\n1. Kwadrat\t\t2. Tr�jk�t\t\t\t3. Okr�g\n4. Sto�ek \t\t5. Walec \n==========================================================")


user_input = 0
while user_input not in (1,2,3,4,5,6,7,8,9,10,11,12):
    user_input = int(input("Wpisz sw�j wyb�r: "))

if (user_input==1):
    print("Policzmy pole kwadratu")
    length = float(input("D�ugo��: "))
    area = square(length)
    print("Pole kwadratu wynosi: ", area)

    if (user_input==2):
        print ("Policzmy pole tr�jk�ta")
        base = float(input("Podstawa: "))
        height = float(input("Wysoko��: "))
        area = triangle(0.5*base*height)
        print("Pole tr�jk�ta wynosi ", area)


if (user_input==3):
    print("Policzmy pole okr�gu")
    radius = float(input("Promie�: "))
    area = circle(radius*2*math.pi)
    print("Pole okr�gu wynosi: ", area)

if (user_input==4):
    print("Policzmy obj�to�� sto�ka")
    r = float(input("Radius: "))
    h = float(input("Height: "))
    area = cone(0.33333333*math.pi*radius*radius*height)
    print("Obj�to�� sto�ka wynosi, ", area)


if (user_input==5):
    print("Policzmy obj�to�� walca")
    base = float(input("Podstawa: "))
    height = float(input("Wysoko��: "))
    area = parallelogram(b*h)
    print("Obj�to�� walca wynosi ", area)

