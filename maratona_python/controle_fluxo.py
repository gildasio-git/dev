def unlock_adult_films(username,age,with_parents):

    if age >= 18:
         msg =  f"{username} possui {age} portanto pode assitir filmes adultos"
    else:
         if with_parents:
            msg =  f"{username} possui {age}  pode assitir pois esta com os pais"
         else:
             msg = f"{username} não pode assitir, e menor e não esta com os pais"       
    return msg

print(unlock_adult_films("Gil",18,False))
print(unlock_adult_films("gildasio",12,True))
print(unlock_adult_films("giulene",15, False))
print(unlock_adult_films("leo",17, True))

