#!/bin/bash

jarflag=0
for filename in *
do
    if [ "$filename == tagsoup-1.2.1.jar" ]
    then
        jarflag=1
    fi
done

if [ $jarflag -ne 1 ]
then
    wget https://repo1.maven.org/maven2/org/ccil/cowan/tagsoup/tagsoup/1.2.1/tagsoup-1.2.1.jar
fi

while true
do
    #delete table rows
    python3 table.py

    if [ $1 == riteaid.txt ]
    then
        file1=$1
        file2=$2
    else
        file1=$2
        file2=$1
    fi

    while read line
    do
        wget -q -O ./temp.html ${line}
        java -jar tagsoup-1.2.1.jar --files ./temp.html
        python3 parser.py temp.xhtml riteaid
        rm temp.html
        rm temp.xhtml
    done < "$file1"

    while read line
    do
        wget -q -O ./temp2.html ${line}
        java -jar tagsoup-1.2.1.jar --files ./temp2.html
        python3 parser.py temp2.xhtml walgreens
        rm temp2.html
        rm temp2.xhtml
    done < "$file2"
    sleep 6h
done