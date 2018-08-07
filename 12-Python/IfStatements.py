#!C:/Python27/python.exe
print "Content-type: text/html\n\n"

# name = 'Fikar'
name = 'Gusti'

# if name == "Fikar":
if name == "Fikar" or name == 'Gusti':
    print "Hello " + name + "<br>"
else:
    print "You're not Fikar or Gusti, but you're " + name + "<br>"


# Create a program which display the first 50 as prime number

numberOfPrimes = 0
number = 2

while numberOfPrimes < 50:
    isPrime = True
    for i in range(2, number):
        if number % i == 0:
            isPrime = False

    if isPrime == True:
        print number
        numberOfPrimes += 1
        print "<br>"

    number += 1
