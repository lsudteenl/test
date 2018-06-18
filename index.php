import imaplib, email, sys, requests, json, urllib.parse
from time import sleep
M = imaplib.IMAP4_SSL("imap.gmail.com", 993)
M.login("@gmail.com", "Password")
LINE_ACCESS_TOKEN="e1RlmRJesmOfO3yJP2cjtrivxgk5qvFSE1Pukx00Aw2"
url = "https://notify-api.line.me/api/notify" 
old = ""

def line_text(message):	
	msg = urllib.parse.urlencode({"message":message})
	LINE_HEADERS = {'Content-Type':'application/x-www-form-urlencoded',"Authorization":"Bearer "+LINE_ACCESS_TOKEN}
	session = requests.Session()
	a=session.post(url, headers=LINE_HEADERS, data=msg)
	print(a.text)
	
try:
	while 1:
		M.select()
		typ, data = M.search(None, 'ALL')
		typ, data = M.fetch(data[0].split()[len(data[0].split())-1], '(RFC822)')
		raw = data[0][1].decode('utf-8')
		b = email.message_from_string(raw)
		if(old != b['Date']):
			print("Subject: "+b['subject'])
			print("Date: "+b['Date'])
			old = b['Date']
			line_text("Subject: "+b['subject']+"\nDate: "+b['Date'])
		sleep(10)
except KeyboardInterrupt:
	M.close()
	M.logout()
	raise SystemExit
