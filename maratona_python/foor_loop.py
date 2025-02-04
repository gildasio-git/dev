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

turma_janeiro =[
    {"Name":"Joaquina", "Score" : 50},
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

winners =[]
losers=[]

#Loop para listar todos os alunos
#for ITEM in list:#
#do

def list_winners_losers(students):
    for student in  students:
        score = student["Score"]
        if score < 50:
         losers.append(student["Name"])
        else:
            winners.append(student["Name"])

list_winners_losers(turma_janeiro)
print(f"Alunos Vencedores{winners}")
print(f"Alunos Reprovados {losers}")


#Conhecimento complementar
#Controlar o fluxo

#BREAK
#CONTINUE

