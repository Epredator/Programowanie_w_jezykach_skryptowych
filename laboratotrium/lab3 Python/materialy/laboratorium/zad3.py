#4. Napisz program, kt�ry przetworzy dwa d�ugie stringi i sprawdzi, czy s� w tym samym j�zyku.
#Wskaz�wka - u�yj przeci�cia dw�ch zbior�w s��w i sprawd�,
#czy przeci�cie zawiera przynajmniej dwa s�owa, kt�re s� d�u�sze ni� 3 litery.

textA="Za najnudniejsz� zosta�a uznana ksi��ka, kt�ra przedstawia liczb� Pi z dok�adno�ci� do kilkudziesi�ciu tysi�cy miejsc po przecinku. Mam nadziej�, �e ta strona zostanie uznana za najnudniejsz� w sieci."
textB="pierwsza kolumna oznacza numer kolejny skrajnej liczby pierwszej kolorem czerwonym oznaczono liczby bli�niacze"

textA = set(filter(lambda x: len(x)>= 3, textA.split()))
textB = set(filter(lambda x: len(x)>= 3, textB.split()))
textA&textB




