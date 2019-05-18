**IP转地址**
    
 原始ip文件为ip.txt,ip转换为地址后的文件为ip2.txt.
 
 city.awk脚本将返回ip2中的城市ip排名
 
    awk -f city.awk ip2.txt|sort -nr -k 2 -t ' '
