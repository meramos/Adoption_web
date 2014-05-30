def dropdown(filename1, filename2, delimeter, letype):

    f1 = open(filename1, 'r')
    f2 = open(filename2, 'w')

    f2.write("<?php \n")
    f2.write("echo \"<select name = '"+letype+"'>\";\n")
    f2.write("echo \"<option value='any'>Any</option>\";"+"\n")

    filetxt = f1.read()

    rows = filetxt.split(delimeter) #list, each element is a country/state

    for i in range(0,len(rows)):

        value = rows[i]

        f2.write("echo \"<option value='"+value+"'>"+value+"</option>\";"+"\n")

    f2.write("echo \"<select name = '"+letype+"'>\"; \n")

    f2.write("?>")

    f1.close()
    f2.close()


##filename1 = "countries.txt"
##delimeter = ";"
##letype = "country"
##
##filename2 = "select_country.php"

filename1 = "USstates.txt"
delimeter = "\n"
letype = "state"

filename2 = "select_state.php"

dropdown(filename1, filename2, delimeter, letype)

