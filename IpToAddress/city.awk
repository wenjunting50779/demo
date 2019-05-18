#!/bin/awk -f
BEGIN{
}

{
	a[$4]+=1
}

END{
	for(i in a)
	    print i,a[i]
}

#执行脚本  awk -f city.awk ip2.txt|sort -nr -k 2 -t ' '