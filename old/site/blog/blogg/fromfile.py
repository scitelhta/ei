import os,sys,string,time


f=open("fromfile.sql","w")
f.write("insert into blog (created, userid, title, filename, ptype) values")
	
i=0
o=os.listdir(".")
for a in o:
	
	try:
		tt=time.gmtime(time.mktime((int(a[:4]), int(a[4:6]), int(a[6:8]), int(a[8:10]), int(a[10:12]), 0, 0, 0, 0)))
		#tt=time.gmtime(time.mktime((int(a[:2])+2000, int(a[2:4]), int(a[4:6]), int(a[6:8]), int(a[8:10]), 0, 0, 0, 0)))
	except:
		continue
	k=open(a).readline()
	fecha="%04d-%02d-%02d %02d:%02d:%02d"%(tt.tm_year, tt.tm_mon, tt.tm_mday, tt.tm_hour, tt.tm_min, tt.tm_sec)
	titulo=k.split("\n")[0].split("<br")[0].split(".")[0][:256]
	if titulo.find('?')>=0: 
		titulo=titulo.split("?")[0]+"?"
	d= "('%s', '%s', '%s', '%s', '1')"%(fecha, '3', titulo, a)
	if i: f.write(",")
	i=i+1
	f.write(d)
	print d
f.write(";")
f.close()