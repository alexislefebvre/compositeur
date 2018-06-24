#!/bin/bash

command=$1
expected_return_code=$2
expected_text=$3

command="composer $command"
text=$(eval command)
return_code=$?

if [ "$expected_return_code" != "$return_code" ]
then
    echo "Return code “$return_code” is different from expected ”$expected_return_code”"
    exit 1
fi

if grep -v -q "$expected_text" "$text"
then
    echo "Text “$expected_text” not found in ”$text”"
    exit 1
fi

exit 0
