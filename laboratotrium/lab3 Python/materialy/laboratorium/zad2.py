miesiace = {"styczen": 1 , "luty" : 2 , "marzec" : 3 , "kwiecie�" : 4 , "maj" : 5 , "czerwiec" : 6 , "lipiec" : 7 , "sierpie�" : 8 , "wrzesie�" : 9 , "pa�dziernik" : 10 , "listopad" : 11 , "grudzie�" : 12}


def roznica(a , b) :
    diff = miesiace.get[a] - miesiace.get[b]
    return diff
