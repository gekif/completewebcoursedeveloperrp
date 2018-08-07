#!C:/Python27/python.exe
print "Content-type: text/html\n\n"

for i in range(11):
    print i
    print 'anjing'
    print '<br>'

print '<br>'

favouriteFoods = ['martabak', 'kopi', 'goblok']

for food in favouriteFoods:
    print food + '<br>'

print '<br>'

'''While Loops'''
x = 0
while  x <= 10:
    print x
    x += 1
    print '<br>'

print '<br>'

# Dictionary - 4 names (keys) and ages (values) of people
# Loop which prints. eg- sam is 7

ages = {}
ages['fikar'] = 30
ages['febrina'] = 30
ages['mama ema'] = 58
ages['regitha'] = 21

for age in ages:
    print age + " is " + str(ages[age]) + '<br>'
