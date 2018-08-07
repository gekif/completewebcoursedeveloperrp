#!C:/Python27/python.exe
print "Content-type: text/html\n\n"

def sayHello():
    # return "Hello World"
    print "Hello World"

# print sayHello()
sayHello()
print '<br>'


def saySomething(something):
    print something

saySomething('Setan')
print '<br>'


def multiplyNumbers(x, y):
    return x + y

print multiplyNumbers(5, 20)
print '<br>'


# Function highest common factor which return the highest number that divide into two other numbers exactly

def highestCommonFactor(x, y):
    for i in range(1, x + 1):
        if x % i == 0 and y % i == 0:
            hcf = i
    return hcf

# print highestCommonFactor(4, 6)
# print highestCommonFactor(5, 10)
print highestCommonFactor(15, 10)
print '<br>'


# a = 5
# b = 6
# def addTwoNumbers():
#     return a + b
#
# print addTwoNumbers()

# a = 5
# b = 6
# def addTwoNumbers():
#     a = 10
#     return a + b
#
# print addTwoNumbers()
# print '<br>'
# print a

a = 5
b = 6
def addTwoNumbers():
    c = 10
    return a + b

print addTwoNumbers()
print '<br>'
print a




