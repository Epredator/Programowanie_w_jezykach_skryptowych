miesiace = {"styczen": 1 , "luty" : 2 , "marzec" : 3 , "kwiecieñ" : 4 , "maj" : 5 , "czerwiec" : 6 , "lipiec" : 7 , "sierpieñ" : 8 , "wrzesieñ" : 9 , "paŸdziernik" : 10 , "listopad" : 11 , "grudzieñ" : 12}


def roznica(a , b) :
    diff = miesiace.get[a] - miesiace.get[b]
    return diff
