#Loops 
students =[
    {"Name":"Gildasio", "Score" : 50},
    {"Name" :"Marcos","Score": 70},
    {"Name" : "Munique" , "Score": 40},
    {"Name": "Maria" , "Score": 40},
    {"Name" :"Pedro" , "Score": 90},
    {"Name" : "Gilberto" , "Score": 50},
    {"Name" :"Leticia" , "Score": 80},
    {"Name" : "Neide" , "Score": 70},
    {"Name" : "Giulene" , "Score": 80},
    {"Name" : "Adeilson" , "Score": 30},
    {"Name" : "Sergio" , "Score": 50},
    {"Name" : "Andreia" , "Score": 45},
    {"Name" : "Ilnet" , "Score": 60}]


for i in students:
   name_cap = i['Name'].capitalize()
   if i["Score"] < 50:
       #print(name_cap)
       print(i["Name"] + " Reprovado")
       continue
   else:
       print(i["Name"])
