#4. Napisz program, który przetworzy dwa d³ugie stringi i sprawdzi, czy s¹ w tym samym jêzyku.
#Wskazówka - u¿yj przeciêcia dwóch zbiorów s³ów i sprawdŸ,
#czy przeciêcie zawiera przynajmniej dwa s³owa, które s¹ d³u¿sze ni¿ 3 litery.

textA="Za najnudniejsz¹ zosta³a uznana ksi¹¿ka, która przedstawia liczbê Pi z dok³adnoœci¹ do kilkudziesiêciu tysiêcy miejsc po przecinku. Mam nadziejê, ¿e ta strona zostanie uznana za najnudniejsz¹ w sieci."
textB="pierwsza kolumna oznacza numer kolejny skrajnej liczby pierwszej kolorem czerwonym oznaczono liczby bliŸniacze"

textA = set(filter(lambda x: len(x)>= 3, textA.split()))
textB = set(filter(lambda x: len(x)>= 3, textB.split()))
textA&textB




