#!C:/Python27/python.exe
print "Content-type: text/html\n\n"

import cgi
import random

form = cgi.FieldStorage()

'''
# print form.getvalue("name")
# print form.getvalue("username")

if "name" in form:
    print form.getvalue("name")
else:
    print "No Name"
'''

reds = 0
whites = 0

if "answer" in form:
    answer = form.getvalue("answer")
else:
    answer = ""
    for i in range(4):
        answer += str(random.randint(0, 9))


if "guess" in form:
   guess = form.getvalue("guess")
   for key, digit in enumerate(guess):
        # print key
        if digit == answer[key]:
            reds += 1
        else:
            for answerDigit in answer:
                if answerDigit == digit:
                    whites += 1
                    break
else:
    guess = ""


if "numberofGuess" in form:
    numberofGuess = int(form.getvalue("numberofGuess")) + 1
else:
    numberofGuess = 0


# print answer
# print reds
# print whites


if numberofGuess == 0:
    message = 'Gue pilih 4 angka, tebak dongg'
elif reds == 4:
    message = 'Well done, you got in ' + str(numberofGuess) + 'guesses. <a href="">Play Again</a>'
else:
    message = "Kamu punya " + str(reds) + " correct digit in the right place, and " + str(whites) + " correct digits in the wrong place. You have had " + str(numberofGuess) + " guesses"

print '<h1>Mastermind Games</h1>'
print '<p>' + message + '</p>'
print '<form method="post">'
print '<input type="text" name="guess" value="' + guess + '">'
print '<input type="hidden" name="answer" value="' + answer + '">'
print '<input type="hidden" name="numberofGuess" value="' + str(numberofGuess) + '">'
print '<input type="submit" value="tebaks">'
print '</form>'

