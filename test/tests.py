#!/usr/bin/python
# -*- coding: utf-8 -*-

"""Run tests"""

from subprocess import Popen, PIPE
from sys import stdout, exit as sysexit

def run_command(command):
    """Run command and return the return code and stdout and stderr"""
    # arguments must be provided as an array, transform string with spaces to array
    composer_command = ['composer'] + command.split(' ')

    # https://stackoverflow.com/questions/23420990/subprocess-check-output-return-code/23432480#23432480
    program = Popen(composer_command, stdin=PIPE, stdout=PIPE, stderr=PIPE, bufsize=-1)
    output, error = program.communicate()

    # get stdout and stderr
    outputs = output + error

    return program.returncode, outputs

def test(command, expected_return_code, expected_text):
    """Run command and check return code and output"""
    success = True
    debug = None

    return_code, output = run_command(command)

    if return_code != expected_return_code:
        success = False
        debug = 'Return code “{0}” is different from expected ”{1}”'.format(
            return_code, expected_return_code)
    elif output.find(expected_text) == -1:
        success = False
        debug = 'Text “{0}” not found in ”{1}”'.format(expected_text, output)

    return success, debug

def tests():
    """Run tests suite """
    colors = {'green': '\033[0;32m', 'red': '\033[0;31m', 'no_color': '\033[0m'}

    commands = [
        {'command': 'docteur', 'code': 0, 'output': 'Checking composer.json'},
        {'command': 'guillotine --list', 'code': 1,
         'output': 'No binaries found in composer.json or in bin-dir'},
        {'command': 'censure php', 'code': 0,
         'output': 'Package "php" listed for update is not installed. Ignoring.'},
        {'command': 'exige php', 'code': 0, 'output': 'Nothing to install or update'},
        {'command': 'spectacle', 'code': 0, 'output': 'alexislefebvre/compositeur'},
        {'command': 'met-a-jour', 'code': 0, 'output': 'Generating autoload files'}
    ]

    errors = []

    # return 0 if all tests pass, or the number of failed tests
    sum_of_return_codes = 0

    for command in commands:
        success, debug = test(command['command'], command['code'], command['output'])

        if success:
            stdout.write('{0}✔{1}'.format(colors['green'], colors['no_color']))
        else:
            errors.append('{0} → {1}'.format(command['command'], debug))
            stdout.write('{0}✘{1}'.format(colors['red'], colors['no_color']))
            sum_of_return_codes += 1

    stdout.write("\n")

    if not errors:
        stdout.write('Success')
    else:
        stdout.write('{0} errors:'.format(len(errors)) + "\n" + "\n".join(errors))

    stdout.write("\n")

    sysexit(sum_of_return_codes)

tests()
