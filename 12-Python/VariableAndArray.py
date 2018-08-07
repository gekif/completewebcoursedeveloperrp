#!C:/Python27/python.exe
print "Content-type: text/html\n\n"

age = 35
print age

print "<br>"

pi = 3.14
print pi

print "<br>"

name = 'Fikar'
print name

print "<br>"

print age / pi
print "<br>"
print round(age / pi, 2)
print "<br>"

number = 5

# String
print name * age
print '<br>'

print age * pi
print '<br>'

print number * pi
print "<br>"

# The result is same as above
print int(number) * pi
print '<br>'

print float(number) * pi
print '<br>'


'''String'''
str = 'My names is '
print str
print '<br>'

print str[0]
print '<br>'

print str[0:5]
print '<br>'

print  str[5]
print '<br>'

print str + name
print '<br>'



'''Array'''
myList = ['fikar', 'fida', 'febrina','jagur']
print myList
print '<br>'

print myList[1]
print '<br>'

print myList[2:4]
print '<br>'


myTuples = ('monyet', 'anjing', 'kucing')
print myTuples
print '<br>'

print myTuples[1]
# myTuples[1] = 'gajah'
# print myTuples
print '<br>'

myList[1] ='indira'
print myList
print '<br>'



'''Two dimensional array'''
dict = {}
dict['dad'] = 'firmantoko'
dict['mom'] = 'indira'
dict[1] = 'fikar'
dict[2] = 'ani'

print dict
print '<br>'

print dict['mom']
print '<br>'

'''Dictionary modules'''
print dict.keys()
print dict.values()


