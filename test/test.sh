#!/bin/bash

GREEN='\033[0;32m'
RED='\033[0;31m'
NC='\033[0m' # No Color

command=$1
expected_return_code=$2
expected_text=$3

composer="composer $command"
text="$($composer 2>&1)"
return_code="$?"

if [ "$expected_return_code" != "$return_code" ]
then
    echo -e "${RED}Error: Return code “$return_code” is different from expected ”$expected_return_code”${NC}"
    echo "Output:"
    echo "$text"
    exit 1
fi

if ! echo "$text" | grep -q "$expected_text"
then
    echo -e "${RED}Error: Text “$expected_text” not found in ”$text”${NC}"
    exit 1
fi

echo -e "${GREEN}✔${NC}"
exit 0
